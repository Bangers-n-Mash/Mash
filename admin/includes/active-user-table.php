<?php

require('../includes/connect_DB.php');

?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Active Users
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Forename</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Creation Date</th>
                        <th>Status</th>
                        <th>Account Type</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Username</th>
                        <th>Forename</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Creation Date</th>
                        <th>Status</th>
                        <th>Account Type</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $g = "SELECT * FROM artaccount";
                    $n = mysqli_query($link, $g);
                    if (mysqli_num_rows($n) > 0) {
                        while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
                    ?>
                            <tr>
                                <td><?php echo "{$row['username']}"; ?></td>
                                <td><?php echo "{$row['forename']}"; ?></td>
                                <td><?php echo "{$row['surname']}"; ?></td>
                                <td><?php echo "{$row['email']}"; ?></td>
                                <td><?php echo "{$row['creation_date']}"; ?></td>
                                <td><?php if ($row['account_status'] == "1") {
                                        echo "Blocked";
                                    } else {
                                        echo "Active";
                                    } ?></td>
                                <td><?php if ($row['account_type'] == "2") {
                                        echo "Admin";
                                    } else {
                                        echo "User";
                                    } ?></td>
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