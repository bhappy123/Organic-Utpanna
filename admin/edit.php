<?php
// Established Connection
include('db_config.php');

// Check File Chosen Or Not

if (isset($_POST['add_product_btn'])) {
	$size = $_POST['size'];
	$price = $_POST['price'];
	$category = $_POST['category'];
	$bbsr = $_POST['bbsr'];
	$cuttack = $_POST['cuttack'];
	$brahmapur = $_POST['brahmapur'];
	$jharsuguda = $_POST['jharsuguda'];
	$sundergarh = $_POST['sundergarh'];
	if (isset($_FILES['item_image'])) {
		// Fetching All the data to add a product
		$id = $_POST['hidden_edit_item_id'];
		$item_name = $_POST['item_name'];
		// Add image to db
		$item_image_name = $_FILES['item_image']['name'];
		$item_image_temp_name = $_FILES['item_image']['tmp_name'];
		$item_image = "../img" . $item_image_name;
		move_uploaded_file($item_image_temp_name, $item_image);
		echo $item_name . $size . $category;

		// SQL query to add product to the data
		$sql_edit_product = "UPDATE `product` SET `item_name`='$item_name',`item_image`='$item_image',`size`='$size',`price`='$price',`category`='$category',`bbsr`='$bbsr',`cuttack`='$cuttack',`brahmapur`='$brahmapur',`jharsuguda`='$jharsuguda',`sundergarh`='$sundergarh' WHERE `id`='$id'";
	} else { // SQL query to add product to the data
		$sql_edit_product = "UPDATE `product` SET `item_name`='$item_name',`size`='$size',`price`='$price',`category`='$category',`bbsr`='$bbsr',`cuttack`='$cuttack',`brahmapur`='$brahmapur',`jharsuguda`='$jharsuguda',`sundergarh`='$sundergarh' WHERE `id`='$id'";
	}	
	$run_add_product_query = mysqli_query($conn, $sql_edit_product);
	if ($run_add_product_query) {
		echo '<script>alert("product edited successfully")</script>';
		header("Location: index.php");
	} else {
		echo '<script>alert("Not edited")</script>';
	}
} else {
	$edit_item_id = $_POST['hidden_edit_item_id'];
	$sql = "SELECT * FROM `product` WHERE `id`='$edit_item_id'";
	$res = mysqli_query($conn, $sql);
	$result_item_details = mysqli_fetch_all($res, MYSQLI_ASSOC);
	// $json = json_encode($result_item_details);
	// echo "<pre>$json</pre>";
	// print_r($result_item_details);
	// echo $result_item_details[0]['item_name'];
	// echo $edit_item_id;
}
// Run Insert Command
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Utpanna Admin Panel</title>
</head>
<style type="text/css">
	.navbar.bg-light {
		background-color: #000 !important;
		transition: ease 0.5s;
	}

	.user-profile {
		width: 50px;
		height: 50px;
		background-color: #f1f1f1;
	}

	.navbar .menu-bar {
		display: inline-block;
		width: 50px;
		height: 50px;
		margin-right: 10px;
		position: relative;
		cursor: pointer;
	}

	.navbar .menu-bar .bars {
		position: relative;
		top: 50%;
		width: 30px;
		height: 2px;
		background-color: #fff;
	}

	.navbar .menu-bar .bars::after {
		content: "";
		position: absolute;
		bottom: -8px;
		width: 100%;
		height: 2px;
		background-color: #fff;
	}

	.navbar .menu-bar .bars::before {
		content: "";
		position: absolute;
		top: -8px;
		width: 100%;
		height: 2px;
		background-color: #fff;
	}

	.navbar ul.navbar-nav li.nav-item.ets-right-0 .dropdown-menu {
		left: auto;
		right: 0;
		position: absolute;
	}

	.side-bar {
		position: fixed;
		top: 81px;
		left: 0;
		padding: 15px;
		display: inline-block;
		width: 100px;
		background-color: #fff;
		box-shadow: 0px 0px 8px #ccc;
		height: 100vh;
		transition: ease 0.5s;
		overflow-y: auto;
	}

	.main-body-content {
		display: inline-block;
		padding: 15px;
		background-color: #eef4fb;
		height: 100vh;
		padding-left: 100px;
		transition: ease 0.5s;
	}

	.ets-pt {
		padding-top: 100px;
	}

	.main-admin.show-menu .side-bar {
		width: 250px;
	}

	.main-admin.show-menu .main-body-content {
		padding-left: 265px;
	}

	.main-admin.show-menu .navbar .menu-bar .bars {
		width: 15px;
	}

	.main-admin.show-menu .navbar .menu-bar .bars::after {
		width: 10px;
	}

	.main-admin.show-menu .navbar .menu-bar .bars::before {
		width: 25px;
	}

	.main-admin.show-menu .side-bar-links {
		opacity: 1;
	}

	.main-admin.show-menu .side-bar .side-bar-icons {
		opacity: 0;
	}

	/**** end effacts ****/
	.side-bar .side-bar-links {
		opacity: 0;
		transition: ease 0.5s;
	}

	.side-bar .side-bar-links ul.navbar-nav li a {
		font-size: 14px;
		color: #000;
		font-weight: 500;
		padding: 10px;
	}

	.side-bar .side-bar-links ul.navbar-nav li a i {
		font-size: 20px;
		color: #8ac1f6;
	}

	.side-bar .side-bar-links ul.navbar-nav li a:hover,
	.side-bar-links ul.navbar-nav li a:focus {
		text-decoration: none;
		background-color: #8ac1f6;
		color: #fff;
	}

	.side-bar .side-bar-links ul.navbar-nav li a:hover i {
		color: #fff;
	}

	.side-bar .side-bar-logo img {
		width: 100px;
		height: 100px;
	}

	.side-bar .side-bar-icons {
		position: absolute;
		top: 20px;
		right: 0;
		width: 100px;
		opacity: 1;
		transition: ease 0.5s;
	}

	.side-bar .side-bar-icons .side-bar-logo img {
		width: 50px;
		height: 50px;
		object-fit: cover;
	}

	.side-bar .side-bar-icons .side-bar-logo h5 {
		font-size: 14px;
	}

	.side-bar .side-bar-icons .set-width {
		color: #000;
		font-size: 32px;
	}

	.side-bar .side-bar-icons .set-width:hover,
	.side-bar .side-bar-icons .set-width:focus {
		color: #8ac1f6;
		text-decoration: none;
	}
</style>

<body>




	<h5 class="" id="editproductLabel">Edit Product</h5>
	<div class="modal-body">
		<form action="edit.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="item_name">Item Name</label>
				<input type="text" class="form-control" name="item_name" id="item_name" value="<?php echo $result_item_details[0]['item_name'] ?>" placeholder="Enter Item Name">
			</div>
			<div class="form-group">
				<img src="<?php echo $result_item_details[0]['item_image'] ?>" alt="">
				<label for="item_image">Item Image</label>
				<!-- <input type="file" class="form-control" name="item_image" value="<?php echo $result_item_details[0]['item_image'] ?>" id="item_image" placeholder="Item Image"> -->
			</div>
			<div class="form-group">
				<label for="size">Size</label>
				<input required value="<?php echo $result_item_details[0]['size'] ?>" type="text" class="form-control" name="size" id="size" placeholder="Ex: 500gm">
			</div>
			<div class="form-group">
				<label for="price">Price</label>
				<input required value="<?php echo $result_item_details[0]['price'] ?>" type="text" class="form-control" name="price" id="price" placeholder="Price">
			</div>
			<div class="form-group">
				<label for="category">Category</label>
				<input required value="<?php echo $result_item_details[0]['category'] ?>" type="text" class="form-control" name="category" id="category" placeholder="Category rice, millet">
			</div>
			<div class="d-flex">
				<div class="form-group pr-2">
					<label for="bbsr">Bhubaneswar</label>
					<input required value="<?php echo $result_item_details[0]['bbsr'] ?>" type="text" class="form-control" name="bbsr" id="bbsr" placeholder="yes or no">
				</div>
				<div class="form-group pr-2">
					<label for="cuttack">Cuttack</label>
					<input required value="<?php echo $result_item_details[0]['cuttack'] ?>" type="text" class="form-control" name="cuttack" id="cuttack" placeholder="yes or no">
				</div>
				<div class="form-group pr-2">
					<label for="jharsuguda">Jharsuguda</label>
					<input required value="<?php echo $result_item_details[0]['jharsuguda'] ?>" type="text" class="form-control" name="jharsuguda" id="jharsuguda" placeholder="yes or no">
				</div>
			</div>
			<div class="d-flex">
				<div class="form-group pr-2">
					<label for="brahmapur">Brahmapur</label>
					<input required value="<?php echo $result_item_details[0]['brahmapur'] ?>" type="text" class="form-control" name="brahmapur" id="brahmapur" placeholder="yes or no">
				</div>
				<div class="form-group pr-2">
					<label for="sundergarh">Sundergarh</label>
					<input required value="<?php echo $result_item_details[0]['sundergarh'] ?>" type="text" class="form-control" name="sundergarh" id="sundergarh" placeholder="yes or no">
				</div>
			</div>
			<input type="hidden" value="<?php echo $edit_item_id ?>" name="hidden_edit_item_id">
			<div>
				<button type="submit" name="add_product_btn" class="btn btn-primary">Save changes</button>
			</div>
		</form>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery("#open-menu").click(function() {
					if (jQuery('#page-container').hasClass('show-menu')) {
						jQuery("#page-container").removeClass('show-menu');
					} else {
						jQuery("#page-container").addClass('show-menu');
					}
				});
			});
		</script>

</body>

</html>