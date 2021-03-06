<?php

session_start();

if (isset($_SESSION['accountID'])) {
	include('includes/header_loggedin.php');
	include('includes/chat.php');
} else {
	header("Location: /login.php");
}

?>

<script src="dist/bundle.js"></script>

<div class="wrapper" style="position:static !important;">

	<nav aria-label="Main Menu" class="main_menu" id="main_menu"></nav>

	<div class="submenu">
		<a class="logo" href="#">miniPaint</a>
		<div class="block attributes" id="action_attributes"></div>
		<button class="undo_button" id="undo_button" type="button">
			<span class="sr_only">Undo</span>
		</button>
	</div>

	<div class="sidebar_left" id="tools_container"></div>


	<div class="middle_area" id="middle_area">

		<canvas class="ruler_left" id="ruler_left"></canvas>
		<canvas class="ruler_top" id="ruler_top"></canvas>

		<div class="main_wrapper" id="main_wrapper">
			<div class="canvas_wrapper" id="canvas_wrapper">
				<div id="mouse"></div>
				<div class="transparent-grid" id="canvas_minipaint_background"></div>
				<canvas id="canvas_minipaint">
					<div class="trn error">
						Your browser does not support canvas or JavaScript is not enabled.
					</div>
				</canvas>
			</div>
		</div>
	</div>

	<div class="sidebar_right">
		<div class="preview block">
			<h2 class="trn toggle" data-target="toggle_preview">Preview</h2>
			<div id="toggle_preview"></div>
		</div>

		<div class="colors block">
			<h2 class="trn toggle" data-target="toggle_colors">Colors</h2>
			<div class="content" id="toggle_colors"></div>
		</div>

		<div class="block" id="info_base">
			<h2 class="trn toggle toggle-full" data-target="toggle_info">Information</h2>
			<div class="content" id="toggle_info"></div>
		</div>

		<div class="details block" id="details_base">
			<h2 class="trn toggle toggle-full" data-target="toggle_details">Layer details</h2>
			<div class="content" id="toggle_details"></div>
		</div>

		<div class="layers block">
			<h2 class="trn">Layers</h2>
			<div class="content" id="layers_base"></div>
		</div>
	</div>
</div>

<div class="mobile_menu">
	<button class="left_mobile_menu" id="left_mobile_menu_button" type="button">
		<span class="sr_only">Toggle Menu</span>
	</button>
	<button class="right_mobile_menu" id="mobile_menu_button" type="button">
		<span class="sr_only">Toggle Menu</span>
	</button>
</div>
<div class="hidden" id="tmp"></div>
<div id="popups"></div>

<script src="./js/artwork.js"></script>

<?php

include('includes/footer.php');

?>