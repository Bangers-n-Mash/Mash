<?php

require('../includes/connect_db.php');

?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Posts
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Post Title</th>
                        <th>Post Content</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Post Title</th>
                        <th>Post Content</th>
                        <th>Actions</th>

                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $g = "SELECT * FROM news";
                    $n = mysqli_query($link, $g);
                    if (mysqli_num_rows($n) > 0) {
                        while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
                    ?>
                            <tr>
                                <td><?php echo "{$row['post_title']}"; ?></td>
                                <td><?php echo "{$row['post_content']}"; ?></td>
                                <td>
                                    <div class="row">
                                        <a href="#editPostModal<?php echo "{$row['post_id']}"; ?>" data-toggle="modal" style="text-decoration:none; color:inherit;"><button class="btn"><em class="fa fa-edit"></em> Edit</a></button>
                                        <form action="includes/delete.php" method="post">
                                            <input type="hidden" id="campusName" name="post_id" value="<?php echo "{$row['post_id']}"; ?>">
                                            <button type="submit" name="btnDeleteUsr" class="btn" value=""><em class="fa fa-trash"></em> Delete</button>
                                        </form>
                                    </div>
                                </td>

                                <div class="modal fade" id="editPostModal<?php echo "{$row['post_id']}"; ?>" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Post</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="includes/edit.php" method="post">
                                                    <input type="hidden" id="postId" name="post_id" value="<?php echo "{$row['post_id']}"; ?>">
                                                    <div class="form-group">
                                                        <input type="text" name="post_title" class="form-control" placeholder="Post Title" value="<?php if (isset($row['post_title'])) {
                                                                                                                                                                                    echo "{$row['post_title']}";
                                                                                                                                                                                } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="5" cols="60" name="post_content" placeholder="Post Content"><?php if (isset($row['post_content'])) { echo $row['post_content']; } ?></textarea>
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
                <a href="#addPostModal" data-toggle="modal" style="text-decoration:none; color:inherit;"><button class="btn"><em class="fa fa-plus"></em> Add New Post</a></button>
                <hr>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">New Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="includes/edit.php" method="post">
                    <div class="form-group">
                        <input type="text" name="new_post" class="form-control" placeholder="Post Title" value="<?php if (isset($_POST['new_post'])) {
                                                                                                                    echo $_POST['new_post'];
                                                                                                                } ?>">

                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" cols="60" name="post_content"></textarea>

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="submit" name="btnEditcampus" class="btn btn-dark btn-block" value="Add Post" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>