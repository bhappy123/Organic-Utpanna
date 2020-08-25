

<?php include('./views/header.php') ?>
<?php 
if(isset($_SESSION['userId'])){
  header("Location: index.php");
  exit();
}
?>
    <main class="sign-up-main">
    <section id="signup-box">
        <h1>Create Account</h1>
        <p class="err-font"><?php echo isset($_GET['error']) ? $_GET['error'] : ""?></p>
        <form id="signup-form" action="controller/signUpCtrl.php" method="POST">
          <label for="name">Name</label><br>
          <input type="text" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ""?>" placeholder="Enter Your Name"><br>
          
          <label for="email">Email</label><br>
          <input type="email" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ""?>" autocomplete="off" placeholder="Email"><br>

          <label for="password">Password</label><br>
          <input type="text" name="password" placeholder="Password"><br>
          <label for="cpassword">Confirm Password</label><br>
          <input type="password" name="cpassword" placeholder="Confirm Password" autocomplete="off"><br>
          <button type="submit" name="signUpSubmitBtn">Sign Up</button>
          <div class="bottom-links"><p>Already Have Account<a href="login.php"> Log In</a></p></div>
          <div class="bottom-links f-pass"><p class="text-center text-danger"><a href="forgot-password.php">Forgot Password</a></p></div>
        </form>
      </section>
    </main>
    <?php include('./views/footer.php') ?>