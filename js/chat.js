// ########## INTERFACE ##########
let chat = document.getElementById('chat-wrapper');

let toastTrigger = document.getElementById('toastTestBtn');
let live = document.querySelectorAll('.msg-toast');
let i = 0;
if (toastTrigger) {
    toastTrigger.addEventListener('click', function () {
        let toast = new bootstrap.Toast(live[i])
        toast.show()
        i++;
        if (i == live.length)
            i = 0;
    })
}

let statusLabel = document.querySelector('#status');
let statusIcon = document.getElementById('status-icon');
let statusList = document.querySelectorAll('.status-select-list .dropdown-item');
statusList.forEach(item => {
    item.addEventListener('click', (e) => {
        e.preventDefault();
        console.log(item.innerHTML);
        console.log(statusLabel.innerHTML)
        statusLabel.innerHTML = item.innerHTML;
        statusList.forEach(el => {
            if (el.classList.contains('active')) {
                el.classList.remove('active');
            }
        });
        e.target.classList.add("active");
        if (e.target.innerHTML === 'Active') {
            statusIcon.setAttribute('fill', 'rgb(128, 206, 97)');
        }
        if (e.target.innerHTML === 'Do not disturb') {
            statusIcon.setAttribute('fill', 'rgb(220, 155, 80)');
        }
        if (e.target.innerHTML === 'Offline') {
            statusIcon.setAttribute('fill', 'rgb(151, 167, 201)');
        }
        // TODO call the node with status update
    });
});

let chatPanel = document.querySelector('.chat-panel');
let chatCard = document.getElementById('chat-card');
let toastContainer = document.getElementById('toast-container');
let offset = chatPanel.clientWidth - 50;
chatPanel.addEventListener('show.bs.offcanvas', (e) => {
    chatCard.style.transform = 'translateX(-' + offset + 'px)';
    toastContainer.style.transform = 'translateX(-' + chatPanel.clientWidth + 'px)';
});
chatPanel.addEventListener('hide.bs.offcanvas', (e) => {
    chatCard.style.transform = 'translateX(0px)';
    toastContainer.style.transform = 'translateX(0px)';
});


let chatMessages = chatCard.querySelector('.chat-card-messages').children[0];
let chatCardLabel = chatCard.querySelector('#chat-card-label');
let createMessageElement = (msg, time) => {
    let newMsg = document.createElement('li');
    newMsg.classList.add('card-message', 'list-group-item');
    newMsg.appendChild(document.createElement('div'));
    newMsg.appendChild(document.createElement('span'));
    newMsg.children[0].innerHTML = msg;
    newMsg.children[1].innerHTML = time;
    return newMsg;
}

const notificationInnerHTML = '<div class=\"toast-header msg-toast-header contact-detail\">'
    + '<div class=\"contact-detail-avatar me-3\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"30\" height=\"30\" fill=\"currentColor\" class=\"bi bi-person-circle\" viewBox=\"0 0 16 16\">'
    + '<path d=\"M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z\"></path>'
    + '<path fill-rule=\"evenodd\" d=\"M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z\"></path></svg></div>' +
    +'<strong class=\"contact-detail-username me-auto\"> %username% </strong>'
    + '<small class=\"msg-toast-time text-muted\"> %time% </small>'
    + '<button class=\"btn-close\" type=\"button\" data-bs-dismiss=\"toast\" aria-label=\"Close\"></button></>'
    + '<div class=\"toast-body msg-toast-body\"> %message% </div>';

let createMessageNotification = (msg, user, time) => {
    console.log(msg)
    console.log(user)
    console.log(time)
    let newNotification = document.createElement('div');
    newNotification.innerHTML = notificationInnerHTML;
    newNotification.innerHTML.replace(/%username%/, user);
    newNotification.innerHTML.replace(/%message%/, msg);
    newNotification.innerHTML.replace(/%time%/, time);
    newNotification.classList.add('msg-toast', 'toast');
    newNotification.setAttribute('role', 'alert')
    newNotification.setAttribute('aria-live', 'assertive')
    newNotification.setAttribute('aria-atomic', 'true')
    toastContainer.appendChild(newNotification);
    let toastNotification = new bootstrap.Toast(newNotification);
    toastNotification.show();
}
let contactsList = document.querySelectorAll('.chat-panel-contact');
contactsList.forEach(contact => {
    contact.addEventListener('click', (e) => {
        let username = contact.querySelector('.contact-username').children[0].innerHTML;
        chatCardLabel.innerHTML = username;

        /* TODO pull messages from the DB and populate the chat card
        const dbMessages = []; // query
        const cardMessages = [];
        dbMessages.forEach(message => {
            cardMessages.push(createMessageElement(message.text, message.time))
        }); */

        let newMsg = createMessageElement("No messages", "just now");
        chatMessages.replaceChildren(newMsg);
        chatCard.style.height = '40vh';
        chatCard.style.width = '500px';
        chatCard.style.visibility = 'visible';
    });
});

let chatCardHeader = chatCard.children[0];
chatCardHeader.addEventListener('click', () => {
    if (chatCard.classList.contains('minimised')) {
        chatCard.style.height = '40vh';
        chatCard.style.width = '500px';
    } else {
        chatCard.style.height = '40px';
        chatCard.style.width = '200px';
    }
    chatCard.classList.toggle('minimised');
});

let chatCardCloseBtn = document.getElementById('chat-card-close');
chatCardCloseBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    chatCard.style.visibility = 'hidden';
});

let chatMsg = document.querySelector('.chat-card-input > input');
let chatSendBtn = document.querySelector('.chat-card-input > button');

chatSendBtn.addEventListener('click', (e) => {
    let content = chatMsg.value;
    if (chatMsg.value !== "") {
        socket.emit('chat:message', { content, to: chatCardLabel.innerHTML });
        chatMessages.appendChild(createMessageElement(content, 'just now'));
        chatMsg.value = "";
    }
});


// ########## SOCKET.IO ##########

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

// connection with server
socket.on('connect', function () {
    console.log('Connected to Server')
});

socket.on("connect_error", (err) => {
    if (err.message === "invalid username") {
        console.log("Authentication error");
    }
});

socket.on('chat:users', (users) => {
    users.forEach((user) => {
        user.self = user.userID === socket.id;
    });
    this.users = users.sort((a, b) => {
        if (a.self) return -1;
        if (b.self) return 1;
        if (a.username < b.username) return -1;
        return a.username > b.username ? 1 : 0;
    })
})

socket.on('chat:user_connected', (user) => {
    this.users.push(user);
})

socket.on('chat:message', ({ content, from }) => {
    chatMessages.appendChild(createMessageElement(content, 'just now'));
    createMessageNotification(content, from, Date.now().toString());
});

// when disconnected from server
socket.on('disconnect', function () {
    console.log('Disconnect from server');
});