<?php

require('../includes/connect_db.php');

?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        User Trips
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Vehicle Reg</th>
                        <th>Driver Name</th>
                        <th>Check Sheet Completed</th>
                        <th>Destination</th>
                        <th>Trip Purpose</th>
                        <th>Passengers</th>
                        <th>Start Time</th>
                        <th>Return Time</th>
                        <th>Start Mileage</th>
                        <th>Return Mileage</th>
                        <th>Trip Mileage</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Vehicle Reg</th>
                        <th>Driver Name</th>
                        <th>Check Sheet Completed</th>
                        <th>Destination</th>
                        <th>Trip Purpose</th>
                        <th>Passengers</th>
                        <th>Start Time</th>
                        <th>Return Time</th>
                        <th>Start Mileage</th>
                        <th>Return Mileage</th>
                        <th>Trip Mileage</th>
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
                                <td>
                                    <?php
                                    $b = "SELECT * FROM vehicle WHERE vehicle_id='{$row['vehicle_id']}'";
                                    $z = mysqli_query($link, $b);

                                    $reg = mysqli_fetch_array($z, MYSQLI_ASSOC);

                                    echo "{$reg['vehicle_reg']}";
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $l = "SELECT * FROM users WHERE user_id = '{$row['user_id']}'";
                                    $m = mysqli_query($link, $l);

                                    $dam = mysqli_fetch_array($m, MYSQLI_ASSOC);

                                    echo "{$dam['forename']} {$dam['surname']}";
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $c = "SELECT * FROM booking WHERE booking_id='{$row['booking_id']}' AND booking_check IS NULL";
                                    $u = mysqli_query($link, $c);
                                    if (mysqli_num_rows($u) > 0) {
                                        echo "Not Completed";
                                    } else {
                                        echo "Completed";
                                    }
                                    ?>
                                </td>
                                <td><?php echo "{$row['booking_destination']}"; ?></td>
                                <td><?php echo "{$row['booking_purpose']}"; ?></td>
                                <td><?php echo "{$row['booking_passengers']}"; ?></td>
                                <td><?php echo "{$row['booking_time']}"; ?></td>
                                <td><?php echo "{$row['booking_return']}"; ?></td>
                                <td><?php echo "{$row['start_mileage']}"; ?></td>
                                <td><?php echo "{$row['return_mileage']}"; ?></td>
                                <td><?php echo "{$row['trip_mileage']}"; ?></td>
                                <td>


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