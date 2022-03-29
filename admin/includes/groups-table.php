<?php

require('../includes/connect_DB.php');

?>

<div class="card mb-4">
    <div class="card-header">
        <em class="fas fa-table mr-1"></em>
        Groups
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>Group ID</th>
                        <th>Group Name</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Group ID</th>
                        <th>Group Name</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $g = "SELECT * FROM artgroups";
                    $n = mysqli_query($link, $g);
                    if (mysqli_num_rows($n) > 0) {
                        while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
                    ?>
                            <tr>
                                <td><?php echo "{$row['artGroupID']}"; ?></td>
                                <td><?php echo "{$row['groupName']}"; ?></td>
                                <td>
                                    <div class="row">
                                        <form action="includes/delete.php" method="post">
                                            <input type="hidden" id="campusName" name="artGroupID" value="<?php echo "{$row['artGroupID']}"; ?>">
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