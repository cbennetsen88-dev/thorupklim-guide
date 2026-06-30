document.addEventListener('DOMContentLoaded', function () {

    const btn = document.querySelector('.tkg-dashboard button');
    const output = document.getElementById('tkg-ai-output');

    if (!btn || !output) return;

    async function loadGuide() {
        try {
            const res = await fetch('/wp-json/tkg/v1/daily-guide');
            const data = await res.json();

            output.innerHTML = `
                <div class="tkg-guide-card">
                    <h3>🌍 Din dag</h3>
                    <p><strong>Vejr:</strong> ${data.weather}</p>
                    <p><strong>Aktivitet:</strong> ${data.activity}</p>
                </div>
            `;
        } catch (e) {
            output.innerHTML = '<p>Fejl i guide loading</p>';
        }
    }

    btn.addEventListener('click', loadGuide);
});