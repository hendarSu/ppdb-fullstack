const socket = new WebSocket('ws://localhost:3000');

socket.addEventListener('open', function (event) {
    console.log('WebSocket is connected.');
});

socket.addEventListener('message', function (event) {
    const data = JSON.parse(event.data);
    if (data.type === 'whatsapp-ready') {
        alert(`WhatsApp client for ${data.phoneNumber} is ready.`);
        location.href = '/campaigns'
    }
});
