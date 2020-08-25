<?php include('./views/header.php') ?>
<?php 
if(isset($_SESSION['userId'])){
  header("Location: index.php");
  exit();
}
?>
    <main class="sign-up-main">
    <section id="signup-box">
        <?php
        $selector=$_GET['selector'];
        $validator = $_GET['validator'];

        if(empty($selector) || empty($validator)){
            echo "could Not Validate Your Request";
        }else{
            if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false ){

        ?>

        <h1>Reset Password</h1>
        <p class="err-font"><?php echo isset($_GET['error']) ? $_GET['error'] : ""?></p>
        <form id="signup-form" action="controller/reset_pwd.php" method="POST">
          <input type="hidden" name="selector" value="<?php echo $selector ?>">
          <input type="hidden" name="validator" value="<?php echo $validator ?>">
          
          <input required type="password" name="pwd" placeholder="New Password"><br>
          <input required type="password" name="pwd_repeat" placeholder="Confirm Password"><br>
          
          <button type="submit" name="resetPwdSubmit">Reset Password</button>
        </form>

        <?php
            }
        }

        ?>
        
      </section>
    </main>


    <?php include('./views/footer.php') ?>