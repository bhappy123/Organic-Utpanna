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
        </form>
      </section>
    </main>


    <?php include('./views/footer.php') ?>