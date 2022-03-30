if (!socket) {
    const socket = io("http://localhost:8080", {
        withCredentials: true,
        extraHeaders: {
            "ws-header": "mash"
        },
        auth: {
            username: sessionStorage.username,
            accountID: sessionStorage.accountID
        }
    });
}
// connection with server
socket.on('connect', function () {
    console.log('Connected to Server')
});

document.addEventListener('miniPaintAction', (event) => {
    socket.emit('art:event', { "action": event.detail.action, "options": event.detail.options });
});

socket.on("connect_error", (err) => {
    if (err.message === "invalid username") {
        console.log("Authentication error");
    }
});

// message listener from server
socket.on('art:update', ({ action, options }) => {
    console.log(action);
    window.State.do_action(action, options);
});

// when disconnected from server
socket.on('disconnect', function () {
    console.log('Disconnect from server');
});
