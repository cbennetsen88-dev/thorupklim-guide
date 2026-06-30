document.addEventListener('DOMContentLoaded', async function () {

    const mapEl = document.getElementById('tkg-map');
    if (!mapEl || typeof L === 'undefined') return;

    const map = L.map('tkg-map').setView([57.2, 9.0], 11);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);

    try {
        const res = await fetch('/wp-json/tkg/v1/locations');
        const data = await res.json();

        data.forEach(item => {
            L.marker([item.lat, item.lng])
                .addTo(map)
                .bindPopup(item.title);
        });

    } catch (e) {
        console.error('Map data error', e);
    }
});
