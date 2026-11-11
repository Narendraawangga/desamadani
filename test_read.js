import fs from 'fs';

// Check if dashboard.blade.php can be read
const dashboard = fs.readFileSync('resources/views/dashboard.blade.php', 'utf8');
console.log('Current dashboard length:', dashboard.length);

