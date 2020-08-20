<?php include('./views/header.php') ?>

    <section class="head-carousel">
        <div class="owl-carousel owl-theme">
          <div class="item"><img src="./assests/img/1.jpg" alt="" /></div>
          <div class="item"><img src="./assests/img/2.jpg" alt="" /></div>
          <div class="item"><img src="./assests/img/1.jpg" alt="" /></div>
          <div class="item"><img src="./assests/img/2.jpg" alt="" /></div>
        </div>
      </section>
      <div id="cart-message"></div>
      <section class="category-icon">
        <div class="">
            <div class="">
                <h1 class="text-center">Categories</h1>
                <div class="category-main">
                    <div class="each-category">
                        <div class="category-icon">
                            <a href="category.php?category=rice"><img src="./category-icon/1.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Rice</p>
                        </div>
                    </div>
                    <div class="each-category">
                        <div class="category-icon">
                            <a href="category.php?category=millets"><img src="./category-icon/2.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Millets</p>
                        </div>
                    </div>
                    <div class="each-category">
                        <div class="category-icon">
                            <a href="category.php?category=cereals_and_flours"><img src="./category-icon/3.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Cereals & Flours</p>
                        </div>
                    </div>
                    <div class="each-category">
                        <div class="category-icon">
                            <a href="category.php?category=pulses_and_dals"><img src="./category-icon/4.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Pulses & Dals</p>
                        </div>
                    </div>
                    <div class="each-category">
                        <div class="category-icon">
                            <a href="category.php?category=spices_and_masala"><img src="./category-icon/5.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Spices & Masala</p>
                        </div>
                    </div>
                    <div class="each-category">
                        <div class="category-icon">
                            <a href="category.php?category=sweetener"><img src="./category-icon/6.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Sweetener</p>
                        </div>
                    </div>
                    <div class="each-category">
                        <div class="category-icon">
                            <a href="category.php?category=salt"><img src="./category-icon/7.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Salt</p>
                        </div>
                    </div>
                    <div class="each-category">
                        <div class="category-icon">
                            <a href="category.php?category=oils_and_ghee"><img src="./category-icon/8.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Oils & Ghee</p>
                        </div>
                    </div>
                    <div class="each-category">
                        <div class="category-icon">
                            <a href="category.php?category=nuts_and_dry_fruits"><img src="./category-icon/9.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Nuts & Dry Fruits</p>
                        </div>
                    </div>
                    <div class="each-category">
                        <div class="category-icon">
                            <a href="category.php?category=seeds_and_dry_fruits"><img src="./category-icon/10.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Seeds & Dry Fruits</p>
                        </div>
                    </div>
                    <div class="each-category">
                        <div class="category-icon">
                            <a href="category.php?category=herbs"><img src="./category-icon/11.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Herbs</p>
                        </div>
                    </div>
                    <div class="each-category">
                        <div class="category-icon">
                            <a href="category.php?category=personal_care"><img src="./category-icon/12.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Personal Care</p>
                        </div>
                    </div>
                    <div class="each-category">
                        <div class="category-icon">
                            <a href="category.php?category=ready_to_eat"><img src="./category-icon/13.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Ready To Eat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Shopping Cards -->
      <div class="container shopping-cards">
        <h3 class="shopping-cards-heading">OUR <span>PRODUCTS</span></h3>
        <div class="row product-filter justify-content-center">
            <div class="col-md-6 col-xs-6">
                <label for="category">Choose Category</label>
                <select class="browser-default custom-select" id="category">
                    <option selected value="all">Category</option>
                    <option value="rice">rice</option>
                    <option value="millets">millets</option>
                    <option value="cereals_and_flours">Cereals and Flours</option>
                    <option value="pulses_and_dals">Pulses and Dals</option>
                    <option value="spices_and_masala">Spices and Masala</option>
                    <option value="sweetener">Sweetener</option>
                    <option value="salt">Salt</option>
                    <option value="oils_and_ghee">Oils and Ghee</option>
                    <option value="nuts_and_dry_fruits">Nuts and Dry Fruits</option>
                    <option value="seeds_and_dry_fruits">Seeds And Dry Fruits</option>
                    <option value="herbs">Herbs</option>
                    <option value="personal_care">Personal Care</option>
                    <option value="ready_to_eat">Ready To Eat</option>
                  </select>
            </div>
            <div class="col-xs-6">
            <label for="category">Location</label>
                <select class="browser-default custom-select" id="locationFilter">                    
                    <option selected value="<?php echo isset($_SESSION['global_location']) ? $_SESSION['global_location'] : 'All' ?>"><?php echo isset($_SESSION['global_location']) ? "Location" : "All" ?></option>
                    <option value="bbsr">Bhubaneswar</option>
                    <option value="cuttack">Cuttack</option>
                    <option value="brahmapur">Brahampur</option>
                    <option value="jharsuguda">Jharsuguda</option>
                    <option value="sundergarh">Sundergarh</option>
                  </select>
            </div>
        </div>
        <!-- <div class="row" id="allProduct">
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
        </div> -->

        <section class="product-card-section">
        <div class="container">
            <div class="row product-card-justify" id="allProduct">
                
            </div>
        </div>
    </section>


    </div>

    

<?php include('./views/footer.php'); ?>