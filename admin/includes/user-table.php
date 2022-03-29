<?php

require('../includes/connect_db.php');

?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Users
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Forename</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>License Expiry</th>
                        <th>License Check Code</th>
                        <th>Status</th>
                        <th>Account Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>User ID</th>
                        <th>Forename</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>License Expiry</th>
                        <th>License Check Code</th>
                        <th>Status</th>
                        <th>Account Type</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $g = "SELECT * FROM users";
                    $n = mysqli_query($link, $g);
                    if (mysqli_num_rows($n) > 0) {
                        while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
                    ?>
                            <tr>
                                <td><?php echo "{$row['user_id']}"; ?></td>
                                <td><?php echo "{$row['forename']}"; ?></td>
                                <td><?php echo "{$row['surname']}"; ?></td>
                                <td><?php echo "{$row['email']}"; ?></td>
                                <td><?php echo "{$row['phone_no']}"; ?></td>
                                <td><?php echo "{$row['license_expiry']}"; ?></td>
                                <td><?php echo "{$row['check_code']}"; ?></td>
                                <td><?php if ($row['account_status'] == "1") {
                                        echo "Blocked";
                                    } else {
                                        echo "Active";
                                    } ?></td>
                                <td><?php if ($row['account_level'] == "2") {
                                        echo "Admin";
                                    } else {
                                        echo "User";
                                    } ?></td>
                                <td>
                                    <div class="row"><a href="#editModal<?php echo "{$row['user_id']}"; ?>" data-toggle="modal" style="text-decorations:none; color:inherit;"><button class="btn"><em class="fa fa-edit"></em> Edit</a></button>

                                        <form action="includes/delete.php" method="post">
                                            <input type="hidden" id="userId" name="user_id" value="<?php echo "{$row['user_id']}"; ?>">
                                            <button type="submit" name="btnDeleteUsr" class="btn" value=""><em class="fa fa-trash"></em> Delete</button>
                                        </form>
                                    </div>
                                </td>

                                <div class="modal fade" id="editModal<?php echo "{$row['user_id']}"; ?>" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Change Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="includes/edit.php" method="post">
                                                    <input type="hidden" id="userId" name="user_id" value="<?php echo "{$row['user_id']}"; ?>">
                                                    <div class="form-group">
                                                        <input type="text" name="forename" class="form-control" placeholder="<?php echo "{$row['forename']}"; ?>" value="<?php if (isset($_POST['forename'])) {
                                                                                                                                                                                echo $_POST['forename'];
                                                                                                                                                                            } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="surname" class="form-control" placeholder="<?php echo "{$row['surname']}"; ?>" value="<?php if (isset($_POST['surname'])) {
                                                                                                                                                                            echo $_POST['surname'];
                                                                                                                                                                        } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" name="email" class="form-control" placeholder="<?php echo "{$row['email']}"; ?>" value="<?php if (isset($_POST['email'])) {
                                                                                                                                                                        echo $_POST['email'];
                                                                                                                                                                    } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="phone_no" class="form-control" placeholder="<?php echo "{$row['phone_no']}"; ?>" value="<?php if (isset($_POST['phone_no'])) {
                                                                                                                                                                                echo $_POST['phone_no'];
                                                                                                                                                                            } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <select name="account_status" class="form-control">
                                                            <option value="" selected disabled hidden>Account Status</option>
                                                            <option value="1">Blocked</option>
                                                            <option value="2">Active</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select name="account_level" class="form-control">
                                                            <option value="" selected disabled hidden>Account Type</option>
                                                            <option value="1">User</option>
                                                            <option value="2">Admin</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="form-group">
                                                            <input type="submit" name="btnEditUser" class="btn btn-dark btn-block" value="Save Changes" />
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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