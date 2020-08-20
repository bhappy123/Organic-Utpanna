<?php include('./views/header.php')  ?>

<main class="sign-up-main">
    <section id="signup-box">
        <h1>Order Cancelation</h1>
        <p class="err-font"><?php echo isset($_GET['err']) ? $_GET['err'] : ""?></p>
        <form id="signup-form" action="controller/cancelOrder.php" method="POST">
          <label for="reason">Why You want to cancel the order</label><br>
          <input type="hidden" name="orderId" value="<?php echo $_POST['orderID'] ?>">
          <input required type="text" name="reason" placeholder="Your text here..." style="height: 50px;"><br>

          <button type="submit" name="cancelSubmitBtn">Cancel</button>
        </form>
      </section>
    </main>



<?php include('./views/footer.php')  ?>