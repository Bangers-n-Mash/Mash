<?php

require('../includes/connect_db.php');

?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Vehicle Table
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Vehicle ID</th>
                        <th>Vehicle Registration</th>
                        <th>Assigned Campus</th>
                        <th>Vehicle Make</th>
                        <th>Vehicle Model</th>
                        <th>Vehicle Colour</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Vehicle ID</th>
                        <th>Vehicle Registration</th>
                        <th>Assigned Campus</th>
                        <th>Vehicle Make</th>
                        <th>Vehicle Model</th>
                        <th>Vehicle Colour</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $g = "SELECT * FROM vehicle";
                    $n = mysqli_query($link, $g);
                    if (mysqli_num_rows($n) > 0) {
                        while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
                    ?>
                            <tr>
                                <td><?php echo "{$row['vehicle_id']}"; ?></td>
                                <td><?php echo "{$row['vehicle_reg']}"; ?></td>
                                <td>
                                    <?php
                                    $q = "SELECT * FROM campus WHERE campus_id = '{$row['campus_id']}'";
                                    $r = mysqli_query($link, $q);
                                    if (mysqli_num_rows($r) == 0) {
                                        echo "No Campus Assigned";
                                    } else {
                                        $cam = mysqli_fetch_array($r, MYSQLI_ASSOC);

                                        echo "{$cam['campus_name']}";
                                    }
                                    ?>
                                </td>
                                <td><?php echo "{$row['vehicle_make']}"; ?></td>
                                <td><?php echo "{$row['vehicle_model']}"; ?></td>
                                <td><?php echo "{$row['vehicle_colour']}"; ?></td>
                                <td>
                                    <?php
                                    if ($row['vehicle_status'] == 1) {
                                        echo "Inactive";
                                    } else {
                                        echo "Active";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div class="row">
                                        <a href="#editvehicleModal<?php echo "{$row['vehicle_id']}"; ?>" data-toggle="modal" style="text-decoration:none; color:inherit;"><button class="btn"><em class="fa fa-edit"></em> Edit</a></button>
                                        <form action="includes/delete.php" method="post">
                                            <input type="hidden" id="vehicleID" name="vehicle_id" value="<?php echo "{$row['vehicle_id']}"; ?>">
                                            <button type="submit" name="btnDeleteUsr" class="btn" value=""><em class="fa fa-trash"></em> Delete</button>
                                        </form>
                                    </div>
                                </td>

                                <div class="modal fade" id="editvehicleModal<?php echo "{$row['vehicle_id']}"; ?>" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
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
                                                    <input type="hidden" id="vehicleId" name="vehicle_id" value="<?php echo "{$row['vehicle_id']}"; ?>">
                                                    <div class="form-group">
                                                        <input type="text" name="vehicle_reg" class="form-control" placeholder="<?php echo "{$row['vehicle_reg']}"; ?>" value="<?php if (isset($_POST['vehicle_reg'])) {
                                                                                                                                                                                    echo $_POST['vehicle_reg'];
                                                                                                                                                                                } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <select name="campus_id" class="form-control">
                                                            <option value="" selected disabled hidden>Change Assigned Campus</option>

                                                            <?php

                                                            $f = "SELECT * FROM campus";
                                                            $a = mysqli_query($link, $f);
                                                            if (mysqli_num_rows($a) > 0) {
                                                                while ($coc = mysqli_fetch_array($a, MYSQLI_ASSOC)) {

                                                            ?>
                                                                    <option value="<?php echo "{$coc['campus_id']}"; ?>"><?php echo "{$coc['campus_name']}"; ?></option>
                                                            <?php
                                                                }
                                                            }

                                                            ?>

                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="vehicle_make" class="form-control" placeholder="<?php echo "{$row['vehicle_make']}"; ?>" value="<?php if (isset($_POST['vehicle_make'])) {
                                                                                                                                                                                        echo $_POST['vehicle_make'];
                                                                                                                                                                                    } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="vehicle_model" class="form-control" placeholder="<?php echo "{$row['vehicle_model']}"; ?>" value="<?php if (isset($_POST['vehicle_model'])) {
                                                                                                                                                                                        echo $_POST['vehicle_model'];
                                                                                                                                                                                    } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="vehicle_colour" class="form-control" placeholder="<?php echo "{$row['vehicle_colour']}"; ?>" value="<?php if (isset($_POST['vehicle_colour'])) {
                                                                                                                                                                                            echo $_POST['vehicle_colour'];
                                                                                                                                                                                        } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <select name="vehicle_status" class="form-control">
                                                            <option value="" selected disabled hidden>Vehicle Status</option>
                                                            <option value="1">Inactive</option>
                                                            <option value="2">Active</option>
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
                <a href="#addvehicleModal" data-toggle="modal" style="text-decoration:none; color:inherit;"><button class="btn"><em class="fa fa-plus"></em> Add New vehicle</a></button>
                <hr>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="addvehicleModal" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Vehicle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="includes/edit.php" method="post">
                    <div class="form-group">
                        <input type="text" name="new_vehicle" class="form-control" placeholder="Vehicle Registration" value="<?php if (isset($_POST['new_vehicle'])) {
                                                                                                                                    echo $_POST['new_vehicle'];
                                                                                                                                } ?>" required>

                    </div>
                    <div class="form-group">
                        <select name="campus_id" class="form-control">
                            <option value="" selected disabled hidden>Change Assigned Campus</option>

                            <?php

                            $f = "SELECT * FROM campus";
                            $a = mysqli_query($link, $f);
                            if (mysqli_num_rows($a) > 0) {
                                while ($coc = mysqli_fetch_array($a, MYSQLI_ASSOC)) {

                            ?>
                                    <option value="<?php echo "{$coc['campus_id']}"; ?>"><?php echo "{$coc['campus_name']}"; ?></option>
                            <?php
                                }
                            }

                            ?>

                        </select>

                    </div>
                    <div class="form-group">
                        <input type="text" name="vehicle_make" class="form-control" placeholder="Vehicle Make" value="<?php if (isset($_POST['vehicle_make'])) {
                                                                                                                            echo $_POST['vehicle_make'];
                                                                                                                        } ?>" required>

                    </div>
                    <div class="form-group">
                        <input type="text" name="vehicle_model" class="form-control" placeholder="Vehicle Model" value="<?php if (isset($_POST['vehicle_model'])) {
                                                                                                                            echo $_POST['vehicle_model'];
                                                                                                                        } ?>" required>

                    </div>
                    <div class="form-group">
                        <input type="text" name="vehicle_colour" class="form-control" placeholder="Vehicle Colour" value="<?php if (isset($_POST['vehicle_colour'])) {
                                                                                                                                echo $_POST['vehicle_colour'];
                                                                                                                            } ?>" required>

                    </div>
                    <div class="form-group">
                        <select name="vehicle_status" class="form-control">
                            <option value="" selected disabled hidden>Vehicle Status</option>
                            <option value="1">Inactive</option>
                            <option value="2">Active</option>
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