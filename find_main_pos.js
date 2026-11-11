import fs from 'fs';

const c = fs.readFileSync('resources/views/dashboard.blade.php', 'utf8');
const lines = c.split('\n');

lines.forEach((l, i) => {
    if (l.includes('id="sectionAbout"') || l.includes('</main>')) {
        console.log(i + 1, l.trim());
    }
});

