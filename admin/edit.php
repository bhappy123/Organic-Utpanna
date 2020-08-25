<?php
// Established Connection
	require('./controller/product.php');
	$edit_item_id = $_POST['hidden_edit_item_id'];
	$sql = "SELECT * FROM `product` WHERE `id`='$edit_item_id'";
	$res = mysqli_query($conn, $sql);
	$result_item_details = mysqli_fetch_all($res, MYSQLI_ASSOC);
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


<body>


<main class="container bg-success text-white py-5 px-3">

	<h5 class="display-4 bolder text-white text-center" id="editproductLabel">Edit Product</h5>
	<div class="modal-body">
		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" value="$_POST['hidden_edit_item_id']">
			<div class="form-group">
				<label for="item_name">Item Name</label>
				<input type="text" class="form-control" name="item_name" id="item_name" value="<?php echo $result_item_details[0]['item_name'] ?>" placeholder="Enter Item Name">
			</div>
			<div class="form-group">
				<img width="100px" src="<?php echo $result_item_details[0]['item_image'] ?>" alt="">
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
				<button type="submit" name="edit_product_btn" class="btn btn-primary">Save changes</button>
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
</main>
</body>

</html>