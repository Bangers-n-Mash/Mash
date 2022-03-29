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
                        <th>Booking ID</th>
                        <th>Vehicle Check Sheet</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Vehicle Reg</th>
                        <th>Booking ID</th>
                        <th>Vehicle Check Sheet</th>

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
                                <td><?php echo "{$row['booking_id']}"; ?></td>
                                <td>
                                    <div class="row mx-auto">
                                        <?php
                                        $c = "SELECT * FROM booking WHERE booking_id='{$row['booking_id']}' AND booking_check IS NULL";
                                        $u = mysqli_query($link, $c);
                                        if (mysqli_num_rows($u) > 0) {
                                            echo "Not Completed";
                                        } else {
                                        ?>
                                            <a href="<?php echo "{$row['booking_check']}"; ?>">View</a>
                                        <?php
                                        }
                                        ?>
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