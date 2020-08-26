<?php include('./views/header.php') ?>
<?php
if(!isset($_SESSION['userId'])){
  header("Location: ./login.php?error=Log In To Initiate Order");
}
?>
<?php 
$grand_total = $_POST['grandTotal'];
if($_POST['hCouponStatus'] === "yes"){
  $grand_total = ($grand_total * 0.9);
  if($grand_total < 500){
    $grand_total += 60;
  }
} 
else{
  $grand_total = $_POST['fullPayment'];
}

$grand_total = round($grand_total,0);
?>

<!-- Checkout form -->
<div class="check-out">
<div class="login-page">
    <div class="form">
      <form action="./controller/payOnlineCtrl.php" method="POST">
        <h3 class="text-center text-danger pb-3">Amount To Be Paid: <span class="text-dark">Rs.<?php echo $grand_total  ?></span></h3>
        <input required name="c_name" id="c_name" value="<?php echo $_POST['c_name'] ?>"  type="hidden" />
        <input required name="c_phone" id="c_phone"  type="hidden" value="<?php echo $_POST['c_phone'] ?>" />
        <input required name="c_email" id="c_email" type="hidden" value="<?php echo $_POST['c_email'] ?>" />
        <input required name="c_address" id="c_address" type="hidden" value="<?php echo $_POST['c_address'] ?>" />
        <input required name="c_zip" id="c_zip" type="hidden" value="<?php echo $_POST['c_zip'] ?>" />
        <input required type="hidden" name="hUserId" value="<?php echo $_SESSION['userId'] ?>">
        <input required type="hidden" name="hCouponStatus" value="<?php echo $_POST['hCouponStatus'] ?>">
        <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="rzp_live_MoRc4yI15zl4G5" 
        data-amount="<?php echo $grand_total * 100 ?>"
        data-currency="INR"
        data-buttontext="Pay with Razorpay"
        data-name="Organic Utpanna"
        data-description="Test transaction"
        data-image="https://example.com/your_logo.jpg"
        data-prefill.name="<?php echo $_POST['c_name'] ?>"
        data-prefill.email= "<?php echo $_POST['c_email'] ?>"
        data-prefill.contact="<?php echo $_POST['c_phone'] ?>"
        data-theme.color="#F37254"
    ></script>
</form>
    </div>
  </div>
</div>

<!-- Checkout form -->
<?php include('./views/footer.php') ?>