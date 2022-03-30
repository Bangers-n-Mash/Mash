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
    origin: ["http://localhost:3000", "https://localhost:3000", "http://64.227.42.104:80", "https://64.227.42.104:80"],
    allowedHeaders: ["ws-header"],
    credentials: true
  }
});

let socketRouter = require('./websocket_router');
let auth = require('./websocket_auth').auth;

const onConnection = (socket) => {
  console.log('New user connected');

  // add middleware
  socketRouter.connect(io, socket);
  socketRouter.userConnected(io, socket);
  socketRouter.disconnect(io, socket);
  socketRouter.docEvent(io, socket);
  socketRouter.artEvent(io, socket);
  socketRouter.chatEvent(io, socket);
}

// make connection with user from server side
io.on('connection', onConnection);

io.use((socket, next) => auth(socket, next));

// server.listen(port);
console.log('Node.js web server at port ' + port + ' is running.');