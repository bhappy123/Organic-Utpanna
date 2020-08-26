<?php
require('./controller/order.php')
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


<main class="sign-up-main p-5 bg-success text-white" style="min-height: 100vh;">
    <section class="container py-5 px-4 border">
    <h1 class="text-uppercase text-center pb-3">Change Status</h1>
    <p class="bolder p-1 text-center">Current Order Status: <span><?php echo $_POST['orderStatus'] ?></span></p>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
			<select class="p-2 w-100 mb-4" name="order-status-change" id="order-status-change">
                <option value="Initiated">Initiated</option>
                <option value="Delivery">Delivery</option>
            </select>
        </div>
        <div class="form-group">
        <label for="payment_status">Payment Status</label>
			<select class="p-2 w-100 mb-4" name="payment_status" id="payment_status">
                <option value="Not Paid">Not Paid</option>
                <option value="Paid">Paid</option>
            </select>
        </div>
        <div class="form-group">
            <label for="delivery_msg">Delivery Message</label>
            <input type="text" class="p-2 w-100 mb-4" id="delivery_msg"name="delivery_msg" value="<?php echo $_POST['delivery_msg'] === "" ? "" : $_POST['delivery_msg'] ?>">
        </div>
        </div>
            <input type="hidden" name="orderId" value="<?php echo $_POST['orderID'] ?>">
            <button type="submit" class="btn btn-light btn-block" name="order_status_confirm">Confirm</button>
		</form>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        </section>
    </main>

</body>

</html>