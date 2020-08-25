<?php 
// Established Connection
include('./controller/order.php');
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
	<link rel="stylesheet" href="./style.css">


    <title>Utpanna Admin Panel</title>
  </head>
  <body>
  	<div id="page-container" class="main-admin">
	  	<nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed w-100">
		  <a class="navbar-brand" href="#"></a>
		  <div id="open-menu" class="menu-bar">
		  	<div class="bars"></div>
		  </div>
		    <!-- <ul class="navbar-nav ml-auto">
		      <li class="nav-item dropdown ets-right-0">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <img src="" class="img-fluid rounded-circle border user-profile">
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#">Action</a>
		          <a class="dropdown-item" href="#">Another action</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>
		      </li>
		    </ul> -->
		</nav>
	  	<div class="side-bar">
	  		<div class="side-bar-links">
	  			<div class="side-bar-logo text-center py-3">
	  				<img src="../assests/img/logo.png" class="img-fluid rounded-circle border bg-secoundry mb-3">
	  				<h5>Organic Utpanna</h5>
	  			</div>
	  			<ul class="navbar-nav">
	  				<li class="nav-item">
	  					<a href="index.php" class="nav-links d-block"><i class="fa fa-home pr-2"></i> Products</a>
	  				</li>
	  				<li class="nav-item">
	  					<a href="users.php" class="nav-links d-block"><i class="fa fa-users pr-2"></i> Users</a>
	  				</li>
	  				<li class="nav-item">
	  					<a href="orders.php" class="nav-links d-block"><i class="fa fa-database pr-2"></i> Orders</a>
	  				</li>
	  			</ul>
	  		</div>
	  		<div class="side-bar-icons">
	  			<div class="icons d-flex flex-column align-items-center">
	  				<a href="index.php" class="set-width text-center display-inline-block my-1"><i class="fa fa-home"></i></a>
	  				<a href="users.php" class="set-width text-center display-inline-block my-1"><i class="fa fa-users"></i></a>
	  				<a href="orders.php" class="set-width text-center display-inline-block my-1"><i class="fa fa-database"></i></a>
	  			</div>
	  		</div>
	  	</div>
  	<div class="main-body-content w-100 ets-pt">
  		<div class="table-responsive bg-light">
  			<table class="table">
  				<tr>
  					<th>Order Id</th>
  					<th>User Name</th>
  					<th>Email</th>
  					<th>Zip Code</th>
  					<th>Address</th>
  					<th>Phone</th>
  					<th>Payment Mode</th>
  					<th>Products</th>
  					<th>Order Time</th>
  					<th>User Id</th>
  					<th>Payment Status</th>
  					<th>Order Status</th>
  					<th>Dispatched Message</th>
  					<th>Shipped Message</th>
  					<th>Delivery Message</th>
  					<th class="text-success">Change Status</th>
  				</tr>
     <?php foreach ($all_user_orders as $order_data) { ?>
                <tr>
                <td><?php echo  $order_data['id']  ?></td>
                <td><?php echo  $order_data['name']  ?></td>
                <td><?php echo  $order_data['email']  ?></td>
                <td><?php echo  $order_data['zip_code']  ?></td>
                <td><?php echo  $order_data['address']  ?></td>
                <td><?php echo  $order_data['phone']  ?></td>
                <td><?php echo  $order_data['payment']  ?></td>
                 <td><?php $products_arr = explode(',' ,$order_data['products']);
                            foreach ($products_arr as $product) {
                                echo $product . "<br>";
                            }
                            ?></td>
                <td><?php echo  $order_data['order_time']  ?></td>
                <td><?php echo  $order_data['user_id']  ?></td>
                <td><?php echo  $order_data['payment_status'] === ""? "Not Paid" : $order_data['payment_status']  ?></td>
                <td><?php echo  $order_data['order_status']  ?></td>
                <td><?php echo  $order_data['dispatched_msg']  ?></td>
                <td><?php echo  $order_data['shipped_msg']  ?></td>
                <td><?php echo  $order_data['delivery_msg']  ?></td>
                <form action="./change_order_status.php" method="post">
                    <input type="hidden" name="orderStatus" value="<?php echo  $order_data['order_status']  ?>">
                    <input type="hidden" name="payment_status" value="<?php echo  $order_data['payment_status']  ?>">
                    <input type="hidden" name="dispatched_msg" value="<?php echo  $order_data['dispatched_msg']  ?>">
                    <input type="hidden" name="shipped_msg" value="<?php echo  $order_data['shipped_msg']  ?>">
                    <input type="hidden" name="delivery_msg" value="<?php echo  $order_data['delivery_msg']  ?>">
                    <input type="hidden" name="orderID" value="<?php echo  $order_data['id']  ?>">
                    <td><button type="submit" class="btn btn-danger btn-xs" >Change Status</button></td>
                </form>
            </tr>
               <?php }  ?>
			</table>
  		</div>
  	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="addproductLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addproductLabel">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="index.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="item_name">Item Name</label>
				<input required type="text" class="form-control" name="item_name" id="item_name" placeholder="Enter Item Name">
			</div>
			<div class="form-group">
				<label for="item_image">Item Image</label>
				<input required type="file" class="form-control" name="item_image" id="item_image" placeholder="Item Image">
			</div>
			<div class="form-group">
				<label for="size">Size</label>
				<input required type="text" class="form-control" name="size" id="size" placeholder="Ex: 500gm">
			</div>
			<div class="form-group">
				<label for="price">Price</label>
				<input required type="text" class="form-control" name="price" id="price" placeholder="Price">
			</div>
			<div class="form-group">
				<label for="category">Category</label>
				<input required type="text" class="form-control" name="category" id="category" placeholder="Category rice, millet">
			</div>
			<div class="d-flex">
				<div class="form-group pr-2">
					<label for="bbsr">Bhubaneswar</label>
					<input required type="text" class="form-control" name="bbsr" id="bbsr" placeholder="yes or no">
				</div>
				<div class="form-group pr-2">
					<label for="cuttack">Cuttack</label>
					<input required type="text" class="form-control" name="cuttack" id="cuttack" placeholder="yes or no">
				</div>
				<div class="form-group pr-2">
					<label for="jharsuguda">Jharsuguda</label>
					<input required type="text" class="form-control" name="jharsuguda" id="jharsuguda" placeholder="yes or no">
				</div>
			</div>
			<div class="d-flex">
				<div class="form-group pr-2">
					<label for="brahmapur">Brahmapur</label>
					<input required type="text" class="form-control" name="brahmapur" id="brahmapur" placeholder="yes or no">
				</div>
				<div class="form-group pr-2">
					<label for="sundergarh">Sundergarh</label>
					<input required type="text" class="form-control" name="sundergarh" id="sundergarh" placeholder="yes or no">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" name="add_product_btn" class="btn btn-primary">Save changes</button>
			</div>
		</form>
      </div>
      
    </div>
  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
    <script type="text/javascript">
    	jQuery(document).ready(function(){
    		jQuery("#open-menu").click(function(){
    			if(jQuery('#page-container').hasClass('show-menu')){
    			jQuery("#page-container").removeClass('show-menu');
    		}
    			
    			else{
    			jQuery("#page-container").addClass('show-menu');
    			}
    		});
    	});
    </script>
    
  </body>
</html>
