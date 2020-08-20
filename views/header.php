<?php  
session_start();
require "./controller/cartItems.php"
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Organic Utpanna - Web Portal</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
  />
    <!-- Style -->
    <link rel="stylesheet" href="./assests/css/style.css">

    <link rel="stylesheet" href="./assests/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="./assests/css/owl.theme.default.min.css" />
 </head>
  <body>
      
    
    <nav>
        <div class="header-icon" id="top-position">
            <div class="logo">
               <a href="index.php"> <img src="./assests/img/logo.png" alt=""></a>
            </div>
            <div class="cart-icon">
                <div class="shop-cart"><a href="cart.php">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="badge badge-danger text-white"><?php echo isset($_SESSION['total_items']) ? $_SESSION['total_items'] : "0"; ?></span></a>
            </div>
        </div>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        </div>
        <div class="nav-bar">
            <ul class="nav-ul">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Category <i class="fa fa-chevron-down"></i></a>
                    <!-- drop downs -->
                     <ul class="drop-down-nav">
                        <li><a href="category.php?category=rice">Rice &#x1f35a;</a>
                            <!-- <ul class="drop-down-nav">
                                <li><a href="#">fghj</a></li>
                                <li><a href="#">fghj</a></li>
                                <li><a href="#">fghj</a></li>
                                <li><a href="#">fghj</a></li>
                            </ul> -->
                        </li>
                        <li><a href="category.php?category=millets">Millets 🥣</a></li>
                        <li><a href="category.php?category=cereals_and_flours">Cereals & Flours 🌾</a></li>
                        <li><a href="category.php?category=pulses_and_dals">Pulses & Dals 🍛</a></li>
                        <li><a href="category.php?category=spices_and_masala">Spices & Masala 🌶️</a></li>
                        <li><a href="category.php?category=sweetener">Sweetener 🍯</a></li>
                        <li><a href="category.php?category=salt">Salt 🧂</a></li>
                        <li><a href="category.php?category=oils_and_ghee">Oils & Ghee 🧴</a></li>
                        <li><a href="category.php?category=nuts_and_dry_fruits">Nuts & Dry Fruits 🍇</a></li>
                        <li><a href="category.php?category=seeds_and_dry_fruits">Seeds & Dry Fruits 🌱</a></li>
                        <li><a href="category.php?category=herbs">Herbs ☘️</a></li>
                        <li><a href="category.php?category=personal_care">Personal Care 🧼</a></li>
                        <li><a href="category.php?category=ready_to_eat">Ready To Eat 🍜</a></li>
                    </ul>
                </li>
                <li><a href="about.php">About</a></li>
                <!-- NOTE Checking If user is logged in or not -->
                <?php if(isset($_SESSION['userId'])){ ?>
                    <li><a href="my-account.php">My Account</a></li>

                <?php } else { ?>
                    <li><a href="sign-up.php">Sign Up</a></li>

                <?php } ?>
                <!-- NOTE Checking If user is logged in or not -->
                <?php if(isset($_SESSION['userId'])){ ?>
                    <li><a href="controller/logoutCtrl.php">Log Out</a></li>

                <?php } else { ?>
                    <li><a href="login.php">Log In</a></li>

                <?php } ?>
                <li><a href="cart.php">Cart <i class="fa fa-cart-plus" aria-hidden="true"></i><?php echo isset($_SESSION['total_items']) ? $_SESSION['total_items'] : "0"; ?>  </a></li>
            </ul>
        </div>
        
    </nav>
    <div class="locationSet" style="<?php echo $_SESSION['global_location'] != 'All' ? 'display: none;' : ''  ?>">
          <div class="location-mod">
              <h2>Select Your City</h2>
              <h6>Now We Are Delivering To Bhubaneswar, Cuttack, Brahmapur, Jharsuguda, Sundergarh</h6>
              <select name="location_setter" id="location_setter">
              <option value="bbsr">Bhubaneswar</option>
                    <option value="cuttack">Cuttack</option>
                    <option value="brahmapur">Brahmapur</option>
                    <option value="jharsuguda">Jharsuguda</option>
                    <option value="sundergarh">Sundergarh</option>
              </select>
              <button id="location_submit">Submit</button>
          </div>
      </div>

      <div id="take-me-top"><a href="#">
          <i class="fa fa-arrow-up" aria-hidden="true"></i>
          </a>
      </div>

          <!-- Search Bar -->
    <section>
        <div class="search-btn-show">
            <button id="search-btn-show"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
    </section>
    <section class="search-section">
        <button class="search-close" id="search-close"><i class="fa fa-window-close" aria-hidden="true"></i></button>
        <div class="search-container">
            <input type="text" class="search-ip" id="search-box" autocomplete="off" placeholder="Type Here...">
            <button class="seach-btn" id="search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
        <div class="search-result-container" id="searchResultContainer">
            
            <!-- <p>Result1</p> -->
        </div>
    </section>


    <!-- Search Bar -->