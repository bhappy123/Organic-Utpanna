<?php include('./views/header.php') ?>
<?php
if(!isset($_SESSION['userId'])){
  header("Location: ./login.php?error=Log In To Initiate Order");
}
?>
<?php 
$grand_total = $_GET['grand_total'];
if($_GET['couponApp'] === "yes"){
  $grand_total = ($grand_total * 0.9);
  if($grand_total < 500){
    $grand_total += 60;
  }
} 
else{
  $grand_total = $_GET['full_payment'];
}

$grand_total = round($grand_total,0);
?>

<!-- Checkout form -->
<div class="check-out">
<div class="login-page">
    <div class="form">
      <div><?php isset($_GET['err']) ? $_GET['err'] : " ";  ?></div>
      <form action="./controller/orderCtrl.php" method="POST"  class="register-form">
        <h3 class="text-center text-danger pb-3">Amount To Be Paid: <span class="text-dark">Rs.<?php echo $grand_total  ?></span></h3>
        <input required name="c_name"  type="text" placeholder="Name"/>
        <input required name="c_phone"  type="number" placeholder="Phone"/>
        <input required name="c_email"  type="email" placeholder="Email address"/>
        <input required name="c_address"  type="text" placeholder="Address"/>
        <input required name="c_zip"  type="number" placeholder="Zip Code"/>
        <input required  type="hidden" name="hUserId" value="<?php echo $_SESSION['userId'] ?>">
        <input required  type="hidden" name="hCouponStatus" value="<?php echo $_GET['couponApp'] ?>">
        <button name="checkOutBtn">ORDER NOW</button>
      </form>
    </div>
  </div>
</div>
<!-- Checkout form -->
<?php include('./views/footer.php') ?>