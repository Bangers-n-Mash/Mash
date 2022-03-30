<?php

session_start();

if (isset($_SESSION['accountID'])) {
	include('includes/header_loggedin.php');
} else {
	header("Location: login.php");
}

?>
<div class="user-section bg-light">
	<div class="container">
		<?php
		echo "<div class=\"container\"><h1 class=\"text-center display-4\">Welcome {$_SESSION['forename']} {$_SESSION['surname']}</title></div>";
		?>
		<div class="row d-flex">
			<div class="col-sm-12 col-md-6">
				<div class="alert fade show" role="alert">

					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>User Details</th>

							</tr>
						</thead>
						<tbody>

							<tr>
								<td>First Name</td>
								<td><?php echo "{$_SESSION['firstname']}"; ?></td>
							</tr>
							<tv>
								<td>Last Name</td>
								<td><?php echo "{$_SESSION['lastname']}"; ?></td>
							</tv>
							<tr>
								<td>Email</td>
								<td><?php echo "{$_SESSION['email']}"; ?></td>
							</tr>
							<tr>
								<td>Account Type</td>
								<td><?php if ($_SESSION['account_type'] == "2") {
										echo "Admin";
									} else {
										echo "User";
									} ?></td>
							</tr>
							<tr>
								<td>Account Creattion Date</td>
								<td><?php echo "{$_SESSION['creation_date']}"; ?></td>
							</tr>
							<tr>
								<td>Date Of Birth</td>
								<td><?php echo "{$_SESSION['dateOfBirth']}"; ?></td>
							</tr>
						</tbody>
					</table>
					<div class="row">
						<div class="col">
							<a href="#" data-bs-toggle="modal" data-bs-target="#details"><em class="fa fa-edit"></em>Edit Details</a>
						</div>
						<div class="col">
							<a href="#" data-bs-toggle="modal" data-bs-target="#password"><em class="fa fa-edit"></em> Change Password</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6">
				<div class="alert fade show" role="alert">


				</div>
			</div>
		</div>
	</div>
</div>
</div>

<?php

include('includes/footer.php');

?>
<!--  =========================
=====    Modal Edit Details   =======
	=========================== -->


<div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Change Details</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="includes/edit.php" method="POST">
					<input type="hidden" id="accountID" name="accountID" value="<?php echo "{$_SESSION['accountID']}"; ?>">
					<div class="form-group">
						<input type="text" name="forename" class="form-control" placeholder="<?php echo "{$_SESSION['firstname']}"; ?>" value="<?php echo "{$_SESSION['firstname']}"; ?>">

					</div>
					<div class="form-group">
						<input type="text" name="surname" class="form-control" placeholder="<?php echo "{$_SESSION['lastname']}"; ?>" value="<?php echo "{$_SESSION['lastname']}"; ?>">

					</div>
					<div class="form-group">
						<input type="text" name="email" class="form-control" placeholder="<?php echo "{$_SESSION['email']}"; ?>" value="<?php echo "{$_SESSION['email']}"; ?>">

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

<!--  =============================
=====    Modal Change Password   =======
	=================================== -->


<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="password" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="includes/change-password.php" method="post">
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Confirm Email" value="<?php if (isset($_POST['email'])) {
																														echo $_POST['email'];
																													} ?>" required>

					</div>
					<div class="form-group">
						<input type="password" name="pass1" class="form-control" placeholder="New Password" value="<?php if (isset($_POST['pass1'])) {
																														echo $_POST['pass1'];
																													} ?>" required>

					</div>
					<div class="form-group">
						<input type="password" name="pass2" class="form-control" placeholder="Confirm New Password" value="<?php if (isset($_POST['pass2'])) {
																																echo $_POST['pass2'];
																															} ?>" required>

					</div>
					<div class="modal-footer">
						<div class="form-group">
							<input type="submit" name="btnChangePassword" class="btn btn-dark btn-block" value="Save Changes" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php

function alert($msg)
{
	echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>