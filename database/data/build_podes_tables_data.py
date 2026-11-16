import zipfile, xml.etree.ElementTree as ET, glob, os, json, re

podes_dir = r'd:\laragon\www\desamadani\storage\app\podes_raw'
files = glob.glob(os.path.join(podes_dir, '*.xlsx'))

# Master list of 15 Kecamatan in Kolaka Utara (uppercase)
KECAMATAN_MASTER = [
    'RANTEANGIN', 'LAMBAI', 'IWOIMENDAA', 'WAWO', 'LASUSUA', 'KATOI', 
    'KODEOHA', 'TIWU', 'NGAPA', 'WATUNOHU', 'PAKUE', 'PAKUE TENGAH', 
    'PAKUE UTARA', 'BATU PUTIH', 'POREHU', 'TOLALA'
]

def clean_val(val):
    if val is None: return ''
    val = str(val).strip()
    if val == '-' or val == '−': return '0'
    return val

def parse_full_table(z, shared_strings, sname, r_id, rel_map):
    target = 'xl/' + rel_map[r_id]
    stree = ET.fromstring(z.read(target))
    raw_rows = []
    
    for r in stree.findall('.//{http://schemas.openxmlformats.org/spreadsheetml/2006/main}row'):
        vals = {}
        for c in r.findall('{http://schemas.openxmlformats.org/spreadsheetml/2006/main}c'):
            ref = c.attrib.get('r')
            col = ''.join([ch for ch in ref if ch.isalpha()])
            t = c.attrib.get('t')
            v_elem = c.find('{http://schemas.openxmlformats.org/spreadsheetml/2006/main}v')
            val = v_elem.text if v_elem is not None else None
            if t == 's' and val is not None:
                val = shared_strings[int(val)]
            vals[col] = val
        if any(v is not None and str(v).strip() != '' for v in vals.values()):
            raw_rows.append((int(r.attrib.get('r')), vals))
            
    if not raw_rows:
        return None

    # Row 1 is Title (usually)
    title = raw_rows[0][1].get('A', '')
    if not title and len(raw_rows) > 1:
        title = raw_rows[1][1].get('A', '')
    title = str(title).replace('\n', ' ').strip()
    
    # Find data start row: where Column A is RANTEANGIN
    data_start_idx = -1
    for idx, (r_num, vals) in enumerate(raw_rows):
        val_a = str(vals.get('A', '')).strip().upper()
        if 'RANTEANGIN' in val_a:
            data_start_idx = idx
            break
            
    if data_start_idx == -1:
        data_start_idx = 3 # fallback
        
    # Headers are rows between 1 and data_start_idx
    header_rows = raw_rows[1:data_start_idx]
    
    # Extract distinct columns that have values in data
    cols = []
    for idx in range(data_start_idx, min(len(raw_rows), data_start_idx + 10)):
        for col in sorted(raw_rows[idx][1].keys()):
            if col not in cols and col != 'A':
                cols.append(col)
                
    # Build readable column headers
    col_headers = {}
    for c in cols:
        h_parts = []
        for _, hvals in header_rows:
            hv = hvals.get(c)
            if hv and not hv.startswith('(') and not hv.startswith('['):
                hv_clean = str(hv).replace('\n', ' ').strip()
                if hv_clean not in h_parts:
                    h_parts.append(hv_clean)
        col_headers[c] = ' - '.join(h_parts) if h_parts else f"Kolom {c}"

    # Now parse rows by Kecamatan and Desa
    current_kec = None
    data_rows = []
    
    for r_num, vals in raw_rows[data_start_idx:]:
        val_a = str(vals.get('A', '')).strip()
        if not val_a or val_a.upper() == 'KOLAKA UTARA' or 'KABUPATEN' in val_a.upper():
            continue
            
        val_a_upper = val_a.upper()
        # Check if this row is a Kecamatan name
        is_kec = any(k == val_a_upper for k in KECAMATAN_MASTER) or (val_a_upper in KECAMATAN_MASTER)
        
        if is_kec:
            current_kec = val_a_upper
            # Add kecamatan total row
            row_data = {c: clean_val(vals.get(c)) for c in cols}
            data_rows.append({
                'kecamatan': current_kec,
                'desa': None,
                'is_total': True,
                'values': row_data
            })
        else:
            # Desa row
            row_data = {c: clean_val(vals.get(c)) for c in cols}
            data_rows.append({
                'kecamatan': current_kec or 'UNKNOWN',
                'desa': val_a,
                'is_total': False,
                'values': row_data
            })
            
    return {
        'sheet': sname,
        'title': title,
        'columns': [{'col': c, 'label': col_headers.get(c, f"Kolom {c}")} for c in cols],
        'rows': data_rows
    }

all_modules_data = {}

for fpath in sorted(files):
    fname = os.path.basename(fpath)
    with zipfile.ZipFile(fpath, 'r') as z:
        shared_strings = []
        if 'xl/sharedStrings.xml' in z.namelist():
            tree = ET.fromstring(z.read('xl/sharedStrings.xml'))
            for si in tree.findall('{http://schemas.openxmlformats.org/spreadsheetml/2006/main}si'):
                text = ''.join(t.text for t in si.findall('.//{http://schemas.openxmlformats.org/spreadsheetml/2006/main}t') if t.text)
                shared_strings.append(text)
        wb_tree = ET.fromstring(z.read('xl/workbook.xml'))
        sheet_map = {}
        for s in wb_tree.findall('.//{http://schemas.openxmlformats.org/spreadsheetml/2006/main}sheet'):
            sheet_map[s.attrib.get('name')] = s.attrib.get('{http://schemas.openxmlformats.org/officeDocument/2006/relationships}id')
        rels_tree = ET.fromstring(z.read('xl/_rels/workbook.xml.rels'))
        rel_map = {rel.attrib.get('Id'): rel.attrib.get('Target') for rel in rels_tree.findall('{http://schemas.openxmlformats.org/package/2006/relationships}Relationship')}
        
        module_tables = {}
        for sname, r_id in sheet_map.items():
            if sname == 'MONITORING': continue
            parsed_tbl = parse_full_table(z, shared_strings, sname, r_id, rel_map)
            if parsed_tbl:
                module_tables[sname] = parsed_tbl
                
        all_modules_data[fname] = module_tables
        print(f"Extracted {len(module_tables)} tables from {fname}")

out_path = r'd:\laragon\www\desamadani\database\data\podes_all_tables.json'
with open(out_path, 'w', encoding='utf-8') as out:
    json.dump(all_modules_data, out, ensure_ascii=False)
print("All PODES tables written to", out_path)

