<?php include('./views/header.php') ?>
<?php 
if(isset($_SESSION['userId'])){
  header("Location: index.php");
  exit();
}
?>
    <main class="sign-up-main">
    <section id="signup-box">
        <h1>Forgot Password</h1>
        <p class="err-font"><?php echo isset($_GET['error']) ? $_GET['error'] : ""?></p>
        <form id="signup-form" action="controller/forgot_pwd.php" method="POST">
          
          <label for="email">Email</label><br>
          <input required type="email" name="email" placeholder="Email"><br>
          
          <button type="submit" name="forgotPwdSubmit">Send Link</button>
        </form>
      </section>
    </main>


    <?php include('./views/footer.php') ?>