<?php include('./views/header.php') ?>

<!-- Shopping Cards -->
<div class="container shopping-cards">
    <h3 class="shopping-cards-heading">ALL <span>PRODUCTS</span></h3>
    <div class="row product-filter justify-content-center">
        <div class="col-xs-12 p-3">
            <select class="browser-default custom-select">
                <option selected>Category</option>
                <option value="1">rice</option>
                <option value="2">millets</option>
                <option value="3">dal</option>
              </select>
        </div>
        <div class="col-xs-12 p-3">
            <select class="browser-default custom-select">
                <option selected>Select Location</option>
                <option value="1">Bhubaneswar</option>
                <option value="2">Cuttack</option>
                <option value="3">Balasore</option>
              </select>
        </div>
    </div>
    <div class="row" id="allProduct">
            <div class="col-md-3 col-sm-6">
                <div class="product-grid4">
                    <div class="product-image4">
                        <a href="#">
                            <img class="pic-1" src="./assests/img/product1.png">
                        </a>
                        <ul class="social">
                            <li><a href="" data-tip="View"><i class="fa fa-eye"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">Rice</a></h3>
                        <span class="badge badge-success p-1 mb-1">1kg</span>
                        <div class="price">
                            120.00
                        </div>
                        <form action="" class="add-to-cart-form">
                            <input type="hidden" class="pid" value="<?php ?>">
                            <input type="hidden" class="pname" value="<?php ?>">
                            <input type="hidden" class="pimage" value="<?php ?>">
                            <input type="hidden" class="pprice" value="<?php ?>">
                            <input type="hidden" class="psize" value="<?php ?>">
                            <a class="add-to-cart-btn add-to-cart" href="">ADD TO CART</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>



<?php include('./views/footer.php') ?>
