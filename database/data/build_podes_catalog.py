import zipfile, xml.etree.ElementTree as ET, glob, os, json, re

podes_dir = r'd:\laragon\www\desamadani\storage\app\podes_raw'
files = glob.glob(os.path.join(podes_dir, '*.xlsx'))

def parse_workbook(fpath):
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
        
        tables = []
        monitoring = []
        
        for sname, r_id in sheet_map.items():
            target = 'xl/' + rel_map[r_id]
            stree = ET.fromstring(z.read(target))
            rows = stree.findall('.//{http://schemas.openxmlformats.org/spreadsheetml/2006/main}row')
            
            if sname == 'MONITORING':
                for r in rows:
                    r_num = int(r.attrib.get('r', 0))
                    if r_num < 4: continue
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
                    if vals.get('C'):
                        monitoring.append({
                            'no': vals.get('A'),
                            'tabel': vals.get('B'),
                            'variabel': vals.get('C').strip(),
                            'sumber': vals.get('D', 'PODES 2025'),
                            'status': vals.get('E', 'Aman'),
                            'keterangan': vals.get('F', 'Data lengkap'),
                            'prioritas': vals.get('L', 'Tinggi')
                        })
            else:
                non_empty_rows = []
                for r in rows:
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
                        non_empty_rows.append((int(r.attrib.get('r')), vals))
                
                title = ''
                if len(non_empty_rows) > 0:
                    title = non_empty_rows[0][1].get('A', '')
                    if not title and len(non_empty_rows) > 1:
                        title = non_empty_rows[1][1].get('A', '')
                
                tables.append({
                    'sheet': sname,
                    'title': title.replace('\n', ' ').strip(),
                    'total_rows': len(non_empty_rows)
                })
        return {
            'file': fname,
            'tables': tables,
            'monitoring': monitoring
        }

catalog = []
for f in sorted(files):
    info = parse_workbook(f)
    catalog.append(info)
    print(f"{info['file']}: {len(info['tables'])} tabel, {len(info['monitoring'])} monitoring")

out_path = r'd:\laragon\www\desamadani\database\data\podes_catalog.json'
with open(out_path, 'w', encoding='utf-8') as out:
    json.dump(catalog, out, indent=2, ensure_ascii=False)
print('Catalog written successfully to', out_path)

