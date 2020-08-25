<?php include('./views/header.php') ?>
<?php 
if(isset($_SESSION['userId'])){
  header("Location: index.php");
  exit();
}
?>
    <main class="sign-up-main">
    <section id="signup-box">
        <h1>Log In</h1>
        <p class="err-font"><?php echo isset($_GET['error']) ? $_GET['error'] : ""?></p>
        <form id="signup-form" action="controller/loginCtrl.php" method="POST">
          
          <label for="email">Email</label><br>
          <input required type="email" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ""?>"  placeholder="Email"><br>

          <label for="password">Password</label><br>
          <input required type="password" name="password" placeholder="Password" autocomplete="off"><br>
          
          <button type="submit" name="loginSubmitBtn">Log In</button>
          
          <div class="bottom-links"><p>New User<a href="sign-up.php"> Sign Up</a></p></div>
          <div class="bottom-links f-pass"><p class="text-center text-danger"><a href="forgot-password.php">Forgot Password</a></p></div>
        </form>
      </section>
    </main>


    <?php include('./views/footer.php') ?>