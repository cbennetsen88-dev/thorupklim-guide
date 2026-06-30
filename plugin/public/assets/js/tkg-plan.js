document.addEventListener('DOMContentLoaded', async function () {

    const output = document.getElementById('tkg-ai-output');
    if (!output) return;

    async function loadPlan() {
        try {
            const res = await fetch('/wp-json/tkg/v1/plan-day');
            const data = await res.json();

            let html = `<div class="tkg-plan">
                <h3>🧭 Din daglige plan</h3>
                <p><strong>Vejr:</strong> ${data.weather}</p>
                <ul>`;

            data.itinerary.forEach(item => {
                html += `<li><strong>${item.time}:</strong> ${item.action}</li>`;
            });

            html += `</ul></div>`;

            output.innerHTML = html;

        } catch (e) {
            output.innerHTML = '<p>Kunne ikke hente plan</p>';
        }
    }

    // auto load
    loadPlan();

    // optional refresh event
    document.addEventListener('tkg-ai-refresh', loadPlan);
});