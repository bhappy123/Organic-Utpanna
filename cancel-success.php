<?php include('./views/header.php') ?>

<section class="page-successful-section">
    <div class="animation-ctn">
        <div class="icon icon--order-success svg"><svg xmlns="http://www.w3.org/2000/svg" width="154px" height="154px">
                <g fill="none" stroke="rgb(3, 153, 3)" stroke-width="2">
                    <circle cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                    <circle id="colored" fill="rgb(3, 153, 3)" cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                    <polyline class="st0" stroke="#fff" stroke-width="10" points="43.5,77.8 63.7,97.9 112.2,49.4 " style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;" />
                </g>
            </svg></div>
    </div>
    <h2>Cancelation Initiated</h2>
    <h3>For Order Id <b><?php echo isset($_GET['cancelSuccess']) ? $_GET['cancelSuccess'] : ""?></b></h3>
    <a href="my-orders.php">Track Order</a>
</section>
    <?php include('./views/footer.php') ?>