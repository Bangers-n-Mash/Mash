// const express = require('express'); // using express
// const http = require('http') ;
// let app = express();
// let server = http.createServer(app);
// const cors = require('cors');

const socketIO = require('socket.io');
const { Server } = require("socket.io");

const port = process.env.PORT||8080; // setting the port 

const io = new Server(port, {
  serveClient: false,
  cors: {
    origin: ["http://localhost:3000", "https://localhost:3000"],
    allowedHeaders: ["ws-header"],
    credentials: true
  }
});

let socketRouter = require('./websocket_router');

const onConnection = (socket) => {
    console.log('New user connected');
    //emit message from server to user
    socket.emit('newMessage', {
        from: 'jen@mds',
        text: 'hepppp',
        createdAt: 123
    });

    // listen for message from user
    socket.on('createMessage', (newMessage) => {
        console.log('newMessage', newMessage);
    });

    // add middleware
    socketRouter.disconnect(io, socket);
    socketRouter.docEvent(io, socket);  
}


// make connection with user from server side
io.on('connection', onConnection);


// server.listen(port);
console.log('Node.js web server at port ' + port + ' is running.');