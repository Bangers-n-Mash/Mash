<?php

require('../includes/connect_db.php');

?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Campus
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Campus Name</th>
                        <th>Campus Address</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Campus Name</th>
                        <th>Campus Address</th>
                        <th>Actions</th>

                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $g = "SELECT * FROM campus";
                    $n = mysqli_query($link, $g);
                    if (mysqli_num_rows($n) > 0) {
                        while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
                    ?>
                            <tr>
                                <td><?php echo "{$row['campus_name']}"; ?></td>
                                <td><?php echo "{$row['campus_address']}"; ?></td>
                                <td>
                                    <div class="row">
                                        <form action="includes/delete.php" method="post">
                                            <input type="hidden" id="campusName" name="campus_id" value="<?php echo "{$row['campus_id']}"; ?>">
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
                <a href="#addCampusModal" data-toggle="modal" style="text-decoration:none; color:inherit;"><button class="btn"><em class="fa fa-plus"></em> Add New Campus</a></button>
                <hr>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="addCampusModal" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">New Campus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="includes/edit.php" method="post">
                    <div class="form-group">
                        <input type="text" name="new_campus" class="form-control" placeholder="Campus Name" value="<?php if (isset($_POST['new_campus'])) {
                                                                                                                echo $_POST['new_campus'];
                                                                                                            } ?>">

                    </div>
                    <div class="form-group">
                        <input type="text" name="campus_address" class="form-control" placeholder="Campus Address" value="<?php if (isset($_POST['campus_address'])) {
                                                                                                                echo $_POST['campus_address'];
                                                                                                            } ?>">

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="submit" name="btnEditcampus" class="btn btn-dark btn-block" value="Add campus" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>