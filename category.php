<?php include('./views/header.php');
      include('./controller/categoryCtrl.php'); ?>

<?php $selected_category= $_GET['category'];
echo '<h1 id="selected_category">'.$selected_category.'</h1>' ;
?>

<section class="category-icon">
        <div class="">
            <div class="">
                <h1 class="text-center">Categories</h1>
                <div class="category-main">
                    <div class="each-category" data-category="rice">
                        <div class="category-icon">
                            <a href="category.php?category=rice"><img src="./category-icon/1.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Rice</p>
                        </div>
                    </div>
                    <div class="each-category" data-category="millets">
                        <div class="category-icon">
                            <a href="category.php?category=millets"><img src="./category-icon/2.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Millets</p>
                        </div>
                    </div>
                    <div class="each-category" data-category="cereals_and_flours">
                        <div class="category-icon">
                            <a href="category.php?category=cereals_and_flours"><img src="./category-icon/3.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Cereals & Flours</p>
                        </div>
                    </div>
                    <div class="each-category" data-category="pulses_and_dals">
                        <div class="category-icon">
                            <a href="category.php?category=pulses_and_dals"><img src="./category-icon/4.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Pulses & Dals</p>
                        </div>
                    </div>
                    <div class="each-category" data-category="spices_and_masala">
                        <div class="category-icon">
                            <a href="category.php?category=spices_and_masala"><img src="./category-icon/5.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Spices & Masala</p>
                        </div>
                    </div>
                    <div class="each-category" data-category="sweetener">
                        <div class="category-icon">
                            <a href="category.php?category=sweetener"><img src="./category-icon/6.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Sweetener</p>
                        </div>
                    </div>
                    <div class="each-category" data-category="salt">
                        <div class="category-icon">
                            <a href="category.php?category=salt"><img src="./category-icon/7.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Salt</p>
                        </div>
                    </div>
                    <div class="each-category" data-category="oils_and_ghee">
                        <div class="category-icon">
                            <a href="category.php?category=oils_and_ghee"><img src="./category-icon/8.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Oils & Ghee</p>
                        </div>
                    </div>
                    <div class="each-category" data-category="nuts_and_dry_fruits">
                        <div class="category-icon">
                            <a href="category.php?category=nuts_and_dry_fruits"><img src="./category-icon/9.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Nuts & Dry Fruits</p>
                        </div>
                    </div>
                    <div class="each-category" data-category="seeds_and_dry_fruits">
                        <div class="category-icon">
                            <a href="category.php?category=seeds_and_dry_fruits"><img src="./category-icon/10.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Seeds & Super Foods</p>
                        </div>
                    </div>
                    <div class="each-category" data-category="herbs">
                        <div class="category-icon">
                            <a href="category.php?category=herbs"><img src="./category-icon/11.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Herbs</p>
                        </div>
                    </div>
                    <div class="each-category" data-category="personal_care">
                        <div class="category-icon">
                            <a href="category.php?category=personal_care"><img src="./category-icon/12.png" alt=""></a>
                        </div>
                        <div class="category-text">
                            <p>Personal Care</p>
                        </div>
                    </div>
                    <div class="each-category" data-category="ready_to_eat">
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
	
	
	<script>
				let selectedCategory = document.getElementById('selected_category').innerText;
				console.log(selectedCategory);
                var selectedDataCategory = document.querySelector(`[data-category = "${selectedCategory}" ]`);
				selectedDataCategory.style.display = "none";
            </script>

<section class="product-card-section">
        <div class="container">
            <div class="row product-card-justify" id="allProduct">
            <!-- Php Code  -->
            <?php $locationFilter = $_SESSION['global_location'];
                    $location_stock =$locationFilter.'_stock';
            ?>
			<?php foreach ($products as $product) {  ?>
				<div id="cart-message"></div>
            <div class="col-md-3 each-product-outside">
						<div class="each-product-inside">
							<div class="each-product-img">
							<a href="product-detail.php?product=<?php echo $product['id']  ?>">	<img src="./img/<?php echo $product['item_image'] ?>" alt=""></a>
							</div>
							<div class="each-product-content">
                            <a href="product-detail.php?product=<?php echo $product['id']  ?>"><h2><?php echo $product['item_name'] ?></h2></a>
                            <p><?php echo $product[$location_stock] < 5 ?></p>
								<h6><?php echo $product['size'] ?></h6>
								<div class="row">
									<div class="col-md-4"><h4><?php echo $product['price'] ?>/-</h4></div>
									<div class="add-to-cart-form">
									<input type="hidden" class="pid" value="<?php echo $product['id'] ?>">
									<input type="hidden" class="pname" value="<?php echo $product['item_name'] ?>">
									<input type="hidden" class="pimage" value="./img/<?php echo $product['item_image'] ?>">
									<input type="hidden" class="pprice" value="<?php echo $product['price'] ?>">
									<input type="hidden" class="psize" value="<?php echo $product['size'] ?>">
									<div class="col-md-8 float-right"><button  class="cart-btn <?php echo $product[$location_stock] > 5  ? 'add-to-cart' : '' ?> "><?php echo $product[$location_stock] > 5 ? 'Add To Cart' : 'Out Of Stock' ?></button></div>

									</div>
								</div>
							</div>
						</div>
				</div>

				<?php }  ?>
            </div>
        </div>
    </section>



<?php include('./views/footer.php')  ?>