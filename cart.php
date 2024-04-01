<?php

include("includes/connect.php");
include("functions/common_functions.php");
@session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart_Page</title>
    <!-- Boatstrap css link -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!-- fontasome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <!-- css -->
    <!-- bootstrap css internal -->
    <link rel="stylesheet" href="css_style/bootstrap.min.css">
    <link rel="stylesheet" href="css_style/all.min.css">
    <link rel="stylesheet" href="css_style/style.css">

    <!-- font from google -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Public+Sans:wght@300;400&family=Roboto:wght@300;500;900&family=Work+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"> -->

    <style>
        *::selection{
    background-color: #423b3b;
    color: #ffc107;
    }
    /* .conts{
            height: 100vh;
            } */
        .user{
        color: aquamarine;
        }
        .logo {
            width: 19%;
            height: 19%;
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }

        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
        .sticky{
        position: sticky;
        top: 0px;
        z-index: 3;
        box-shadow:14px 7px 4px 1px #423b3b;;
        background-color: #6F2D91;
        margin-bottom: 10px;
    }

    /* cart-vedio */
    .video{
position: relative;
height: 500px;
width: 800px;
margin: auto;
overflow: hidden;
}
/* 
.video::before{
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    height: 600px;
    width: 900px;
    background-color: rgb(0, 0, 0, 40%);

} */
.video video {
    width: 100%;

}




    
    </style>
</head>

<body>
    <!-- frist child -->
    <div class="sticky">
    <div class="container-fluid p-0 ">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand " href="#"><i class="fa-brands fa-nfc-symbol"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item text-light">
                        <a class="nav-link active text-light" href="index4.php" arie-current="page"> Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="./user_area/user_registration.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Contact </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="cart.php"><i class="fa-solid fa-cart-arrow-down"></i><sup><?php cart_item() ?></sup></a>
                    </li>
                </ul>
                <form class="d-flex" action="search_product.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                </form>
            </div>
        </nav>
        </div>
    
    <?php
    cart();
    ?>

    <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
        <?php
            if (!isset($_SESSION['username'])){
                echo  "<li class='nav-item'>
                <a class='nav-link text-light' href='#'>Welcome Guest</a>
                </li>'";
                }
                else {
                    echo  "<li class='nav-item'>
                <a class='nav-link text-light' href='#'>Welcome <span class='user'>".$_SESSION['username']."<span></a>
                </li>";

                };

        if( !isset( $_SESSION ['username'])) {
            echo "<li class='nav-item'>
            <a class='nav-link text-light' href='./user_area/user_login.php'>Login</a>
            </li>";
        }
        else{
            echo "<li class='nav-item'>
            <a class='nav-link text-light' href='./user_area/user_logout.php'>Logout</a>
        </li>";
        }
        ?>
        </ul>
        </nav>
    
    </div>
    
    <!-- table -->
    <div class="conts">
    <div class="container">
        <div class="row">
            <form method="post" action="">
                <table class="table table-bordered text-center my-3">
                    <tbody>
                        <!-- php code -->
                        <?php
                        $get_ip_add = getIPAddress();
                        $total = 0;
                        $select_query = "select * from `cart_details` where ip_address='$get_ip_add' ";
                        $result_query = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $select_query);
                        $count_cart = mysqli_num_rows($result_query);
                        if ($count_cart > 0) {
                            echo "<thead>
                                    <tr>
                                        <th>ProductTitle</th>
                                        <th>Productimage</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Remove</th>
                                        <th colspan='2'>Operations</th>
                                    </tr>
                                </thead>";
                            while ($row_cart = mysqli_fetch_array($result_query)) {
                                $product_id = $row_cart['product_id'];
                                $product_query = "select * from `products` where product_id='$product_id' ";
                                $result_product_query = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $product_query);
                                while ($row_product = mysqli_fetch_array($result_product_query)) {
                                    $product_price = array($row_product['product_price']);
                                    $normal_product_price = $row_product['product_price'];
                                    $product_title = $row_product['product_title'];
                                    $product_image1 = $row_product['product_imge1'];
                                    $price_value = array_sum($product_price);
                                    $total += $price_value;

                        ?>
                                    <tr>
                                        <td><?php echo $product_title ?></td>
                                        <td><img src="admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                                        <td><input type="text" name="qty" class="form-input w-50"></td>
                                        <?php
                                        $get_ip_address = getIPAddress();
                                        if (isset($_POST['update_cart'])) {
                                            $quatities = $_POST['qty'];
                                            $update_cart = "UPDATE cart_details SET quantity=$quatities WHERE ip_address='$get_ip_address'";
                                            $result_cart = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $update_cart);
                                            $total = $total * $quatities;
                                        }

                                        ?>

                                        <td> <?php echo $normal_product_price ?></td>
                                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                        <td>
                                            <input type="submit" value="Update" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                                            <input type="submit" value="remove" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                                        </td>
                                    </tr>

                        <?php }
                            }
                        } else
                            echo "<h2 class='text-center text-danger'>the cart empty</h2>"
                        ?>


                    </tbody>
                </table>
            </form>
            <?php
            function remove_item_cart()
            {
                if (isset($_POST['remove_cart'])) {
                    foreach ((array)$_POST['removeitem'] as $removed_id) {

                        $delet_query =  "DELETE FROM cart_details WHERE product_id=$removed_id";
                        $result_delet = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $delet_query);

                            if ($result_delet) {
                                echo "<script><h2 class='text_center text-danger'>Empty Cart </h2> </script>";
                            }
                    }
                }
            }

            echo $remove_item = remove_item_cart();
            ?>
            <!-- subtotal -->
            <div class="d-flex mb-5">
                <?php
                $get_ip_add = getIPAddress();
                $select_query = "select * from `cart_details` where ip_address='$get_ip_add' ";
                $result_query = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $select_query);
                $count_cart = mysqli_num_rows($result_query);
                if ($count_cart > 0) {

                    echo "<h4 class='px-3'>Subtotal:<strong class='text-info '> $total </strong>/-</h4>
                        <a  href='index4.php'><button class='bg-info px-3 py-2 border-0 mx-3'> continue_shopping</button></a>
                        <a href='./user_area/checkout.php'><button class='bg-secondary px-3 py-2 border-0 text-light'>Buy Now..</button></a>";
                } else {
                    echo  "<a  href='index4.php'><button class='bg-info px-3 py-2 border-0 mx-3'> continue_shopping</button></a>";
                }
                ?>
                
                
                
            </div>

        </div>
    </div>
    </div>

<!-- cart-vedio -->
<div class="video">
                <video muted autoplay loop>
                    <source src="./image/cartvedio.mp4" type="video/mp4">
                </video>
                <!-- <div class="text">
                    <h2>product is ready</h2>
                    <p>its all you need</p>
                    <button> see more</button>
                </div> -->
            </div>

    <?php
    include("includes/footer.php");
    ?>


    <!-- bootstrap js link external -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <!-- js js internal -->
    <!-- fontasome.js -->
    <script src="js/all.min.js"></script>
    <!-- bootstrap .js -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>