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
socket.on('art:update', ({ eventName, delta, oldDelta, source }) => {
    if (eventName === 'text-change') {
        // draw changes
    }
    /* if (eventName === 'selection-change') {
        TODO draw other collaborators cursors
    } */
});

// when disconnected from server
socket.on('disconnect', function () {
    console.log('Disconnect from server');
});
