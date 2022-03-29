exports.auth = (socket, next) => {
    const username = socket.handshake.auth.username;
    const userID = socket.handshake.auth.accountID;
    if (!username) {
        return next(new Error("invalid username"));
    }
    socket.username = username;
    socket.accountID = userID;
    next();
}