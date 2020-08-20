<?php include('./views/header.php') ?>
<?php include('./controller/cartCrudCtrl.php');
      $grand_total = 0;
      $shipping = 0;
      ?>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">CART</h1>
     </div>
</section>
<div id="couponCheck"></div>
<div class="container mb-4">
    <div class="row">
        <div class="col-12" id="cart-error">

        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_cart_items as $cart_item) { ?>
                            <tr>
                            <td class="cart-img"><img src="<?php echo $cart_item['product_image']  ?>" /> </td>
                            <td><?php echo $cart_item['product_name']  ?><br>
                            Rs.<?php echo $cart_item['product_price'] ?>
                                </td>
                            <!-- NOTE  Hidden Inputs -->
                                <input type="hidden" class="hCartItemId" value="<?php echo $cart_item['id'] ?>">
                                <input type="hidden" class="hCartUserId" value="<?php echo $cart_item['user_id'] ?>">
                                <input type="hidden" class="hCartItemPrice" value="<?php echo $cart_item['product_price'] ?>">
                                <input type="hidden" class="hCartItemMainPrice" value="<?php echo $cart_item['main_price'] ?>">
                            <!-- NOTE End  Hidden Inputs -->
                            <td><input class="form-control pQuantity" min="1" type="number" value="<?php echo $cart_item['quantity']  ?>" /></td>
                            <td class="text-right"><a href="./controller/cartCtrl.php?deleteFromCart=<?php echo $cart_item['id'] ?>&userId=<?php echo $cart_item['user_id'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a> </td>
                            <?php  $grand_total += $cart_item['product_price']  ?>
                            <?php  $shipping =  $grand_total < 499 ? 60 : 0  ?>
                        </tr>
                        <?php }  ?>
                        
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right" >Rs <span  id="grandTotal"><?php echo $grand_total  ?></span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right" id="shipping">Rs.<?php echo $shipping  ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Coupon</td>
                            <td class="text-right coupon"><input placeholder="Enter Coupon" type="text" class="coupon" id="coupon"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <input type="hidden" id="coupon_code" name="coupon_code">
                            <td class="text-right"><strong>Rs. <span id="fullPayment"><?php echo $full_payment=$grand_total + $shipping  ?></span></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="coupon-alert mb-2 text-center"></div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12 col-md-6 text-right">
                    <a href="./index.php" class="btn btn-lg btn-block btn-outline-success text-uppercase">Continue Shopping</a>
                </div>
                <div class="col-sm-12 col-md-6 mb-sm-3 text-right">
                    <form action="./checkout.php" method="get">
                    <input type="hidden" name="couponApp" id="couponApp" value="no" ?>
                    <input type="hidden" name="full_payment" value="<?php echo $full_payment ?>">
                    <input type="hidden" name="grand_total" value="<?php echo $grand_total ?>">
                    <button type="submit" class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('./views/footer.php') ?>
