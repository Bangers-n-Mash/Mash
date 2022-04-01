<?php

require('../includes/connect_DB.php');

?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Artwork Table
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Art ID</th>
                        <th>Art Type</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>File Location </th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Art ID</th>
                        <th>Art Type</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>File Location </th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $g = "SELECT * FROM artwork WHERE artType='Picture'";
                    $n = mysqli_query($link, $g);
                    if (mysqli_num_rows($n) > 0) {
                        while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
                    ?>
                            <tr>
                                <td><?php echo "{$row['artID']}"; ?></td>
                                <td><?php echo "{$row['artType']}"; ?></td>
                                <td><?php echo "{$row['title']}"; ?></td>
                                <td><?php echo "{$row['artDescription']}"; ?></td>
                                <td><?php echo "{$row['artFile']}"; ?></td>
                                <td>
                                    <?php
                                    if ($row['artVisibility'] == 1) {
                                        echo "Private";
                                    } else {
                                        echo "Public";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div class="row">
                                        <a href="#editartModal<?php echo "{$row['artID']}"; ?>" data-toggle="modal" style="text-decoration:none; color:inherit;"><button class="btn"><em class="fa fa-edit"></em> Edit</a></button>
                                        <form action="includes/delete.php" method="post">
                                            <input type="hidden" id="artID" name="artID" value="<?php echo "{$row['artID']}"; ?>">
                                            <button type="submit" name="btnDeleteUsr" class="btn" value=""><em class="fa fa-trash"></em> Delete</button>
                                        </form>
                                    </div>
                                </td>

                                <div class="modal fade" id="editartModal<?php echo "{$row['artID']}"; ?>" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
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
                                                    <input type="hidden" id="artID" name="artID" value="<?php echo "{$row['artID']}"; ?>">
                                                    <input type="hidden" id="artType" name="artType" value="<?php echo "{$row['artType']}"; ?>">
                                                    <div class="form-group">
                                                        <input type="text" name="title" class="form-control" placeholder="<?php echo "{$row['title']}"; ?>" value="<?php if (isset($_POST['title'])) {
                                                                                                                                                                                    echo $_POST['title'];
                                                                                                                                                                                } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="artDescription" class="form-control" placeholder="<?php echo "{$row['artDescription']}"; ?>" value="<?php if (isset($_POST['artDescription'])) {
                                                                                                                                                                                        echo $_POST['artDescription'];
                                                                                                                                                                                    } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <select name="artVisibility" class="form-control">
                                                            <option value="" selected disabled hidden>Art Privacy</option>
                                                            <option value="1">Private</option>
                                                            <option value="2">Public</option>
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