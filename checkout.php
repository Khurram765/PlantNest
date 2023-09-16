<?php
    include("./header.php");
    include("./config.php");
    if(isset($_GET['total'])){
        $subTotal = $_GET['total'];
        $prices = $_GET['quantities'];
        $pricesArray = explode(",", $prices);
      
    }

    if(!isset($_SESSION['cartDetails'])){
        $_SESSION['checkoutfailed'] = "Your cart is empty please add items in your cart";
        header("location:./index.php");
    }

    if(isset($_SESSION['userDetails'])){
        $userId = $_SESSION['userDetails']['userId'];
        
    }else{
        header("location:./signup.php");
    }

    if(isset($_POST['order'])){
        $country = $_POST['country'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $postcode = $_POST['postcode'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $userId = $_POST['userId'];
        $total = $_POST['total'];
        $prices = $_POST['prices'];
        $insertOrder = mysqli_query($config,"INSERT INTO `orders`( `country_id`, `state_id`, `city_id`, `postal_code`, `address`, `email_address`, `phone_number`, `user_id`, `order_date`, `total_amount`, `delete_status`, `status`) VALUES ('$country','$state','$city','$postcode','$address','$email','$contact','$userId',NOW(),'$total',0,1)");
        $k = 0;
        $pricesArray = explode(",", $prices);
        
        if($insertOrder){
            $orderId = mysqli_insert_id($config);
            foreach($_SESSION['cartDetails'] as $dd){
                $pId = $dd['plantId'];
                $quantity = $pricesArray[$k]/$dd['plantPrice'];
                if($dd['type']=='p'){
                    $iOrderDetails = mysqli_query($config,"INSERT INTO `orderdetails`( `order_id`, `plant_id`, `quantity`, `delete_status`, `status`, `accessory_id`) VALUES ($orderId,$pId,$quantity,0,1,NULL)");
                    if($iOrderDetails){
                        $getQuantity = mysqli_query($config,"SELECT quantity FROM plants WHERE plant_id = $pId");
                        $aQuantity = mysqli_fetch_assoc($getQuantity);
                        $updateQuantity = $aQuantity['quantity'] - $quantity;
                        $updateQuery = mysqli_query($config,"UPDATE `plants` SET `quantity`= $updateQuantity WHERE plant_id = $pId");
                    }
                }else{
                    $iOrderDetails = mysqli_query($config,"INSERT INTO `orderdetails`( `order_id`, `plant_id`, `quantity`, `delete_status`, `status`, `accessory_id`) VALUES ($orderId,NULL,$quantity,0,1,$pId)");
                }

            }
            
            unset($_SESSION['cartDetails']);
            $_SESSION['checkoutsuccess'] = "Your order has been ordered successfully";
            header("location:./index.php");
        }

    }

    
?>

<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.hasthemes.com/flosun-preview/flosun/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Dec 2020 09:51:11 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Plant Nest</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font.awesome.min.css">
    <!-- Linear Icons CSS -->
    <link rel="stylesheet" href="assets/css/vendor/linearicons.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <!-- Jquery ui CSS -->
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <!--===== Pre-Loading area Start =====-->
    <div id="preloader">
        <div class="preloader">
            <div class="spinner-block">
                <h1 class="spinner spinner-3 mb-0">.</h1>
            </div>
        </div>
    </div>
    <!--==== Pre-Loading Area End ====-->

    <!-- Header Area Start Here -->
    <header class="main-header-area">
        <!-- Main Header Area Start -->
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-xl-2 col-sm-6 col-6 col-custom">
                        <div class="header-logo d-flex align-items-center">
                            <a href="index.php">
                                <img class="img-full" src="assets/images/logo/mainlogo.png" alt="Header Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-xl-10 col-sm-6 col-6 position-static d-flex justify-content-end col-custom">
                    <nav class="main-nav mr-5 d-none d-lg-flex">
                            <ul class="nav">
                                <li>
                                    <a  href="index.php">
                                        <span class="menu-text">Home</span>
                                    </a>
                                </li>
                                
                                
                                
                                <li>
                                    <a href="products.php">
                                        <span class="menu-text">PlantCatalog</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="accessories.php">
                                        <span class="menu-text">Accessories</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="about.php">
                                        <span class="menu-text"> About</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.php">
                                        <span class="menu-text"> Contact</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="feedback.php">
                                        <span class="menu-text">FeedBack</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="header-right-area main-nav">
                            <ul class="nav">
                            <li class="minicart-wrap">
                                    <a href="./cart.php" class="minicart-btn toolbar-btn">
                                        <i class="fa fa-shopping-cart"></i>
                                        <?php
                                            if(isset($_SESSION['cartDetails'])){
                                        ?>
                                        <span class="cart-item_count"><?php echo count($_SESSION['cartDetails']) ?></span>
                                        <?php }else{?>
                                            <span class="cart-item_count">0</span>
                                        <?php }?>
                                    </a>
                                    <!-- <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
                                        <div class="single-cart-item">
                                            <div class="cart-img">
                                                <a href="cart.html"><img src="assets/images/cart/1.jpg" alt=""></a>
                                            </div>
                                            <div class="cart-text">
                                                <h5 class="title"><a href="cart.html">Odio tortor consequat</a></h5>
                                                <div class="cart-text-btn">
                                                    <div class="cart-qty">
                                                        <span>1×</span>
                                                        <span class="cart-price">$98.00</span>
                                                    </div>
                                                    <button type="button"><i class="ion-trash-b"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-cart-item">
                                            <div class="cart-img">
                                                <a href="cart.html"><img src="assets/images/cart/2.jpg" alt=""></a>
                                            </div>
                                            <div class="cart-text">
                                                <h5 class="title"><a href="cart.html">Integer eget augue</a></h5>
                                                <div class="cart-text-btn">
                                                    <div class="cart-qty">
                                                        <span>1×</span>
                                                        <span class="cart-price">$98.00</span>
                                                    </div>
                                                    <button type="button"><i class="ion-trash-b"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-cart-item">
                                            <div class="cart-img">
                                                <a href="cart.html"><img src="assets/images/cart/3.jpg" alt=""></a>
                                            </div>
                                            <div class="cart-text">
                                                <h5 class="title"><a href="cart.html">Eleifend quam</a></h5>
                                                <div class="cart-text-btn">
                                                    <div class="cart-qty">
                                                        <span>1×</span>
                                                        <span class="cart-price">$98.00</span>
                                                    </div>
                                                    <button type="button"><i class="ion-trash-b"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-price-total d-flex justify-content-between">
                                            <h5>Total :</h5>
                                            <h5>$166.00</h5>
                                        </div>
                                        <div class="cart-links d-flex justify-content-between">
                                            <a class="btn product-cart button-icon flosun-button dark-btn" href="cart.php">View cart</a>
                                            <a class="btn flosun-button secondary-btn rounded-0" href="checkout.php">Checkout</a>
                                        </div> -->
                                    <!-- </div> -->
                                </li>
                                <?php
                                    if(isset($_SESSION['userDetails'])){
                                ?>

<div class="nav-item dropdown d-flex justify-content-center align-items-center">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="./assets/images/icon/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $userName; ?></span>
                        </a>
                        <div id="dropdown" class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <button href="#" class="dropdown-item" type="submit" name="logout">Log Out</button>
                            
                            </form>
                            <a href="account.php" class="dropdown-item">Settings</a>
                        </div>
                    </div>

                                <?php }else{?>
                                <li class="sidemenu-wrap d-flex flex-column register">
                                    <a href="login.php" id="menu-extra-login"><i class="extra-icon icon-user"></i><span class="login-text">Log in</span></a>
                                
                                </li>
                                <li class="sidemenu-wrap d-flex flex-column register">
                                <a href="signup.php" class="item-register" id="menu-extra-register">Register</a>
                                </li>
                                <li class="sidemenu-wrap d-flex flex-column usericon">
                                <a href="signup.php" class="item-register" id="menu-extra-register"><i class="fa fa-user"></i></a>
                                </li>
                                <?php }?>
                                <li class="account-menu-wrap d-none d-lg-flex">
                                    <a href="#" class="off-canvas-menu-btn">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </li>
                                <li class="mobile-menu-btn d-lg-none">
                                    <a class="off-canvas-btn" href="#">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Header Area End -->
        <!-- off-canvas menu start -->
        <aside class="off-canvas-wrapper" id="mobileMenu">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-inner-content">
                <div class="btn-close-off-canvas">
                    <i class="fa fa-times"></i>
                </div>
                <div class="off-canvas-inner">
                    <div class="search-box-offcanvas">
                        <form>
                            <input type="text" placeholder="Search product...">
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav>
                            <ul class="mobile-menu">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="products.php">Products</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->
                    <div class="offcanvas-widget-area">
                        <div class="switcher">
                            <div class="language">
                                <span class="switcher-title">Language: </span>
                                <div class="switcher-menu">
                                    <ul>
                                        <li><a href="#">English</a>
                                            <ul class="switcher-dropdown">
                                                <li><a href="#">German</a></li>
                                                <li><a href="#">French</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="currency">
                                <span class="switcher-title">Currency: </span>
                                <div class="switcher-menu">
                                    <ul>
                                        <li><a href="#">$ USD</a>
                                            <ul class="switcher-dropdown">
                                                <li><a href="#">€ EUR</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="top-info-wrap text-left text-black">
                            <ul class="address-info">
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <a href="info%40yourdomain.html">(1245) 2456 012</a>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <a href="info%40yourdomain.html">info@yourdomain.com</a>
                                </li>
                            </ul>
                            <div class="widget-social">
                                <a class="facebook-color-bg" title="Facebook-f" href="#"><i class="fa fa-facebook-f"></i></a>
                                <a class="twitter-color-bg" title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                                <a class="linkedin-color-bg" title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                                <a class="youtube-color-bg" title="Youtube" href="#"><i class="fa fa-youtube"></i></a>
                                <a class="vimeo-color-bg" title="Vimeo" href="#"><i class="fa fa-vimeo"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- off-canvas menu end -->
        <!-- off-canvas menu start -->
        <aside class="off-canvas-menu-wrapper" id="sideMenu">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-inner-content">
                <div class="off-canvas-inner">
                    <div class="btn-close-off-canvas">
                        <i class="fa fa-times"></i>
                    </div>
                    <!-- offcanvas widget area start -->
                    <div class="offcanvas-widget-area">
                        <ul class="menu-top-menu">
                            <li><a href="about.php">About Us</a></li>
                        </ul>
                        <p class="desc-content">At our plant products website, we are passionate about bringing the beauty and benefits of nature into your life. With a curated selection of high-quality plant-related products, ranging from gardening tools and accessories to decorative planters and eco-friendly fertilizers, we aim to inspire and support both seasoned gardeners and plant enthusiasts. Our team is dedicated to promoting sustainable practices and helping you create thriving green spaces, indoors and outdoors. Whether you're a novice looking to start your plant journey or a seasoned gardener seeking innovative solutions, we're here to provide you with the tools and products you need to nurture your botanical passions.</p>
                        <!-- <div class="switcher">
                            <div class="language">
                                <span class="switcher-title">Language: </span>
                                <div class="switcher-menu">
                                    <ul>
                                        <li><a href="#">English</a>
                                            <ul class="switcher-dropdown">
                                                <li><a href="#">German</a></li>
                                                <li><a href="#">French</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="currency">
                                <span class="switcher-title">Currency: </span>
                                <div class="switcher-menu">
                                    <ul>
                                        <li><a href="#">$ USD</a>
                                            <ul class="switcher-dropdown">
                                                <li><a href="#">€ EUR</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <div class="top-info-wrap text-left text-black">
                            <ul class="address-info">
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <a href="">(1245) 2456 012</a>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <a href="mailto:plantnest@gmail.com">info@yourdomain.com</a>
                                </li>
                            </ul>
                            <!-- <div class="widget-social">
                                <a class="facebook-color-bg" title="Facebook-f" href="#"><i class="fa fa-facebook-f"></i></a>
                                <a class="twitter-color-bg" title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                                <a class="linkedin-color-bg" title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                                <a class="youtube-color-bg" title="Youtube" href="#"><i class="fa fa-youtube"></i></a>
                                <a class="vimeo-color-bg" title="Vimeo" href="#"><i class="fa fa-vimeo"></i></a>
                            </div> -->
                        </div>
                    </div>
                    <!-- offcanvas widget area end -->
                </div>
            </div>
        </aside>
        <!-- off-canvas menu end -->
    </header>
    <!-- Header Area End Here -->
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Checkout</h3>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Checkout Area Start Here -->
    <div class="checkout-area mt-no-text">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12 col-custom">
                    <div class="coupon-accordion">
                        <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                        <div id="checkout-login" class="coupon-content">
                            <div class="coupon-info">
                                <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est
                                    sit amet ipsum luctus.</p>
                                <form action="#">
                                    <p class="form-row-first">
                                        <label>Username or email <span class="required">*</span></label>
                                        <input type="text">
                                    </p>
                                    <p class="form-row-last">
                                        <label>Password <span class="required">*</span></label>
                                        <input type="password">
                                    </p>
                                    <p class="form-row">
                                        <input type="checkbox" id="remember_me">
                                        <label for="remember_me">Remember me</label>
                                    </p>
                                    <p class="lost-password"><a href="#">Lost your password?</a></p>
                                </form>
                            </div>
                        </div>
                        <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                        <div id="checkout_coupon" class="coupon-checkout-content">
                            <div class="coupon-info">
                                <form action="#">
                                    <p class="checkout-coupon">
                                        <input placeholder="Coupon code" type="text">
                                        <input class="coupon-inner_btn" value="Apply Coupon" type="submit">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-12 col-custom">
                    <form action="./checkout.php" method='post' onsubmit="return validateForm()">
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-12 col-custom">
                                    <div class="country-select clearfix">
                                        <label>Country <span class="required">*</span></label>
                                        <select id='country' name='country' class="myniceselect nice-select wide rounded-0">
                                            <option selected value="">Select Country</option>
                                            <?php
                                                $sCountry = mysqli_query($config,"SELECT * FROM country");
                                                if(mysqli_num_rows($sCountry)>0){
                                                    while($fc = mysqli_fetch_assoc($sCountry)){
                                            ?>
                                            <option value="<?php echo $fc['country_id'] ?>"><?php echo $fc['country_name'] ?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        
                                        <input hidden name='userId' value='<?php echo $userId ?>' placeholder="" type="text">
                                        <input hidden value='<?php echo $subTotal ?>'  name='total' value='<?php echo $userId ?>' placeholder="" type="text">
                                        <input hidden value='<?php echo $prices ?>'  name='prices' value='<?php echo $userId ?>' placeholder="" type="text">
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input name='address' id='address' placeholder="Street address" type="text">
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-custom">
                                    <div id='state'  class="country-select clearfix">
                                        <label>State <span class="required">*</span></label>
                                        <select name='state' style="display:block !important; width:100%;" id='stateChild' class="p-2">
                                            <!-- <option data-display="Bangladesh">Bangladesh</option>
                                            <option value="uk">London</option>
                                            <option value="rou">Romania</option>
                                            <option value="fr">French</option>
                                            <option value="de">Germany</option>
                                            <option value="aus">Australia</option> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div  class="country-select clearfix">
                                        <label>City <span class="required">*</span></label>
                                        <select id='city' name='city' style="display:block !important; width:100%;" id="cityChild" class="p-2">
                                            <?php

                                            ?>
                                            <!-- <option data-display="Bangladesh">Bangladesh</option>
                                            <option value="uk">London</option>
                                            <option value="rou">Romania</option>
                                            <option value="fr">French</option>
                                            <option value="de">Germany</option>
                                            <option value="aus">Australia</option> -->
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input name='postcode' id='postcode' placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input placeholder="" type="email" name='email' id='email'>
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input name='contact' id='contact' type="text">
                                    </div>
                                </div>
                                <!-- <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list create-acc">
                                        <input id="cbox" type="checkbox">
                                        <label for="cbox">Create an account?</label>
                                    </div>
                                    <div id="cbox-info" class="checkout-form-list create-account">
                                        <p class="mb-2">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                        <label>Account password <span class="required">*</span></label>
                                        <input placeholder="password" type="password">
                                    </div>
                                </div> -->
                            </div>
                            <div class="different-address">
                                <!-- <div class="ship-different-title">
                                    <div>
                                        <input id="ship-box" type="checkbox">
                                        <label for="ship-box">Ship to a different address?</label>
                                    </div>
                                </div> -->
                                <!-- <div id="ship-box-info" class="row mt-2">
                                    <div class="col-md-12 col-custom">
                                        <div class="myniceselect country-select clearfix">
                                            <label>Country <span class="required">*</span></label>
                                            <select class="myniceselect nice-select wide rounded-0">
                                                <option data-display="Bangladesh">Bangladesh</option>
                                                <option value="uk">London</option>
                                                <option value="rou">Romania</option>
                                                <option value="fr">French</option>
                                                <option value="de">Germany</option>
                                                <option value="aus">Australia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>First Name <span class="required">*</span></label>
                                            <input placeholder="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>Last Name <span class="required">*</span></label>
                                            <input placeholder="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>Company Name</label>
                                            <input placeholder="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>Address <span class="required">*</span></label>
                                            <input placeholder="Street address" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>Town / City <span class="required">*</span></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>State / County <span class="required">*</span></label>
                                            <input placeholder="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>Postcode / Zip <span class="required">*</span></label>
                                            <input placeholder="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input placeholder="" type="email">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>Phone <span class="required">*</span></label>
                                            <input type="text">
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="order-notes mt-3">
                                    <div class="checkout-form-list checkout-form-list-2">
                                        <label>Order Notes</label>
                                        <textarea id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="order-button-payment">
                                    <button type='submit' name='order' class="btn flosun-button secondary-btn black-color rounded-0 w-100">Place Order</button>
                                </div>
                    </form>
                </div>
                <div class="col-lg-6 col-12 col-custom">
                    <div class="your-order">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name">Product</th>
                                        <th class="cart-product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($_SESSION['cartDetails'])){
                                            $i = 0;
                                            foreach($_SESSION["cartDetails"] as $data){
                                    ?>
                                    <tr class="cart_item">
                                        <td class="cart-product-name"><?php echo $data['plantName'] ?><strong class="product-quantity">
                            <?php ?></strong></td>
                                        <td class="cart-product-total text-center"><span class="amount">$<?php echo $pricesArray[$i] ?></span></td>
                                    </tr>
                                    <?php $i = ++$i;}}?>
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Cart Subtotal</th>
                                        <td class="text-center"><span class="amount">$<?php echo $subTotal ?></span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td class="text-center"><strong><span class="amount">$<?php echo $subTotal ?></span></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- <div class="payment-method">
                            <div class="payment-accordion">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="#payment-1">
                                            <h5 class="panel-title mb-3">
                                                <a href="#" class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Direct Bank Transfer.
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body mb-2 mt-2">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="#payment-2">
                                            <h5 class="panel-title mb-3">
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Cheque Payment
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                            <div class="card-body mb-2 mt-2">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="#payment-3">
                                            <h5 class="panel-title mb-3">
                                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    PayPal
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion">
                                            <div class="card-body mb-2 mt-2">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment">
                                    <button class="btn flosun-button secondary-btn black-color rounded-0 w-100">Place Order</button>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Area End Here -->
    <!--Footer Area Start-->
    <footer class="footer-area mt-5">
        <div class="footer-widget-area">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-custom">
                        <div class="single-footer-widget m-0">
                            <div class="footer-logo">
                                <a href="index.php">
                                    <img src="assets\images\logo\mainlogo.png" alt="Logo Image">
                                </a>
                            </div>
                            <p class="desc-content">Our commitment to a greener future drives us to offer plant-based and ethically sourced creations. Every purchase contributes to environmental initiatives, making a positive impact on our planet.</p>
                            <div class="social-links">
                                <ul class="d-flex">
                                    <li>
                                        <a class="rounded-circle" href="#" title="Facebook">
                                            <i class="fa fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="rounded-circle" href="#" title="Twitter">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="rounded-circle" href="#" title="Linkedin">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="rounded-circle" href="#" title="Youtube">
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="rounded-circle" href="#" title="Vimeo">
                                            <i class="fa fa-vimeo"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">Information</h2>
                            <ul class="widget-list">
                                <li><a href="about-us.html">Our Company</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="about-us.html">Our Services</a></li>
                                <li><a href="about-us.html">Why We?</a></li>
                                <li><a href="about-us.html">Careers</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-custom d-flex flex-column align-items-center">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">Quicklink</h2>
                            <ul class="widget-list">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="products.php">Products</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                                <li><a href="cart.php">Cart</a></li>
                                <li><a href="wishlist.php">Wishlist</a></li>
                                <li><a href="description.php">Description</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">Support</h2>
                            <ul class="widget-list">
                                <li><a href="contact-us.html">Online Support</a></li>
                                <li><a href="contact-us.html">Shipping Policy</a></li>
                                <li><a href="contact-us.html">Return Policy</a></li>
                                <li><a href="contact-us.html">Privacy Policy</a></li>
                                <li><a href="contact-us.html">Terms of Service</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-custom">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">See Information</h2>
                            <div class="widget-body">
                                <address>123, ABC, Road ##, Main City, Your address goes here.<br>Phone: 01234 567 890<br>Email: https://example.com</address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container custom-area">
                <div class="row">
                    <div class="col-12 text-center col-custom">
                        <div class="copyright-content">
                            <p>Copyright © 2023 <a href="" title="">PlantNest</a> | Built for&nbsp;<strong>Techwiz</strong>&nbsp;by <a href="" title="">DevMevricks</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--Footer Area End-->

    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script> 
    <!-- Swiper Slider JS -->
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <!-- nice select JS -->
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <!-- Ajaxchimpt js -->
    <script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>
    <!-- Jquery Ui js -->
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <!-- Jquery Countdown js -->
    <script src="assets/js/plugins/jquery.countdown.min.js"></script>
    <!-- jquery magnific popup js -->
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    
    <script>
        $(document).ready(function(){
            $("#country").on("change",function(){
                var countryId = $(this).val();
                $.ajax({
                    url:"logic.php",
                    method:"POST",
                    data:{type:"fetchCountry",id:countryId},
                    success:function(data){
                        $("#city").html("");
                        $("#stateChild").html("");
                        $("#stateChild").append(data);
                        console.log(data);
                    }
                })
            })

            $("#stateChild").on("focus",function(){
                var stateId = $(this).val();
                console.log(stateId);
                $.ajax({
                    url:"logic.php",
                    method:"POST",
                    data:{type:"fetchCity",sid:stateId},
                    success:function(data){
                        $("#city").html("");
                        $("#city").append(data);
                        console.log(data);
                    }
                })
            })

            
        })
    </script>

    <script>
        function validateForm(){
            let country = document.getElementById("country");
            let address = document.getElementById("address");
            let state = document.getElementById("stateChild");
            let city = document.getElementById("city");
            let postcode = document.getElementById("postcode");
            let email = document.getElementById("email");
            let contact = document.getElementById("contact");
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            let errorArray = [];

            if(country.value==""){
                country.style.border="1px solid red";
                errorArray.push(false);
            }

            if(!emailRegex.test(email.value) || email.value==""){
                email.style.border="1px solid red";
                errorArray.push(false);
            }

            if(address.value=="" || address.value.length<6){
                address.style.border="1px solid red";
                errorArray.push(false);
            }

            if(contact.value=="" || contact.value.length < 11){
                contact.style.border="1px solid red";
                errorArray.push(false);
            }

            if(state.value==""){
                state.style.border="1px solid red";
                errorArray.push(false);
            }

            if(postcode.value==""){
                postcode.style.border="1px solid red";
                errorArray.push(false);
            }
            
            if(errorArray.includes(false)){
                return false;
            }else{
                return true;
            }
        }
    </script>

</body>


<!-- Mirrored from htmldemo.hasthemes.com/flosun-preview/flosun/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Dec 2020 09:51:11 GMT -->
</html>