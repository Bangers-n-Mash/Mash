
let quillOptions = {
    modules: {
        toolbar: '#toolbar-container'
    },
    theme: 'snow'
}


var quill = new Quill('#editor', quillOptions);

quill.on('editor-change', function (eventName, ...args) {

    if (eventName === 'text-change') {
        let source = args[2];
        if (source === 'user') {
            socket.emit('doc:event', { "eventName": eventName, "delta": args[0], "oldDelta": args[1], "source": sessionStorage.username });
        }
    }
    if (eventName === 'selection-change') {
        // TODO send cursor update set a flag and setTimeout before next update
    }
});
if (!socket) {
    const socket = io("http://64.227.42.104:8080", {
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

socket.on("connect_error", (err) => {
    if (err.message === "invalid username") {
        console.log("Authentication error");
    }
});

// message listener from server
socket.on('doc:update', ({ eventName, delta, oldDelta, source }) => {
    if (eventName === 'text-change') {
        quill.updateContents(delta);
    }
    /* if (eventName === 'selection-change') {
        TODO draw other collaborators cursors
    } */
});

// when disconnected from server
socket.on('disconnect', function () {
    console.log('Disconnect from server');
});
