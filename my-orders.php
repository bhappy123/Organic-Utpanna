<?php include('./views/header.php')  ?>
<?php include('./controller/orderCtrl.php')  ?>
<div class="previous-orders">
    <h1>My Orders</h1>
<div class="table-responsive" id="sailorTableArea">
    <table id="sailorTable" class="table table-striped table-bordered" width="100%">
 
        <thead>
            <tr>
                <th>Sl.</th>
                <th>Products & Quantity</th>
                <th>Address</th>
                <th>Zip Code</th>
                <th>Price</th>
                <th>Status</th>
                <th>Track</th>
                <th>Cancel</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($all_user_orders as $order_data) { ?>
                <tr>
                <td>#</td>
                 <td><?php $products_arr = explode(',' ,$order_data['products']);
                            foreach ($products_arr as $product) {
                                echo $product . "<br>";
                            }
                            ?></td>
                <td><?php echo  $order_data['address']  ?></td>
                <td><?php echo  $order_data['zip_code']  ?></td>
                <td><?php echo  $order_data['payment']  ?></td>
                <td><?php echo  $order_data['order_status']  ?></td>
                <td><a href="track-order.php?order=<?php echo  $order_data['id']?>&status=<?php echo $order_data['order_status'] ?>&dispatchMsg=<?php echo $order_data['dispatched_msg'] ?>&shippedMsg=<?php echo $order_data['shipped_msg'] ?>&deliveryMsg=<?php echo $order_data['delivery_msg'] ?>" class="btn btn-success">Track Order</a>  </td>
                <form action="./order-cancel.php" method="post">
                    <input type="hidden" name="orderID" value="<?php   ?>">
                    <td><button type="submit" class="btn btn-danger btn-xs" >Cancel</button></td>
                </form>
            </tr>
               <?php }  ?>
        </tbody>
    </table>
    </div>
</div>

<?php include('./views/footer.php')  ?>