<?php

session_start();

if ($_SESSION['account_level'] == "2") {
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
                <h1 class="mt-4">Booking Calendar</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Booking Management</li>
                    <li class="breadcrumb-item active">Calendar</li>
                </ol>

                <?php

                include('../includes/connect_db.php');
                include('../includes/calendar.php');

                $calendar = new Calendar(date('Y-m-d'));

                $q = "SELECT * FROM booking";
                $r = mysqli_query($link, $q);

                if (mysqli_num_rows($r) > 0) {
                    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                        $start = new DateTime("{$row["booking_time"]}");
                        $return = new DateTime("{$row["booking_return"]}");
                        $days = $return->diff($start)->format("%a");

                        $calendar->add_event("Booking ID: {$row['booking_id']} Booking Start: {$row['booking_time']} Booking Return: {$row['booking_return']}", $row['booking_time'], $days+1);
                    }
                }

                ?>

                <div class="card mb-4">
                    <div class="card-header">
                        <em class="fas fa-table mr-1"></em>
                        All Bookings
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <?= $calendar ?>
                        </div>
                    </div>

                </div>

            </div>
        </main>

        <?php

        include('includes/footer.php');

        ?>