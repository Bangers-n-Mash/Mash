exports.disconnect = (io, socket, next) => {
    // when server disconnects from user
    socket.on('disconnect', () => {
        console.log('disconnected from user');
    });
}


exports.docEvent = (io, socket, next) => {
    socket.on('doc:event', (payload) => {
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
        relayEvent(socket, payload);
    });
}

const relayEvent = (socket, payload) => {
    socket.broadcast.emit("doc:update", payload);
}


exports.chatEvent = (io, socket, next) => {
    const users = [];
    for (let [id, socket] of io.of("/").sockets) {
        users.push({
            userID: id,
            username: socket.username,
        });
    }
    socket.emit("chat:users", users);
    socket.broadcast.emit("chat:user_connected");

    socket.on('chat:message', (payload) => {

    });

    socket.on('chat:disconnet', (payload) => {

    });
}