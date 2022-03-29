// const express = require('express'); // using express
// const http = require('http') ;
// let app = express();
// let server = http.createServer(app);
// const cors = require('cors');

const socketIO = require('socket.io');
const { Server } = require("socket.io");

const port = process.env.PORT || 8080; // setting the port 

const io = new Server(port, {
  serveClient: false,
  cors: {
    origin: ["http://localhost:3000", "https://localhost:3000"],
    allowedHeaders: ["ws-header"],
    credentials: true
  }
});

let socketRouter = require('./websocket_router');
let auth = require('./websocket_auth');

const onConnection = (socket) => {
  console.log('New user connected');
  // add middleware
  socketRouter.disconnect(io, socket);
  socketRouter.docEvent(io, socket);
  socketRouter.chatEvent(io, socket);
}

// io.use((socket, next) => auth(socket, next));
// make connection with user from server side
io.on('connection', onConnection);


// server.listen(port);
console.log('Node.js web server at port ' + port + ' is running.');