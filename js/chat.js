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
var statusList = document.querySelectorAll('.status-select-list .dropdown-item');
statusList.forEach(item => {
    item.addEventListener('click', (e) => {
        e.preventDefault();
        console.log(item.innerHTML);
        console.log(statusLabel.innerHTML)
        statusLabel.innerHTML = item.innerHTML;
        statusList.forEach(el => {
            if (el.classList.contains("active")) {
                el.classList.remove("active");
            }
        });
        item.classList.add("active");
    });
});