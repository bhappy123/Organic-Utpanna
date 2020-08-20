<?php include('./views/header.php'); ?>


<section class="my-acc-section">
        <div class="personal-info">
            <div class="col-md-12 text-center">
                <h1><i class="fa fa-telegram" aria-hidden="true"></i></h1>
                <h3><?php echo $_SESSION['userName'] ?></h3>
                <h5 class="text-success"><?php echo $_SESSION['userEmail'] ?></h5>
            </div>
        </div>
        <hr>
        <div class="personal-navigation">
            <div class="col-md-12">
                <a href="my-orders.php">Orders <span> <i class="fa fa-chevron-right" aria-hidden="true"></i></span> </a>
                <a href="cart.php">Cart <span> <i class="fa fa-chevron-right" aria-hidden="true"></i></span> </a>
                <a href="#">Setting<span> <i class="fa fa-chevron-right" aria-hidden="true"></i></span> </a>
                <a href="#">Contact Us<span> <i class="fa fa-chevron-right" aria-hidden="true"></i></span> </a>
            </div>
        </div>
    </section>



<?php include('./views/footer.php'); ?>