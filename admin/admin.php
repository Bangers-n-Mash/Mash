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
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Current Users
                            </div>
                            <div class="card-body"><canvas id="myCurrentChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar mr-1"></i>
                                Monthly Views
                            </div>
                            <div class="card-body"><canvas id="myViewsChart" width="100%" height="40"></canvas></div>
                        </div>
                    </div>
                </div>

                <?php
                include('includes/active-user-table.php');
                ?>

            </div>
        </main>

        <?php

        include('includes/footer.php');

        ?>