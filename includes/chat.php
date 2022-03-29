<?php
require_once 'connect_DB.php';
$query = "SELECT account.accountID, username, profilePicture FROM artaccount as account INNER JOIN friendlist as friendTable ON account.accountID = friendTable.friend_id WHERE friendTable.accountID = ?;";
$prepStmt = mysqli_stmt_init($link);
if (!mysqli_stmt_prepare($prepStmt, $query)) {
    echo ("Error loading friendlist");
    mysqli_stmt_close($prepStmt);
    exit();
}
mysqli_stmt_bind_param($prepStmt, "i", $_SESSION['accountID']);
mysqli_stmt_execute($prepStmt);
$results = mysqli_stmt_get_result($prepStmt);

//TODO check if we are on a collaboration page and pull list of collaborators to the other chat pane

?>

<link rel="stylesheet" href="../css/chat.css">

<div id="overlay" class="chat">
    <button type="button" class="btn btn-primary" id="toastTestBtn">Test live msg</button>

    <div class="chat-wrapper d-flex align-items-end justify-content-end h-100">

        <div id="chat-card" style="visibility:hidden" class="chat-card d-flex flex-column" tabindex="1" aria-labelledby="chat-card-label">
            <div class="chat-card-header d-flex align-items-center p-2">
                <h6 id="chat-card-label" class="chat-card-username chat-card-title me-auto">Username</h6>
                <button id="chat-card-close" class="btn-close btn-close-white chat-card-close" type="button" aria-label="Close"></button>
            </div>
            <div class="chat-card-messages flex-grow-1 p-2">
                <ul class="list-group">
                    <li class="card-message list-group-item">
                        <div>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi, quasi!</div>
                        <span>"time ago"</span>
                    </li>
                    <li class="card-message list-group-item">
                        <div>Ducimus similique pariatur veniam atque facilis sapiente sit at ullam?
                            Repellat, odit magni rerum labore cum iste nostrum soluta vel.
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores quia ea pariatur. Autem asperiores sed cumque provident dignissimos ab doloremque quo eius non? Iste asperiores quidem, dolores doloribus suscipit ipsam.
                        </div>
                        <span>"time ago"</span>
                    </li>
                    <li class="card-message list-group-item">
                        <div>Repellat, odit magni rerum labore cum iste nostrum soluta vel.</div>
                        <span>"time ago"</span>
                    </li>
                    <li class="card-message list-group-item">
                        <div>Hic quidem quas, corporis ipsam quisquam veritatis iste possimus voluptatum.</div>
                        <span>"time ago"</span>
                    </li>
                    <li class="card-message list-group-item">
                        <div>Voluptatibus iure quos quam, ex aspernatur placeat nulla beatae consectetur.</div>
                        <span>"time ago"</span>
                    </li>
                </ul>
            </div>
            <div class="chat-card-input d-flex align-items-end">
                <input type="text" class="flex-fill">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="white" class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="chat-panel col-3 position-absolute end-0 bottom-0 d-flex flex-column offcanvas offcanvas-end mt-auto" data-bs-scroll="true" data-bs-backdrop="false" tabindex=" -1" id="chatbar" aria-label="Chats panel">
            <div id="nav-tabContent" class="tab-content ">
                <div id="chat-mash" class="chat-panel-contactlist tab-pane fade mt-auto" role="tabpanel" aria-labelledby="chat-mash-tab">
                    <ul class="list-group">
                        <li class="chat-panel-contact list-group-item d-flex p-3">
                            <a href="" class="contact-avatar align-self-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            </a>
                            <div class="contact-middle d-flex flex-column px-3">
                                <div class="contact-username"><strong>Recusandae, quibusdam.</strong></div>
                                <div class="contact-lastmsg">Doloribus neque pariatur omnis aliquid asperiores sint laborum delectus dolorem.</div>
                            </div>
                            <span class="contact-unreadpill badge bg-primary rounded-pill align-self-start ms-auto">5</span>
                        </li>
                        <li class="chat-panel-contact list-group-item d-flex p-3">
                            <a href="" class="contact-avatar align-self-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            </a>
                            <div class="contact-middle d-flex flex-column px-3">
                                <div class="contact-username"><strong>Ad, laboriosam?</strong></div>
                                <div class="contact-lastmsg">Illo quod at eos ipsam sunt tenetur odio, minima sapiente.</div>
                            </div>
                            <span class="contact-unreadpill badge bg-primary rounded-pill align-self-start ms-auto">0</span>
                        </li>
                        <li class="chat-panel-contact list-group-item d-flex p-3">
                            <a class="contact-avatar align-self-center" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            </a>
                            <div class="contact-middle d-flex flex-column px-3">
                                <div class="contact-username"><strong>Scott Craig</strong></div>
                                <div class="contact-lastmsg">Lorem ipsum dolor sit amet consectetur.Lorem ipsum dolor sit amet consectetur</div>
                            </div>
                            <span class="contact-unreadpill badge bg-primary rounded-pill align-self-start ms-auto">2</span>
                        </li>
                    </ul>
                </div>
                <div id="chat-friends" class="chat-panel-contactlist tab-pane fade show active mt-auto" role="tabpanel" aria-labelledby="chat-friends-tab">
                    <ul class="list-group">

                        <?php
                        while ($row = mysqli_fetch_array($results)) {
                            echo "<li class=\"chat-panel-contact list-group-item d-flex p-3\">";
                            echo "<a class=\"contact-avatar align-self-center\" href=\"\">";
                            echo "<img src=\"" . $row['profilePicture'] . "\" alt=\"Profile picture\"></a>";
                            echo "<div class=\"contact-middle d-flex flex-column px-3\">";
                            echo "<div class=\"contact-username\"><strong>" . $row['username'] . "</strong></div>";
                            echo "<div class=\"contact-lastmsg\">Lorem ipsum dolor sit amet consectetur.Lorem ipsum dolor sit amet consectetur</div></div>";
                            echo "<span class=\"contact-unreadpill badge bg-primary rounded-pill align-self-start ms-auto\">2</span></li>";
                        }
                        ?>

                    </ul>
                </div>

            </div>
            <div class="chat-panel-menu">
                <ul id="chat-panel-nav" class="chat-panel-selector nav nav-tabs" role="tablist" aria-label="chat-panel-selector">
                    <li class="nav-item w-50" role="presentation">
                        <button id="chat-friends-tab" class="nav-link w-100 active" type="button" role="tab" data-bs-toggle="tab" data-bs-target="#chat-friends" aria-controls="chat-friends" aria-selected="true">Friends</button>
                    </li>
                    <li class="nav-item w-50" role="presentation">
                        <button id="chat-mash-tab" class="nav-link w-100" type="button" role="tab" data-bs-toggle="tab" data-bs-target="#chat-mash" aria-controls="chat-mash" aria-selected="false">Mashers</button>
                    </li>
                </ul>
                <div class="chat-panel-status d-flex align-items-center">
                    <a class="chat-panel-status-avatar m-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </a>
                    <div class="dropup">
                        <a id="status-select" class="status-select d-flex align-items-center dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <h4 id="status" class="m-2">Offline</h4>
                            <div class="chat-panel-status-icon m-2">
                                <svg id="status-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                    <circle cx="8" cy="8" r="8" />
                                </svg>
                            </div>
                        </a>
                        <ul class="status-select-list dropdown-menu p-1" aria-labelledby="status-select">
                            <li><a href="" class="dropdown-item" style="color: rgb(128, 206, 97);">Active</a></li>
                            <li><a href="" class="dropdown-item" style="color: rgb(220, 155, 80);">Do not disturb</a></li>
                            <li><a href="" class="dropdown-item active" style="color: rgb(151, 167, 201);">Offline</a></li>
                        </ul>
                    </div>
                    <button type="button" class="btn-close text-reset ms-auto p-3 m-3" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>

    <div class="position-absolute end-0 bottom-0">
        <button class="chat-bubble me-3" style="background-color: transparent; border:none;" data-bs-toggle="offcanvas" data-bs-target="#chatbar" aria-controls="chatbar">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-chat-square-fill" viewBox="0 0 16 16">
                <path d="M2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
            </svg>
        </button>
    </div>
    <div id="toast-container" class="toast-container p-3" aria-live="polite" aria-atomic="true">
        <div id="msg-toast" class="toast msg-toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header msg-toast-header contact-detail">
                <div class="contact-detail-avatar me-3"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                </div>
                <strong class="contact-detail-username me-auto">
                    Ut, sequi
                </strong>
                <small class="msg-toast-time text-muted">just now</small>
                <button class="btn-close" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body msg-toast-body">
                Lorem ipsum dolor sit amet consectetur adipisicing.
            </div>
        </div>
        <div id="msg-toast" class="toast msg-toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header msg-toast-header contact-detail">
                <div class="contact-detail-avatar me-3"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                </div>
                <strong class="contact-detail-username me-auto">
                    Ut, sequi
                </strong>
                <small class="msg-toast-time text-muted">8 seconds ago</small>
                <button class="btn-close" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body msg-toast-body">
                Lorem ipsum dolor sit amet consectetur adipisicing.
            </div>
        </div>
        <div id="msg-toast" class="toast msg-toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header msg-toast-header contact-detail">
                <div class="contact-detail-avatar me-3"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                </div>
                <strong class="contact-detail-username me-auto">
                    Ut, sequi
                </strong>
                <small class="msg-toast-time text-muted"><span id="toast-timeago">11 min</span> ago</small>
                <button class="btn-close" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body msg-toast-body">
                Lorem ipsum dolor sit amet consectetur adipisicing.
            </div>
        </div>
    </div>
    <script src="https://cdn.socket.io/4.4.1/socket.io.min.js" integrity="sha384-fKnu0iswBIqkjxrhQCTZ7qlLHOFEgNkRmK2vaO/LbTZSXdJfAu6ewRBdwHPhBo/H" crossorigin="anonymous"></script>
    <script src="../js/chat.js"></script>
</div>