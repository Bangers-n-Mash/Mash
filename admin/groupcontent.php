<?php

session_start();

if ($_SESSION['account_type'] == "2") {
    include('includes/admin-header.php');
} else {
    header("Location: ../login.php");
}

?>

<div id="layoutSidenav">
    <?php

    include('includes/sidenav.php');

    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Group Content</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                    <li class="breadcrumb-item">Group Management</li>
                    <li class="breadcrumb-item active">Content</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        This page displays all group content links.
                    </div>
                </div>
                <?php
                include('includes/group-content-table.php');
                ?>
            </div>
        </main>

        <?php

        include('includes/footer.php');

        ?>