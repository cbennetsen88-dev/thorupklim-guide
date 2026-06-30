document.addEventListener('DOMContentLoaded', function () {

    const container = document.createElement('div');
    container.className = 'tkg-chat';
    container.innerHTML = `
        <div class="tkg-chat-box">
            <h3>💬 Chat Guide</h3>
            <div id="tkg-chat-log"></div>
            <input id="tkg-chat-input" placeholder="Skriv til guiden..." />
            <button id="tkg-chat-send">Send</button>
        </div>
    `;

    document.body.appendChild(container);

    const input = document.getElementById('tkg-chat-input');
    const log = document.getElementById('tkg-chat-log');
    const btn = document.getElementById('tkg-chat-send');

    async function sendMessage() {

        const message = input.value;
        if (!message) return;

        log.innerHTML += `<p><strong>Du:</strong> ${message}</p>`;

        const res = await fetch('/wp-json/tkg/v1/chat', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ message })
        });

        const data = await res.json();

        log.innerHTML += `<p><strong>Guide:</strong> ${data.reply}</p>`;

        input.value = '';
    }

    btn.addEventListener('click', sendMessage);
});