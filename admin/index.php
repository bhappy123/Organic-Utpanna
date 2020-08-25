<?php 
// Established Connection
include('./controller/product.php');
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
	<link rel="stylesheet" href="./style.css">
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
  					<th>Id</th>
  					<th>item</th>
  					<th>image</th>
  					<th>size</th>
  					<th>price</th>
  					<th>category</th>
  					<th>bbsr</th>
  					<th>cuttack</th>
  					<th>brahampur</th>
  					<th>jharsuguda</th>
  					<th>sundergarh</th>
  					<th class="text-success">Edit</th>
  					<th class="text-danger">Delete</th>
  				</tr>
				<?php foreach($products as $product){ ?>  
				<tr>
  					<td><?php echo htmlspecialchars($product['id']) ?></td>
					<td><?php echo htmlspecialchars($product['item_name']) ?></td>
					<td><img width="80px" height="80px" src="<?php echo htmlspecialchars($product['item_image']) ?>" alt=""></td>  
  					<td><?php echo htmlspecialchars($product['size']) ?></td>
  					<td><?php echo htmlspecialchars($product['price']) ?></td>
  					<td><?php echo htmlspecialchars($product['category']) ?></td>
  					<td><?php echo htmlspecialchars($product['bbsr']) ?></td>
  					<td><?php echo htmlspecialchars($product['cuttack']) ?></td>
  					<td><?php echo htmlspecialchars($product['brahmapur']) ?></td>
  					<td><?php echo htmlspecialchars($product['jharsuguda']) ?></td>
					<td><?php echo htmlspecialchars($product['sundergarh']) ?></td>
					<td>
						<form action="edit.php" method="POST">
							<input type="hidden" value="<?php echo $product['id'] ?>" name="hidden_edit_item_id">
							<button class="btn btn-success text-white" name="product_edit_btn" data-toggle="modal" data-target="#editproduct"><i class="fa fa-pencil" aria-hidden="true"></i></button>
						</form>  
					</td>
					<td>
					<form action="index.php" method="POST">
						<input type="hidden" value="<?php echo $product['id'] ?>" name="hidden_delete_item_id">
						<button type="submit" class="btn btn-danger text-white" name="product_delete_btn" ><i class="fa fa-trash" aria-hidden="true"></i></button>
					</form>
					</td>  
				</tr>
				<?php } ?>
			</table>
  		</div>
  	</div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success float-right mr-3 add-new-product-btn" data-toggle="modal" data-target="#addproduct">
  Add New Product
</button>

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
