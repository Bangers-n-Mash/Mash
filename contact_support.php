<?php

include('includes/auth_session.php');
include('includes/header.php');

?>

<link rel="stylesheet" href="./css/contact_support.css">

<section class="container-md">
    <h1>How can we help you today?</h1>
    <figure>
        <blockquote>
            Sometimes the answers you are looking for are the same answers another person is looking for.
            <figcaption>Shannon L.</figcaption>
        </blockquote>
    </figure>

    <p>Maybe your question has already been answered. Have a look at <a href="faq.php">FAQ</a> or <a
            href="guides">Guides</a> pages.</p>
</section>

<section class="container-md">
    <h2>Want to report abuse?</h2>
    <p>Describe your issue and send us a link to the mash/masher you want to report</p>

    <form action="abuse.php" method="post">
        <div class="mb-3 row">
            <div class="col">
                <label for="first_name" class="form-label">First name</label>
                <input id="first_name" type="text" class="form-control" aria-label="First name">
            </div>
            <div class="col">
                <label for="second_name" class="form-label">Last name</label>
                <input id="second_name" type="text" class="form-control" aria-label="Last name">
            </div>
        </div>
        <div class="mb-3 col">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" aria-label="E-mail">
        </div>
        <div class="mb-3 col">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" placeholder="Describe your issue" aria-label="Issue description">
        </div>
        <div class="mb-3 col">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control" id="link" aria-label="Link to the content, user you want to report"
                placeholder="Paste the link to the content or user account you are reporting.">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Report</button>
        </div>
    </form>
</section>

<section class="container-sm">
    <h2>Haven't found your answer?</h2>
    <p>
        <a href="mailto:support@mash.com">
            Contact our support team.
        </a>
    </p>
</section>

<?php

include('includes/footer.php');

?>