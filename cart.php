<?php
    include("./header.php");
    include("config.php");


    if(isset($_POST['deleteCart'])){
        $plantId = intval($_POST['plantId']);
        $index = -1;
        if(isset($_SESSION['cartDetails'])){
            foreach($_SESSION['cartDetails'] as $row){
                $index = ++$index;
                if($plantId === $row['plantId']){
                    array_splice($_SESSION['cartDetails'],$index,1);
                    break;
                }
            }
        }
        if($_SESSION['cartDetails']==null){
            unset($_SESSION["cartDetails"]);
        }
    }
?>

<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.hasthemes.com/flosun-preview/flosun/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Dec 2020 09:51:11 GMT -->
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
                            <a href="index.html">
                                <img class="img-full" src="assets/images/logo/mainlogo.png" alt="Header Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-xl-10 col-sm-6 col-6 position-static d-flex justify-content-end col-custom">
                    <nav class="main-nav mr-5 d-none d-lg-flex">
                            <ul class="nav">
                                <li>
                                    <a class="active" href="index.php">
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
                                        </div>
                                    </div> -->
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
                        <h3 class="title-3">Shopping Cart</h3>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper mt-no-text">
        <div class="container custom-area">
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <!-- Cart Table Area -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(isset($_SESSION['cartDetails'])){
                                        foreach($_SESSION["cartDetails"] as $data){
                                ?>
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="./admin/uploads_img/<?php echo $data['plantImage'] ?>" alt="Product" /></a></td>
                                    <td class="pro-title"><a href="#"><?php echo $data['plantName'] ?></a></td>
                                    <td class="pro-price"><span>$<?php echo $data['plantPrice'] ?></span></td>
                                    <input hidden id="" name="plantId" class="plantId" value="<?php echo $data['plantId'] ?>" type="number">
                                    <td class="pro-quantity">
                                        <div class="quantity">
                                            <div class="d-flex">
                                                <div data-id="<?php echo $data['plantId'] ?>" class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                                &nbsp;&nbsp;&nbsp;
                                                <input style="text-align: center; width: 50%;"  class="cart-plus-minus-box quantity" value="<?php echo $data['quantity'] ?>" type="text">
                                                
                                                <!-- <div id="decrement" class="dec qtybutton">-</div>
                                                <div  id="increment" class="inc qtybutton">+</div> -->
                                                <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                                
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pro-subtotal"><span class="total">$<?php echo $data['plantPrice'] ?></span></td>
                                    <td class="pro-remove">
                                        <form action="./cart.php" method="post">
                                            <input class="plantid" hidden type="number" name="plantId" value='<?php echo $data['plantId'] ?>' id="">
                                            <button type="submit" name='deleteCart'><i class="lnr lnr-trash"></button>
                                        </form>
                                        <!-- <a href="#"><i class="lnr lnr-trash"></i></a> -->
                                    </td>
                                </tr>
                                <?php }}?>
                                <!-- Include jQuery library if not already included -->


                                <!-- <tr>
                                    <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="assets/images/product/small-size/2.jpg" alt="Product" /></a></td>
                                    <td class="pro-title"><a href="#">Jack in the Pulpit <br> red</a></td>
                                    <td class="pro-price"><span>$275.00</span></td>
                                    <td class="pro-quantity">
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="0" type="text">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                                <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pro-subtotal"><span>$550.00</span></td>
                                    <td class="pro-remove"><a href="#"><i class="lnr lnr-trash"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="assets/images/product/small-size/3.jpg" alt="Product" /></a></td>
                                    <td class="pro-title"><a href="#">Glory of the Snow <br> s</a></td>
                                    <td class="pro-price"><span>$295.00</span></td>
                                    <td class="pro-quantity">
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="0" type="text">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                                <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pro-subtotal"><span>$295.00</span></td>
                                    <td class="pro-remove"><a href="#"><i class="lnr lnr-trash"></i></a></td>
                                </tr>
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="assets/images/product/small-size/4.jpg" alt="Product" /></a></td>
                                    <td class="pro-title"><a href="#">Rose bouquet white</a></td>
                                    <td class="pro-price"><span>$110.00</span></td>
                                    <td class="pro-quantity">
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="2" type="text">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                                <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pro-subtotal"><span>$110.00</span></td>
                                    <td class="pro-remove"><a href="#"><i class="lnr lnr-trash"></i></a></td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <!-- Cart Update Option -->
                    <!-- <div class="cart-update-option d-block d-md-flex justify-content-between">
                        <div class="apply-coupon-wrapper">
                            <form action="#" method="post" class=" d-block d-md-flex">
                                <input type="text" placeholder="Enter Your Coupon Code" required />
                                <button class="btn flosun-button primary-btn rounded-0 black-btn">Apply Coupon</button>
                            </form>
                        </div>
                        <div class="cart-update mt-sm-16">
                            <a href="checkout.php" class="btn flosun-button primary-btn rounded-0 black-btn">Check Out </a>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 ml-auto col-custom">
                    <!-- Cart Calculation Area -->
                    <div class="cart-calculator-wrapper">
                        <div class="cart-calculate-items">
                            <h3>Cart Totals</h3>
                            <div class="table-responsive">
                                <table class="table">
                                
                                
                                |<tr class="total">
                                        <td>Sub Total</td>
                                        <td class="total-amount" id="subTotal">0</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td class="shipping-amount">
                                            0
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Total</td>
                                        <td class="total exactTotal">
                                        0
                                        </td>
                                    </tr>
                                
                                
                                </table>



                                
                            </div>
                        </div>
                        <a id='anchorTag' href="" class="btn flosun-button primary-btn rounded-0 black-btn w-100">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->
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
<!-- 
    <script>
        let quantity = document.querySelectorAll(".quantity");
        let total = document.querySelectorAll(".total");
        Array.from(quantity).forEach((qu,ind)=>{
            qu.addEventListener("change",()=>{
                total[ind].innerHTML = qu.value
                console.log(total)
            })
        })
    </script> -->


</body>


<!-- Mirrored from htmldemo.hasthemes.com/flosun-preview/flosun/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Dec 2020 09:51:11 GMT -->
</html>

<script>
//     var num1 = parseInt(document.getElementById("subTotal").childNodes[0].nodeValue)
//     var num2 = parseInt(document.getElementById("number1").value)
//     var sum = num1 + num2 ;
//     var data = document.getElementById("total").value = sum
    
// console.log(num1)
// console.log(num2)
// console.log(sum)

</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var $row = $(this).closest("tr");
        var price = parseFloat($row.find(".pro-price span").text().replace("$", ""));
        var quantity = parseFloat($row.find(".cart-plus-minus-box").val());
        var subtotal = price * quantity;
        var quantities = [];
        
        

        $row.find(".pro-subtotal span.total").text("$" + subtotal.toFixed(2));

        var total = 0;
        $(".pro-subtotal span.total").each(function() {
            total += parseFloat($(this).text().replace("$", ""));
            quantities.push(parseFloat($(this).text().replace("$", "")));
        });
        $(".total-amount").text("$" + total.toFixed(2));

        $(".shipping-amount").text("10")
        $(".exactTotal").text(total+10);
        var a = parseFloat($row.find(".shipping-amount").val());

        // Get the anchor tag and update its href attribute
        var $anchorTag = $('#anchorTag');
        var updatedHref = 'checkout.php?total=' + total.toFixed(2) + '&quantities=' + quantities.join(",");
        $anchorTag.attr('href', updatedHref);

    $(".qtybutton").on("click", function() {
        var $row = $(this).closest("tr");
        var price = parseFloat($row.find(".pro-price span").text().replace("$", ""));
        var quantity = parseFloat($row.find(".cart-plus-minus-box").val());
        var subtotal = price * quantity;
        var quantities = [];
        var plantid = parseFloat($row.find(".plantid").val());
        console.log(quantity);
        console.log(plantid);
        
        var finalResult = ""
        $.ajax({
            url:"logic.php",
                        method:"POST",
                        data:{type:"checkCart",quantity:quantity,plantId:plantid},
                        success:function(data){
                            console.log(data);
                            if(data==0){
                                alert("Out of Stock")
                                finalResult = "false"
                                quantity = $row.find(".cart-plus-minus-box").val(quantity-1)
                            }
                            
                        }
        })

        $row.find(".pro-subtotal span.total").text("$" + subtotal.toFixed(2));

        var total = 0;
        $(".pro-subtotal span.total").each(function() {
            total += parseFloat($(this).text().replace("$", ""));
            quantities.push(parseFloat($(this).text().replace("$", "")));
            console.log(total+10);
           
        });
        $(".total-amount").text("$" + total.toFixed(2));

        $(".shipping-amount").text("10")
        $(".exactTotal").text(total+10);
        var a = parseFloat($row.find(".shipping-amount").val());
        

        // Get the anchor tag and update its href attribute
        var $anchorTag = $('#anchorTag');
        var updatedHref = 'checkout.php?total=' + total.toFixed(2) + '&quantities=' + quantities.join(",");
        $anchorTag.attr('href', updatedHref);
    });
});
</script>
