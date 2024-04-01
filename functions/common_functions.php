<?php
    // include("./includes/connect.php");

function getproducts()
    {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $select_query = "select * from `products` order by rand()  limit 0,9";
                $result_query = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_decscription = $row['product_description'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    $product_image1 = $row['product_imge1'];
                    $product_price = $row['product_price'];
                    
                    echo    "<div class='col-md-4 mb-2'>
                                <div class='card'>
                                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>\manual\en\mysqli.query.php
                                    <div class='card-body'>
                                        <h5 class='card-title'>$product_title</h5>
                                        <p class='card-text'>$product_decscription</p>
                                        <p class='card-text'>price: $product_price/-</p>
                                        <a href='index4.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
                                        <a href='products_details.php?product=$product_id' class='btn btn-warning'>View More</a>
                                    </div>
                                </div>
                            </div> ";
                }
            }
        }
    };



function get_all_products()
{
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "select * from `products` order by rand()";
            $result_query = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_decscription = $row['product_description'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                $product_image1 = $row['product_imge1'];
                $product_price = $row['product_price'];
                echo      "<div class='col-md-4 mb-2'>
                        <div class='card' >
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_decscription</p>
                                    <p class='card-text'>price: $product_price/-</p>
                                    <a href='index4.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
                                    <a href='products_details.php?product=$product_id' class='btn btn-warning'>View More</a>
                                </div>
                        </div>
                    </div> ";
            }
        }
    }
};



function search_products()
{
    if (isset($_GET['search_data_product'])) {
        $product = $_GET['search_data'];
        $search_query = "select * from `products` where product_title like '$product%' ";
        $result_query = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $search_query);
        $num_rows = mysqli_num_rows($result_query);
        if ($num_rows == 0) {
            echo  "<h2 class='text-center text-danger'>*NO Results Match . No Products Found*</h2>";
        }else{
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_decscription = $row['product_description'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_imge1'];
            $product_price = $row['product_price'];
            echo      "<div class='col-md-4 mb-2'>
                            <div class='card' >
                                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$product_title</h5>
                                        <p class='card-text'>$product_decscription</p>
                                        <p class='card-text'>price: $product_price/-</p>
                                        <a href='index4.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
                                        <a href='products_details.php?product=$product_id' class='btn btn-warning'>View More</a>
                                    </div>
                            </div>
                        </div> ";
                    }
        }
    }
};

function get_uniqe_categories()
{
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "select * from `products` where category_id=$category_id";
        $result_query = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $select_query);
        $num_rows = mysqli_num_rows($result_query);
        if ($num_rows == 0) {
            echo  "<h2 class='text-center text-danger'>*NO Stock For This Category*</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_decscription = $row['product_description'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_imge1'];
            $product_price = $row['product_price'];
            echo   "<div class='col-md-4 mb-2'>
                        <div class='card' >
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_decscription</p>
                                <p class='card-text'>price: $product_price/-</p>
                                <a href='index4.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
                                <a href='products_details.php?product=$product_id' class='btn btn-warning'>View More</a>
                            </div>
                        </div>
                    </div> ";
        }
    }
};


function get_uniqe_brands()
{
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "select * from `products` where brand_id=$brand_id";
        $result_query = mysqli_query(mysql: mysqli_connect(hostname: 'localhost', username: 'root', password: '', database: 'mystore'), query: $select_query);
        $num_rows = mysqli_num_rows($result_query);
        if ($num_rows == 0) {
            echo  "<h2 class='text-center text-danger'>*This Brand is not Available For This Service*</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_decscription = $row['product_description'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            $product_image1 = $row['product_imge1'];
            $product_price = $row['product_price'];
            echo      "<div class='col-md-4 mb-2'>
                        <div class='card' >
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_decscription</p>
                                    <p class='card-text'>price: $product_price/-</p>
                                    <a href='index4.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
                                    <a href='products_details.php?product=$product_id' class='btn btn-warning'>View More</a>
                                </div>
                        </div>
                    </div> ";
        }
    }
};


function getbrands()
{
    $select_brands = " select * from `brands` ";
    $result = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $select_brands);
    while ($row = mysqli_fetch_assoc($result)) {
        $brand_title = $row['brand_title'];
        $brand_id = $row['brand_id'];
        echo "<li class='nav-item '>
                        <a href='index4.php?brand=$brand_id' class='nav-link text-light'>$brand_title </a>
                        </li>";
    }
};

function getcategory()
{
    $select_category = " select * from `categories` ";
    $result = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $select_category);
    while ($row = mysqli_fetch_assoc($result)) {
        $category_title = $row['category_title'];
        $category_id = $row['category_id'];
        echo "<li class='nav-item '>
                <a href='index4.php?category=$category_id' class='nav-link text-light'>$category_title </a>
                </li>";
    }
};


function view_details()
{
    if (isset($_GET['product']))
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product = $_GET['product'];
                $select_query = "select * from `products` where product_id=$product";
                $result_query = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_decscription = $row['product_description'];
                    $category_id = $row['category_id'];
                    $brand_id = $row['brand_id'];
                    $product_image1 = $row['product_imge1'];
                    $product_image2 = $row['product_imge2'];
                    $product_image3 = $row['product_imge3'];
                    $product_price = $row['product_price'];
                    echo      "<div class='col-md-4 mb-2'>
                            <div class='card' >
                                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>$product_title</h5>
                                        <p class='card-text'>$product_decscription</p>
                                        <p class='card-text'>price: $product_price/-</p>
                                        <a href='index4.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
                                        <a href='index4.php' class='btn btn-warning'>Go Home</a>
                                    </div>
                            </div>
                        </div> 
                    <div class='col-md-8'>
                    <div class='row'>
                            <div class='col-md-12'>
                                <h2 class='text-center text-info bg-light mb-5'>Related Products</h2>
                            </div>
                            
                            <div class='col-md-6'>
                                <img src='./admin_area/product_images/$product_image2'class='card-img-top ' alt='$product_title'>
                            </div>  
                            <div class='col-md-6'>
                                <img src='./admin_area/product_images/$product_image3'class='card-img-top ' alt='$product_title'>
                            </div> 
                    </div>    
                    </div>";
                }
            }
        }
}

function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  



function cart()
{
    if (isset($_GET['add_to_cart'])) {
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        //condition
        $select_query = "select * from `cart_details` where product_id=' $get_product_id' and ip_address='$get_ip_add' ";
        $result_query = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $select_query);
        $num_rows = mysqli_num_rows($result_query);
        if ($num_rows > 0) {
            echo  "<script>alert('this item is already present inside the cart')</script> ";
            echo  "<script>window.open('index4.php','_self')</script> ";
        }
        //insert data 
        else {
            $insert_query = "insert into `cart_details` ( product_id,ip_address,quantity) 
                            values ($get_product_id,'$get_ip_add',0 )";

            $result_query = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $insert_query);
            echo "<script>alert(' item is added to cart')</script>";
            echo  "<script>window.open('index4.php','_self')</script>";
        }
    }
};

    function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        $get_ip_add = getIPAddress();
        $select_query = "select * from `cart_details` where ip_address='$get_ip_add' ";
        $result_query = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $select_query);
        $num_items = mysqli_num_rows($result_query);
    } else {
        $get_ip_add = getIPAddress();
        $select_query = "select * from `cart_details` where ip_address='$get_ip_add' ";
        $result_query = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $select_query);
        $num_items = mysqli_num_rows($result_query);
    };
    echo $num_items;
};
function total_cart_price()
{
    $get_ip_add = getIPAddress();
    $total = 0;
    $select_query = "select * from `cart_details` where ip_address='$get_ip_add' ";
    $result_query = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $select_query);
    while ($row_cart = mysqli_fetch_array($result_query)) {
        $product_id = $row_cart['product_id'];
        $product_query = "select * from `products` where product_id='$product_id' ";
        $result_product_query = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $product_query);
        while ($row_product = mysqli_fetch_array($result_product_query)) {
            $product_price = array($row_product['product_price']);
            $price_value = array_sum($product_price);
            $total += $price_value;
        }
    }
    echo $total;
}



