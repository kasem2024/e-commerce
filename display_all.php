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
  <title>Products_Page</title>
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
    .sticky{
      position: sticky;
      top: 0px;
      z-index: 3;
      box-shadow: 14px 7px 4px 1px #423b3b;
      background-color: #6F2D91;
      margin-bottom: 10px;

      
    }
  </style>
</head>

<body>
  <!-- frist child -->
  <div class="sticky">
  <div class="container-fluid p-0 ">
    <nav class="navbar navbar-expand-lg navbar-light ">
      <a class="navbar-brand " href="#"><i class="fa-brands fa-nfc-symbol"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
       data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
       aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item ">
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
          <li class="nav-item">
            <a class="nav-link text-light" href="#"> price: <?php total_cart_price() ?>/-</a>
          </li>
        </ul>
        <form class="d-flex" action="search_product.php" method="get">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
          <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
        </form>
      </div>
    </nav>
 
</div>
  <!-- Call cart       -->
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
              <a class='nav-link text-light' href='#'>Welcome <span class='user'>".$_SESSION['username']."<span>  </a>
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
  <!-- fourth child -->
  <div class="row px-1">
    <!-- products child -->
    <div class="col-md-10">
      <div class="row">
        <!-- fetching_product -->
        <?php
        get_all_products();
        get_uniqe_categories();
        get_uniqe_brands()
        ?>
      </div>
    </div>

    <!-- categories and brands child -->
    <div class="col-md-2 bg-secondary p-0">
      <ul class="navbar-nav me-auto text-center ">
        <li class="nav-item bg-dark">
          <a href="#" class="nav-link text-light">
            <h4>Delivery Brands</h4>
          </a>
        </li>
        <?php
        getbrands();
        ?>
        <li class="nav-item bg-dark">
          <a href="#" class="nav-link text-light">
            <h4>Categories</h4>
          </a>
        </li>
        <?php
        getcategory();
        ?>
      </ul>
    </div>

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