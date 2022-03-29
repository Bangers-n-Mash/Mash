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
                <h1 class="mt-4">Collaboration Analytics</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Collaborators</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                    This page shows collaboration analytics allowing you to see the total number of collatorators as well as the Collaborating:Individual user ratio.
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Current Users
                            </div>
                            <div class="card-body"><canvas id="myCollaboratorChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                Collaboration History
                            </div>
                            <div class="card-body"><canvas id="myCollaboratorArea" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php

        include('includes/footer.php');

        ?>