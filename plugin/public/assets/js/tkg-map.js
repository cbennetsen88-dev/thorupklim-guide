document.addEventListener('DOMContentLoaded', async function () {

    const mapEl = document.getElementById('tkg-map');
    if (!mapEl || typeof L === 'undefined') return;

    const map = L.map('tkg-map').setView([57.2, 9.0], 11);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);

    let allData = [];
    let groupLayer = L.layerGroup().addTo(map);

    function getIcon(type) {
        const icons = {
            tkg_experience: '🌿',
            tkg_accommodation: '🏡'
        };
        return icons[type] || '📍';
    }

    function render(data) {
        groupLayer.clearLayers();

        data.forEach(item => {
            const marker = L.marker([item.lat, item.lng], {
                icon: L.divIcon({
                    html: `<div style="font-size:20px">${getIcon(item.type)}</div>`,
                    className: ''
                })
            }).bindPopup(`<strong>${item.title}</strong>`);

            groupLayer.addLayer(marker);
        });
    }

    function distance(aLat, aLng, bLat, bLng) {
        const R = 6371;
        const dLat = (bLat - aLat) * Math.PI / 180;
        const dLon = (bLng - aLng) * Math.PI / 180;
        const a = Math.sin(dLat/2)**2 +
                  Math.cos(aLat*Math.PI/180) * Math.cos(bLat*Math.PI/180) *
                  Math.sin(dLon/2)**2;
        return 2 * R * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    }

    function sortByDistance(lat, lng) {
        return [...allData].sort((a,b) => distance(lat,lng,a.lat,a.lng) - distance(lat,lng,b.lat,b.lng));
    }

    function applyFilter(type) {
        if (!type || type === 'all') {
            render(allData);
            return;
        }
        render(allData.filter(p => p.type === type));
    }

    async function init() {
        const res = await fetch('/wp-json/tkg/v1/locations');
        allData = await res.json();
        render(allData);
    }

    document.addEventListener('tkg-filter', e => applyFilter(e.detail));

    document.addEventListener('tkg-near-me', e => {
        const { lat, lng } = e.detail;
        render(sortByDistance(lat, lng));
    });

    init().catch(console.error);
});