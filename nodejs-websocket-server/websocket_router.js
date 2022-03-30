exports.connect = (io, socket, next) => {
    const users = [];
    for (let [id, socket] of io.of("/").sockets) {
        users.push({
            userID: id,
            username: socket.username,
        });
    }
    socket.emit('chat:users', users);
}

exports.userConnected = (io, socket, next) => {
    socket.broadcast.emit("chat:user_connected", {
        userID: socket.id,
        username: socket.username,
    });
}

exports.disconnect = (io, socket, next) => {
    // when server disconnects from user
    socket.on('disconnect', () => {
        console.log('disconnected from user');
    });
}


exports.docEvent = (io, socket, next) => {
    socket.on('doc:event', (payload) => {
        socket.broadcast.emit("doc:update", payload);
    });
}

exports.artEvent = (io, socket, next) => {
    socket.on('art:event', (payload) => {
        console.log(payload);
        socket.broadcast.emit("art:update", payload);
    });
}


exports.chatEvent = (io, socket, next) => {
    socket.on('chat:message', ({ content, to }) => {
        let target;
        for (let [id, socket] of io.of("/").sockets) {
            if (socket.username === to) {
                target = id;
            }
        }
        socket.to(target).emit('chat:message', { content, from: socket.username });
    });

    socket.on('chat:disconnet', (payload) => {

    });
}