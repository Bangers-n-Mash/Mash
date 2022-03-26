<link rel="stylesheet" href="../css/chat.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<button type="button" class="btn btn-primary" id="toastTestBtn">Test live msg</button>
<div class="chat col-3 position-sticky top-100 start-100 d-flex flex-column">

    <div class="chat-panel d-flex flex-column offcanvas offcanvas-end" tabindex="-1" id="chatbar" aria-labelledby="chatbarLabel">

        <ul id="chat-panel-nav" class="chat-panel-selector nav nav-tabs" role="tablist" aria-label="chat-panel-selector">
            <li class="nav-item w-50" role="presentation">
                <button id="chat-friends-tab" class="nav-link w-100 active" type="button" role="tab" data-bs-toggle="tab" data-bs-target="#chat-friends" aria-controls="chat-friends" aria-selected="true">Friends</button>
            </li>
            <li class="nav-item w-50" role="presentation">
                <button id="chat-mash-tab" class="nav-link w-100" type="button" role="tab" data-bs-toggle="tab" data-bs-target="#chat-mash" aria-controls="chat-mash" aria-selected="false">Mashers</button>
            </li>
        </ul>

        <div id="nav-tabContent" class="tab-content mt-auto">
            <div id="chat-mash" class="chat-panel-contactlist tab-pane fade ms-3 mt-auto" role="tabpanel" aria-labelledby="chat-mash-tab">
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
            <div id="chat-friends" class="chat-panel-contactlist tab-pane fade show active ms-3 mt-auto" role="tabpanel" aria-labelledby="chat-friends-tab">
                <ul class="list-group">
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

                    <li class="chat-panel-contact list-group-item d-flex p-3">
                        <a href="" class="contact-avatar align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </a>
                        <div class="contact-middle d-flex flex-column px-3">
                            <div class="contact-username"><strong>Lorem, ipsum.</strong></div>
                            <div class="contact-lastmsg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, reprehenderit.</div>
                        </div>
                        <span class="contact-unreadpill badge bg-primary rounded-pill align-self-start ms-auto"></span>
                    </li>
                    <li class="chat-panel-contact list-group-item d-flex p-3">
                        <a href="" class="contact-avatar align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </a>
                        <div class="contact-middle d-flex flex-column px-3">
                            <div class="contact-username"><strong>Ex, molestiae.</strong></div>
                            <div class="contact-lastmsg">Non, atque accusantium minus necessitatibus illum maiores facere. Amet, illo!</div>
                        </div>
                        <span class="contact-unreadpill badge bg-primary rounded-pill align-self-start ms-auto">1</span>
                    </li>
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
                        <a href="" class="contact-avatar align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </a>
                        <div class="contact-middle d-flex flex-column px-3">
                            <div class="contact-username"><strong>Eius, debitis.</strong></div>
                            <div class="contact-lastmsg">Veniam impedit corrupti adipisci quas magnam architecto, officia quod tempora.</div>
                        </div>
                        <span class="contact-unreadpill badge bg-primary rounded-pill align-self-start ms-auto">0</span>
                    </li>
                    <li class="chat-panel-contact list-group-item d-flex p-3">
                        <a href="" class="contact-avatar align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </a>
                        <div class="contact-middle d-flex flex-column px-3">
                            <div class="contact-username"><strong>Qui, esse!</strong></div>
                            <div class="contact-lastmsg">Similique aperiam, sed sit consequatur labore maiores incidunt obcaecati! Assumenda.</div>
                        </div>
                        <span class="contact-unreadpill badge bg-primary rounded-pill align-self-start ms-auto">0</span>
                    </li>
                    <li class="chat-panel-contact list-group-item d-flex p-3">
                        <a href="" class="contact-avatar align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </a>
                        <div class="contact-middle d-flex flex-column px-3">
                            <div class="contact-username"><strong>Maxime, possimus.</strong></div>
                            <div class="contact-lastmsg">Dicta nemo id ducimus, aspernatur eius perferendis cumque molestiae veritatis?</div>
                        </div>
                        <span class="contact-unreadpill badge bg-primary rounded-pill align-self-start ms-auto">2</span>
                    </li>

                </ul>
            </div>

        </div>

        <div class="chat-panel-status d-flex align-items-center">

            <a class="chat-panel-status-avatar m-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
            </a>

            <div class="dropup">
                <a id="status-select" class="status-select d-flex align-items-center dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <h4 id="status" class="m-3">Offline</h4>
                    <div class="chat-panel-status-icon m-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-circle-fill" viewBox="0 0 16 16">
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
    <button class="chat-bubble align-self-end me-3 mb-2" style="background-color: transparent; border:none;" data-bs-toggle="offcanvas" data-bs-target="#chatbar" aria-controls="chatbar">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="blue" class="bi bi-chat-square-fill" viewBox="0 0 16 16">
            <path d="M2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
        </svg>
    </button>

</div>

<div class="toast-container p-3" style="z-index: 20;" aria-live="polite" aria-atomic="true">
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
<script src="../js/chat.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>