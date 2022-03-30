<?php

session_start();


include('includes/header.php');
if (isset($_SESSION['accountID'])) {
    include('includes/chat.php');
}


?>


<link href="https://cdn.quilljs.com/1.2.6/quill.snow.css" rel="stylesheet">
<link rel="stylesheet" href="./css/doc_editor.css">
<div class="row align-items-start">


    <section class="editor mx-auto">
        <h1 class="m-3">Document Editor</h1>


        <div id="toolbar-container" class="ql-toolbar ql-snow">
            <span class="ql-formats">
                <select class="ql-font"></select>
                <select class="ql-size"></select>
            </span>
            <span class="ql-formats">
                <button class="ql-bold"></button>
                <button class="ql-italic"></button>
                <button class="ql-underline"></button>
                <button class="ql-strike"></button>
            </span>
            <span class="ql-formats">
                <select class="ql-color"></select>
                <select class="ql-background"></select>
            </span>
            <span class="ql-formats">
                <button class="ql-script" value="sub"></button>
                <button class="ql-script" value="super"></button>
            </span>
            <span class="ql-formats">
                <select class="ql-header">

                    <option class="ql-header" value="false">
                        <span style="font-size: normal;">Normal text</span>
                    </option>
                    <option class="ql-header" value="1">
                        <span style="font-size: larger;">Heading 1</span>
                    </option>
                    <option class="ql-header" value="2">
                        <span style="font-size: large;">Heading 2</span>
                    </option>
                    <option class="ql-header" value="3">
                        <span style="font-size: medium;">Heading 3</span>
                    </option>
                    <option class="ql-header" value="4">
                        <span style="font-size: normal;">Heading 4</span>
                    </option>
                </select>
                <button class="ql-blockquote"></button>
                <button class="ql-code-block"></button>
            </span>
            <span class="ql-formats">
                <button class="ql-list" value="ordered"></button>
                <button class="ql-list" value="bullet"></button>
                <button class="ql-indent" value="-1"></button>
                <button class="ql-indent" value="+1"></button>
            </span>
            <span class="ql-formats">
                <button class="ql-direction" value="rtl"></button>
                <select class="ql-align"></select>
            </span>
            <span class="ql-formats">
                <button class="ql-link"></button>
                <button class="ql-image"></button>
                <button class="ql-video"></button>
                <button class="ql-formula"></button>
            </span>
            <span class="ql-formats">
                <button class="ql-clean"></button>
            </span>
            <span class="ql-formats info">
                <button class="btn btn-primary" type="button" id="infoDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#212529" class="bi bi-question-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                    </svg>
                </button>
                <ul class="dropdown-menu" aria-labelledby="infoDropdown">
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="licenseModal">Editor license</a>
                    </li>
                    <li><a class="dropdown-item" href="./faq.php">FAQ</a></li>
                </ul>
            </span>
        </div>
        <div id="editor">
            <p>Hello World!</p>
            <p>Some initial <strong>bold</strong> text</p>
            <p><br></p>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="licenseModal" tabindex="-1" aria-labelledby="licenseModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editor license</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>
                            This text edidor uses Quill rich text editor.
                        </h6>
                        <p>Copyright (c) 2017, Slab<br>
                            Copyright (c) 2014, Jason Chen<br>
                            Copyright (c) 2013, salesforce.com<br>
                            All rights reserved.</p>
                        <p>
                            Redistribution and use in source and binary forms, with or without
                            modification, are permitted provided that the following conditions
                            are met:
                        <ol>
                            <li>
                                Redistributions of source code must retain the above copyright
                                notice, this list of conditions and the following disclaimer.
                            </li>
                            <li>
                                Redistributions in binary form must reproduce the above copyright
                                notice, this list of conditions and the following disclaimer in the
                                documentation and/or other materials provided with the distribution.
                            </li>
                            <li>
                                Neither the name of the copyright holder nor the names of its
                                contributors may be used to endorse or promote products derived from
                                this software without specific prior written permission.
                            </li>
                        </ol>
                        </p>
                        <p>
                            THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS
                            IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED
                            TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A
                            PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
                            HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
                            SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
                            LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
                            DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
                            THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
                            (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
                            OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="sidebar">

        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
        </button>
        <div class="collapse collapse-horizontal" id="sidebar">
            <div class="d-inline-flex flex-row align-items-center justify-content-evenly p-1">
                <button class="btn btn-primary m-1">Import file</button>
                <button class="btn btn-primary m-1">Export file</button>
                <button class="btn btn-primary m-1">Save changes</button>
            </div>

            <h4>People in this document</h4>
            <ul>
                <li>You</li>
            </ul>
            <a href="">Invite a masher</a>

        </div>
    </section> -->


</div>


<?php
include('includes/footer.php');
?>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script src="./js/doc_editor.js"></script>