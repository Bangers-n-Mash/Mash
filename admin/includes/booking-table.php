<?php

require('../includes/connect_db.php');

?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        User Bookings
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>User ID</th>
                        <th>User Email</th>
                        <th>Vehicle Booked</th>
                        <th>Booked Start Time</th>
                        <th>Booked End Time</th>
                        <th>Destination</th>
                        <th>Purpose</th>
                        <th>Passenger Count</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Booking ID</th>
                        <th>User ID</th>
                        <th>User Email</th>
                        <th>Vehicle Booked</th>
                        <th>Booked Start Time</th>
                        <th>Booked End Time</th>
                        <th>Destination</th>
                        <th>Purpose</th>
                        <th>Passenger Count</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $g = "SELECT * FROM booking";
                    $n = mysqli_query($link, $g);
                    if (mysqli_num_rows($n) > 0) {
                        while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
                    ?>
                            <tr>
                                <td><?php echo "{$row['booking_id']}"; ?></td>
                                <td><?php echo "{$row['user_id']}"; ?></td>
                                <td>
                                <?php
                                    $l = "SELECT * FROM users WHERE user_id = '{$row['user_id']}'";
                                    $m = mysqli_query($link, $l);
                                    if (mysqli_num_rows($m) == 0) {
                                        echo "No Email Assigned";
                                    } else {
                                        $dam = mysqli_fetch_array($m, MYSQLI_ASSOC);

                                        echo "{$dam['email']}";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $q = "SELECT vehicle_reg FROM vehicle WHERE vehicle_id = '{$row['vehicle_id']}'";
                                    $r = mysqli_query($link, $q);
                                    if (mysqli_num_rows($r) == 0) {
                                        echo "No Vehicle Assigned";
                                    } else {
                                        $cam = mysqli_fetch_array($r, MYSQLI_ASSOC);

                                        echo "{$cam['vehicle_reg']}";
                                    }
                                    ?>
                                </td>
                                <td><?php echo "{$row['booking_time']}"; ?></td>
                                <td><?php echo "{$row['booking_return']}"; ?></td>
                                <td><?php echo "{$row['booking_destination']}"; ?></td>
                                <td><?php echo "{$row['booking_purpose']}"; ?></td>
                                <td><?php echo "{$row['booking_passengers']}"; ?></td>
                                <td>
                                    <div class="row">
                                        <form action="includes/delete.php" method="post">
                                            <input type="hidden" id="bookingID" name="booking_id" value="<?php echo "{$row['booking_id']}"; ?>">
                                            <button type="submit" name="btnDeleteUsr" class="btn" value=""><em class="fa fa-trash"></em> Delete</button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                    <?php
                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>