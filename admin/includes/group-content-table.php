<?php

require('../includes/connect_DB.php');

?>

<div class="card mb-4">
    <div class="card-header">
        <em class="fas fa-table mr-1"></em>
        Group Content Table
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>Group ID</th>
                        <th>Content ID</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Group ID</th>
                        <th>Content ID</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $g = "SELECT * FROM grouparts";
                    $n = mysqli_query($link, $g);
                    if (mysqli_num_rows($n) > 0) {
                        while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
                    ?>
                            <tr>
                                <td><?php echo "{$row['artGroupID']}"; ?></td>
                                <td><?php echo "{$row['artID']}"; ?></td>
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