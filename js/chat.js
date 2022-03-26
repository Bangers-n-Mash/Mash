var chat = document.getElementById('chat-wrapper');


var toastTrigger = document.getElementById('toastTestBtn')
var live = document.querySelectorAll('.msg-toast');
var i = 0;
if (toastTrigger) {
    toastTrigger.addEventListener('click', function () {
        var toast = new bootstrap.Toast(live[i])
        toast.show()
        i++;
        if (i == live.length)
            i = 0;
    })
}

var statusLabel = document.querySelector('#status');
let statusIcon = document.getElementById('status-icon');
var statusList = document.querySelectorAll('.status-select-list .dropdown-item');
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


var contactsList = document.querySelectorAll('.chat-panel-contact');

contactsList.forEach(contact => {
    contact.addEventListener('click', (e) => {
        let username = contact.querySelector('.contact-username').children[0].innerHTML;
        let newMsg = document.createElement('li');
        newMsg.classList.add('card-message', 'list-group-item');
        newMsg.appendChild(document.createElement('div'));
        newMsg.appendChild(document.createElement('span'));
        newMsg.children[0].innerHTML = "New msg";
        newMsg.children[1].innerHTML = "just now";
        chatCard.querySelector('#chat-card-label').innerHTML = username;
        chatCard.querySelector('.chat-card-messages').children[0].replaceChildren(newMsg);
        chatCard.style.height = '40vh';
        chatCard.style.width = '500px';
        chatCard.style.visibility = 'visible';
    });
});

let chatCardHeader = chatCard.children[0];
let chatCardCloseBtn = document.getElementById('chat-card-close');

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

chatCardCloseBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    chatCard.style.visibility = 'hidden';
})