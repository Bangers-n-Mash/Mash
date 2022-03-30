<?php

session_start();

if (isset($_SESSION['accountID'])) {
    include('includes/header_loggedin.php');
} else {
    include('includes/header.php'); 
}

?>
<style>
.accordion-button:focus {
    z-index: 3;
    border-color: #656a6d;
    outline: 0;
    box-shadow: 0 0 0 0.25rem #656a6d79;
}
.accordion-button:not(.collapsed) {
    color: #212529;
    background-color: #3b637a79;
    box-shadow: inset 0 -1px 0 rgba(0,0,0,.125);
}
</style>

<section class="container-md" style="max-width: 850px;">


    <h1>Frequently asked questions</h1>

    <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    How do I report inappropriate content?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="faqOne"
                data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    If you came across content which we do not allow. Please use the form on the <a
                        href="./contact_support.php">support page</a> to report it. Our moderators will review it and take appropriate action.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    How can I mash a text document?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo"
                data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    To start mashing text documents simply <a href="./login.php">log in</a> and head to the <a
                        href="./document_editor">document mash</a> page.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    FAQ #3
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree"
                data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit hic, dolorem provident ducimus
                    quibusdam
                    ipsa beatae porro vel quas, fugiat pariatur rem sunt. Molestiae nulla voluptates ratione fugiat
                    nostrum?
                    Corporis.
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

<?php

include('includes/footer.php');

?>