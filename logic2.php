<?php
include("./config.php");



if($_POST['type']=='load'){
    
    $result = "";
    
    $fetchaccessories = mysqli_query($config,"SELECT * FROM accessories");
    if($fetchaccessories){
        while($fp = mysqli_fetch_assoc($fetchaccessories)){
            $result .= "<div class='col-md-6 col-sm-6 col-lg-4 col-custom product-area'>
            <div class='product-item'>
                <div class='single-product position-relative mr-0 ml-0'>
                    <div class='product-image'>
                        <a class='d-block' href='description1.php?accessory_id={$fp['accessory_id']}'>
                            <img src='./admin/uploads_img/{$fp['image']}' alt='' class='product-image-1 w-100'>
                            <img src='./admin/uploads_img/{$fp['image']}' alt='' class='product-image-2 position-absolute w-100'>
                        </a>
                        <span class='onsale'>Sale!</span>
                        <div class='add-action d-flex flex-column position-absolute'>
                            
                            <a href='wishlist.php' title='Add To Wishlist'>
                                <i class='lnr lnr-heart' data-toggle='tooltip' data-placement='left' title='Wishlist'></i>
                            </a>
                            
                        </div>
                    </div>
                    <div class='product-content'>
                        <div class='product-title'>
                            <h4 class='title-2'> <a href='description1.php'>{$fp['name']}</a></h4>
                        </div>
                        <div class='product-rating'>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star-o'></i>
                            <i class='fa fa-star-o'></i>
                        </div>
                        <div class='price-box'>
                            <span class='regular-price '>{$fp['price']}</span>
                            
                        </div>
                        
                    </div>
                    <div class='product-content-listview'>
                        <div class='product-title'>
                            <h4 class='title-2'> <a href='description1.php'>{$fp['purpose']}</a></h4>
                        </div>
                        <div class='product-rating'>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star-o'></i>
                            <i class='fa fa-star-o'></i>
                        </div>
                        <div class='price-box'>
                            <span class='regular-price '>$60.00</span>
                            <span class='old-price'><del>$70.00</del></span>
                        </div>
                        <p class='desc-content'>{$fp['purpose']}</p>
                        
                    </div>
                </div>
            </div>
        </div>
        ";
        }
    }
    echo $result;
}else if($_POST['type']=='low'){
    $result = "";
    $fetchaccessories = mysqli_query($config,"SELECT * FROM accessories ORDER BY price ASC ");
    if($fetchaccessories){
        while($fp = mysqli_fetch_assoc($fetchaccessories)){
            $result .= "<div class='col-md-6 col-sm-6 col-lg-4 col-custom product-area'>
            <div class='product-item'>
                <div class='single-product position-relative mr-0 ml-0'>
                    <div class='product-image'>
                        <a class='d-block' href='description1.php?accessory_id={$fp['accessory_id']}'>
                            <img src='./admin/uploads_img/{$fp['image']}' alt='' class='product-image-1 w-100'>
                            <img src='./admin/uploads_img/{$fp['image']}' alt='' class='product-image-2 position-absolute w-100'>
                        </a>
                        <span class='onsale'>Sale!</span>
                        <div class='add-action d-flex flex-column position-absolute'>
                            
                            <a href='wishlist.php' title='Add To Wishlist'>
                                <i class='lnr lnr-heart' data-toggle='tooltip' data-placement='left' title='Wishlist'></i>
                            </a>
                            
                        </div>
                    </div>
                    <div class='product-content'>
                        <div class='product-title'>
                            <h4 class='title-2'> <a href='description1.php'>{$fp['name']}</a></h4>
                        </div>
                        <div class='product-rating'>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star-o'></i>
                            <i class='fa fa-star-o'></i>
                        </div>
                        <div class='price-box'>
                            <span class='regular-price '>{$fp['price']}</span>
                            
                        </div>
                        
                    </div>
                    <div class='product-content-listview'>
                        <div class='product-title'>
                            <h4 class='title-2'> <a href='description1.php'>{$fp['purpose']}</a></h4>
                        </div>
                        <div class='product-rating'>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star-o'></i>
                            <i class='fa fa-star-o'></i>
                        </div>
                        <div class='price-box'>
                            <span class='regular-price '>$60.00</span>
                            <span class='old-price'><del>$70.00</del></span>
                        </div>
                        <p class='desc-content'>{$fp['purpose']}</p>
                        
                    </div>
                </div>
            </div>
        </div>
        ";
        }
    }
    echo $result;
}else if($_POST['type']=='high'){
    $result = "";
    $fetchaccessories = mysqli_query($config,"SELECT * FROM accessories ORDER BY price DESC ");
    if($fetchaccessories){
        while($fp = mysqli_fetch_assoc($fetchaccessories)){
            $result .= "<div class='col-md-6 col-sm-6 col-lg-4 col-custom product-area'>
            <div class='product-item'>
                <div class='single-product position-relative mr-0 ml-0'>
                    <div class='product-image'>
                        <a class='d-block' href='description1.php?accessory_id={$fp['accessory_id']}'>
                            <img src='./admin/uploads_img/{$fp['image']}' alt='' class='product-image-1 w-100'>
                            <img src='./admin/uploads_img/{$fp['image']}' alt='' class='product-image-2 position-absolute w-100'>
                        </a>
                        <span class='onsale'>Sale!</span>
                        <div class='add-action d-flex flex-column position-absolute'>
                            
                            <a href='wishlist.php' title='Add To Wishlist'>
                                <i class='lnr lnr-heart' data-toggle='tooltip' data-placement='left' title='Wishlist'></i>
                            </a>
                            
                        </div>
                    </div>
                    <div class='product-content'>
                        <div class='product-title'>
                            <h4 class='title-2'> <a href='description1.php'>{$fp['name']}</a></h4>
                        </div>
                        <div class='product-rating'>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star-o'></i>
                            <i class='fa fa-star-o'></i>
                        </div>
                        <div class='price-box'>
                            <span class='regular-price '>{$fp['price']}</span>
                            
                        </div>
                        
                    </div>
                    <div class='product-content-listview'>
                        <div class='product-title'>
                            <h4 class='title-2'> <a href='description1.php'>{$fp['purpose']}</a></h4>
                        </div>
                        <div class='product-rating'>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star-o'></i>
                            <i class='fa fa-star-o'></i>
                        </div>
                        <div class='price-box'>
                            <span class='regular-price '>$60.00</span>
                            <span class='old-price'><del>$70.00</del></span>
                        </div>
                        <p class='desc-content'>{$fp['purpose']}</p>
                        
                    </div>
                </div>
            </div>
        </div>
        ";
        }
    }
    echo $result;
}else if($_POST['type']=='search'){
    $result = "";
    $searchValue = $_POST['svalue'];
    $fetchaccessories = mysqli_query($config,"SELECT * FROM accessories WHERE `name` LIKE '%$searchValue%' OR `price` LIKE '%$searchValue%' ");
    if($fetchaccessories){
        while($fp = mysqli_fetch_assoc($fetchaccessories)){
            $result .= "<div class='col-md-6 col-sm-6 col-lg-4 col-custom product-area'>
            <div class='product-item'>
                <div class='single-product position-relative mr-0 ml-0'>
                    <div class='product-image'>
                        <a class='d-block' href='description1.php?accessory_id={$fp['accessory_id']}'>
                            <img src='./admin/uploads_img/{$fp['image']}' alt='' class='product-image-1 w-100'>
                            <img src='./admin/uploads_img/{$fp['image']}' alt='' class='product-image-2 position-absolute w-100'>
                        </a>
                        <span class='onsale'>Sale!</span>
                        <div class='add-action d-flex flex-column position-absolute'>
                            
                            <a href='wishlist.php' title='Add To Wishlist'>
                                <i class='lnr lnr-heart' data-toggle='tooltip' data-placement='left' title='Wishlist'></i>
                            </a>
                            
                        </div>
                    </div>
                    <div class='product-content'>
                        <div class='product-title'>
                            <h4 class='title-2'> <a href='description1.php'>{$fp['name']}</a></h4>
                        </div>
                        <div class='product-rating'>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star-o'></i>
                            <i class='fa fa-star-o'></i>
                        </div>
                        <div class='price-box'>
                            <span class='regular-price '>{$fp['price']}</span>
                            
                        </div>
                        
                    </div>
                    <div class='product-content-listview'>
                        <div class='product-title'>
                            <h4 class='title-2'> <a href='description1.php'>{$fp['purpose']}</a></h4>
                        </div>
                        <div class='product-rating'>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star-o'></i>
                            <i class='fa fa-star-o'></i>
                        </div>
                        <div class='price-box'>
                            <span class='regular-price '>$60.00</span>
                            <span class='old-price'><del>$70.00</del></span>
                        </div>
                        <p class='desc-content'>{$fp['purpose']}</p>
                        
                    </div>
                </div>
            </div>
        </div>
        ";
        }
    }
    echo $result;
}else if($_POST['type']=='category'){
    $result = "";
    $categoryId = $_POST['categoryId'];
    $fetchaccessories = mysqli_query($config,"SELECT * FROM accessories WHERE plant_id = $categoryId");
    if($fetchaccessories){
        while($fp = mysqli_fetch_assoc($fetchaccessories)){
            $result .= "<div class='col-md-6 col-sm-6 col-lg-4 col-custom product-area'>
            <div class='product-item'>
                <div class='single-product position-relative mr-0 ml-0'>
                    <div class='product-image'>
                        <a class='d-block' href='description1.php?accessory_id={$fp['accessory_id']}'>
                            <img src='./admin/uploads_img/{$fp['image']}' alt='' class='product-image-1 w-100'>
                            <img src='./admin/uploads_img/{$fp['image']}' alt='' class='product-image-2 position-absolute w-100'>
                        </a>
                        <span class='onsale'>Sale!</span>
                        <div class='add-action d-flex flex-column position-absolute'>
                            
                            <a href='wishlist.php' title='Add To Wishlist'>
                                <i class='lnr lnr-heart' data-toggle='tooltip' data-placement='left' title='Wishlist'></i>
                            </a>
                            
                        </div>
                    </div>
                    <div class='product-content'>
                        <div class='product-title'>
                            <h4 class='title-2'> <a href='description1.php'>{$fp['name']}</a></h4>
                        </div>
                        <div class='product-rating'>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star-o'></i>
                            <i class='fa fa-star-o'></i>
                        </div>
                        <div class='price-box'>
                            <span class='regular-price '>{$fp['price']}</span>
                            
                        </div>
                        
                    </div>
                    <div class='product-content-listview'>
                        <div class='product-title'>
                            <h4 class='title-2'> <a href='description1.php'>{$fp['purpose']}</a></h4>
                        </div>
                        <div class='product-rating'>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star'></i>
                            <i class='fa fa-star-o'></i>
                            <i class='fa fa-star-o'></i>
                        </div>
                        <div class='price-box'>
                            <span class='regular-price '>$60.00</span>
                            <span class='old-price'><del>$70.00</del></span>
                        </div>
                        <p class='desc-content'>{$fp['purpose']}</p>
                        
                    </div>
                </div>
            </div>
        </div>
        ";
        }
    }
    echo $result;
}
?>