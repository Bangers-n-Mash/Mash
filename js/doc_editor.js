
let quillOptions = {
    modules: {
        toolbar: '#toolbar-container'
    },
    theme: 'snow'
}


var quill = new Quill('#editor', quillOptions);

quill.on('editor-change', function (eventName, ...args) {
    socket.emit('doc:event', { "eventName": eventName, "args": args });
});

const socket = io("http://localhost:8080", {
    withCredentials: true,
    extraHeaders: {
        "ws-header": "mash"
    }
});

// connection with server
socket.on('connect', function () {
    console.log('Connected to Server')
});

// message listener from server
socket.on('doc:update', (payload) => {
    console.log(payload.args);
    let delta = payload.args[0];
    let oldDelta = payload.args[1];
    let source = payload.args[2];

    if (payload.eventName === 'text-change') {
        if (source == 'api') {
            console.log("An API call change.");
        } else if (source == 'user') {
            let changeIndex = delta.ops[0].retain;
            let changes = delta.ops.slice(1);
            changes.forEach(element => {
                let changeType = Object.keys(element)[0];
                let change = Object.values(element)[0];
                let attributes = element.attributes;
                console.log("A user " + changeType + " '" + change + "' at index: " + changeIndex + " with attributes " + JSON.stringify(attributes));
            });
        }
    } else if (payload.eventName === 'selection-change') {
        let range = delta;
        if (range && source == 'user') {
            if (range.length == 0) {
                console.log('User cursor is on', range.index);
            } else {
                console.log('User has highlighted range: [' + range.index + ':' + (range.index + range.length) + ']');
            }
        } else {
            console.log('Cursor not in the editor');
        }
    }
});

// when disconnected from server
socket.on('disconnect', function () {
    console.log('Disconnect from server');
});
