<?php
include("./config.php");
if($_POST['type']=='load'){
    $result = "";
    $fetchPlants = mysqli_query($config,"SELECT * FROM plants WHERE delete_status = 0");
    if($fetchPlants){
        while($fp = mysqli_fetch_assoc($fetchPlants)){
            $result .= "<div class='col-md-6 col-sm-6 col-lg-4 col-custom product-area'>
            <div class='product-item'>
                <div class='single-product position-relative mr-0 ml-0'>
                    <div class='product-image'>
                        <a class='d-block' href='description.php?plantId={$fp['plant_id']}'>
                            <img src='./admin/uploads_img/{$fp['plant_image']}' alt='' class='product-image-1 w-100'>
                            <img src='./admin/uploads_img/{$fp['plant_image']}' alt='' class='product-image-2 position-absolute w-100'>
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
                            <h4 class='title-2'> <a href='description.php'>{$fp['name']}</a></h4>
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
                            <h4 class='title-2'> <a href='description.php'>{$fp['name']}</a></h4>
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
                        <p class='desc-content'>{$fp['description']}</p>
                        
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
    $fetchPlants = mysqli_query($config,"SELECT * FROM plants WHERE delete_status = 0 ORDER BY price ASC ");
    if($fetchPlants){
        while($fp = mysqli_fetch_assoc($fetchPlants)){
            $result .= "<div class='col-md-6 col-sm-6 col-lg-4 col-custom product-area'>
            <div class='product-item'>
                <div class='single-product position-relative mr-0 ml-0'>
                    <div class='product-image'>
                        <a class='d-block' href='description.php?plantId={$fp['plant_id']}'>
                            <img src='./admin/uploads_img/{$fp['plant_image']}' alt='' class='product-image-1 w-100'>
                            <img src='./admin/uploads_img/{$fp['plant_image']}' alt='' class='product-image-2 position-absolute w-100'>
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
                            <h4 class='title-2'> <a href='description.php'>{$fp['name']}</a></h4>
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
                            <h4 class='title-2'> <a href='description.php'>{$fp['name']}</a></h4>
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
                        <p class='desc-content'>{$fp['description']}</p>
                        
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
    $fetchPlants = mysqli_query($config,"SELECT * FROM plants WHERE delete_status = 0 ORDER BY price DESC ");
    if($fetchPlants){
        while($fp = mysqli_fetch_assoc($fetchPlants)){
            $result .= "<div class='col-md-6 col-sm-6 col-lg-4 col-custom product-area'>
            <div class='product-item'>
                <div class='single-product position-relative mr-0 ml-0'>
                    <div class='product-image'>
                        <a class='d-block' href='description.php?plantId={$fp['plant_id']}'>
                            <img src='./admin/uploads_img/{$fp['plant_image']}' alt='' class='product-image-1 w-100'>
                            <img src='./admin/uploads_img/{$fp['plant_image']}' alt='' class='product-image-2 position-absolute w-100'>
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
                            <h4 class='title-2'> <a href='description.php'>{$fp['name']}</a></h4>
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
                            <h4 class='title-2'> <a href='description.php'>{$fp['name']}</a></h4>
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
                        <p class='desc-content'>{$fp['description']}</p>
                        
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
    $fetchPlants = mysqli_query($config,"SELECT * FROM plants WHERE `name` LIKE '%$searchValue%' OR `price` LIKE '%$searchValue%' ");
    if($fetchPlants){
        while($fp = mysqli_fetch_assoc($fetchPlants)){
            $result .= "<div class='col-md-6 col-sm-6 col-lg-4 col-custom product-area'>
            <div class='product-item'>
                <div class='single-product position-relative mr-0 ml-0'>
                    <div class='product-image'>
                        <a class='d-block' href='description.php?plantId={$fp['plant_id']}'>
                            <img src='./admin/uploads_img/{$fp['plant_image']}' alt='' class='product-image-1 w-100'>
                            <img src='./admin/uploads_img/{$fp['plant_image']}' alt='' class='product-image-2 position-absolute w-100'>
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
                            <h4 class='title-2'> <a href='description.php'>{$fp['name']}</a></h4>
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
                            <h4 class='title-2'> <a href='description.php'>{$fp['name']}</a></h4>
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
                        <p class='desc-content'>{$fp['description']}</p>
                        
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
    $fetchPlants = mysqli_query($config,"SELECT * FROM plants WHERE category_id = $categoryId AND delete_status = 0 ");
    if($fetchPlants){
        while($fp = mysqli_fetch_assoc($fetchPlants)){
            $result .= "<div class='col-md-6 col-sm-6 col-lg-4 col-custom product-area'>
            <div class='product-item'>
                <div class='single-product position-relative mr-0 ml-0'>
                    <div class='product-image'>
                        <a class='d-block' href='description.php?plantId={$fp['plant_id']}'>
                            <img src='./admin/uploads_img/{$fp['plant_image']}' alt='' class='product-image-1 w-100'>
                            <img src='./admin/uploads_img/{$fp['plant_image']}' alt='' class='product-image-2 position-absolute w-100'>
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
                            <h4 class='title-2'> <a href='description.php'>{$fp['name']}</a></h4>
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
                            <h4 class='title-2'> <a href='description.php'>{$fp['name']}</a></h4>
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
                        <p class='desc-content'>{$fp['description']}</p>
                        
                    </div>
                </div>
            </div>
        </div>
        ";
        }
    }
    echo $result;
}else if($_POST['type']=='fetchCountry'){
    $result = "";
    $countryId = $_POST['id'];
    $fetchPlants = mysqli_query($config,"SELECT * FROM state WHERE country_id = $countryId ");
    if(mysqli_num_rows($fetchPlants)>0){
        while($fetchState = mysqli_fetch_assoc($fetchPlants)){
            $result.="<option value='{$fetchState['state_id']}'>{$fetchState['state_name']}</option>";
        }
    }
    echo $result;
}else if($_POST['type']=='fetchCity'){
    $result = "";
    $stateId = $_POST['sid'];
    $fetchPlants = mysqli_query($config,"SELECT * FROM city WHERE state_id = $stateId ");
    if(mysqli_num_rows($fetchPlants)>0){
        while($fetchState = mysqli_fetch_assoc($fetchPlants)){
            $result.="<option value='{$fetchState['city_id']}'>{$fetchState['city_name']}</option>";
        }
    }
    echo $result;
}else if($_POST['type']=='checkCart'){
    $result = "";
    $plantId = $_POST['plantId'];
    $quantity = intval($_POST['quantity']);
    $checkQuantity = mysqli_query($config,"SELECT quantity FROM plants WHERE plant_id = $plantId");
    $fetchQuantity = mysqli_fetch_assoc($checkQuantity);
    $getQuantity = intval($fetchQuantity['quantity']);
    if($quantity>$getQuantity){
        $result = 0;
    }else{
        $result = 1;
    }
    echo $result;
}
?>