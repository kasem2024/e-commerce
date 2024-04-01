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
  <title>Shopping</title>
  <!-- Boatstrap css link -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
  <!-- fontasome -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
  integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
  crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <!-- css -->
  <!-- bootstrap css internal -->
    <link rel="stylesheet" href="css_style/style.css">
    <link rel="stylesheet" href="css_style/bootstrap.min.css">
    <link rel="stylesheet" href="css_style/all.min.css">


    <!-- font from google -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Public+Sans:wght@300;400&family=Roboto:wght@300;500;900&family=Work+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"> -->

<style>
    html {
    scroll-behavior: smooth;
}

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
      box-shadow:14px 7px 4px 1px #423b3b;
      background-color: #6F2D91;
      margin-bottom: 10px;
    }
    /* component */
    .container .main_heading {
    text-align: center;
}

 .container .main_heading h2 {
    text-transform: uppercase;
    font-weight   : normal;
    font-size     : 40px;
    margin-bottom : 60px;
    position      : relative;

}

.container .main_heading h2::before {
    content          : "";
    position         : absolute;
    left             : 50%;
    transform        : translateX(-50%);
    -webkit-transform: translateX(-50%);
    -moz-transform   : translateX(-50%);
    -ms-transform    : translateX(-50%);
    -o-transform     : translateX(-50%);
    bottom           : -30px;
    background-color : black;
    height           : 2px;
    width            : 120px;

}

 .container .main_heading h2::after {
    content              : "";
    position             : absolute;
    left                 : 50%;
    transform            : translateX(-50%);
    -webkit-transform    : translateX(-50%);
    -moz-transform       : translateX(-50%);
    -ms-transform        : translateX(-50%);
    -o-transform         : translateX(-50%);
    bottom               : -37px;
    width                : 14px;
    height               : 14px;
    border               : 1px solid #333;
    border-radius        : 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius   : 50%;
    -ms-border-radius    : 50%;
    -o-border-radius     : 50%;
    background-color     : white;

}

 .container .main_heading p {
    width      : 550px;
    margin     : 0 auto 100px;
    max-width  : 100%;
    line-height: 2;
}

    /* porfolio */
    .portfolio{
    padding-top: 50px;
    padding-bottom: 50px;
    /* background-color:#607d8b; */
}
/* .portfolio .shuflle{
    display: flex;
    justify-content: center;

}
.portfolio .shuflle li{
    padding: 10px;
    list-style:none;

}
.portfolio .shuflle .active{
    color: rgb(255, 255, 255);
    background: cornflowerblue;
} */


.portfolio .imgs-contianer{
display: flex;
flex-wrap: wrap;
margin-top: 50px;
margin-bottom:50px;

}
.portfolio .imgs-contianer .box{
position: relative;
overflow: hidden;

}
.portfolio .imgs-contianer .box:hover .caption{
bottom: 0;
}
.portfolio .imgs-contianer .box:hover img{
    transform: rotate(1deg) scale(1.3)     ;
    -webkit-transform: rotate(1deg) scale(1.3)     ;
    -moz-transform: rotate(1deg) scale(1.3)     ;
    -ms-transform: rotate(1deg) scale(1.3)     ;
    -o-transform: rotate(1deg) scale(1.3)     ;
}


@media (max-width:767px) {
    .portfolio .imgs-contianer .box{
        flex-basis: 50%;
    }
}
@media (min-width:768px){
    .portfolio .imgs-contianer .box{
        flex-basis: 25%;
    }
}
@media (min-width:1199px){
    .portfolio .imgs-contianer .box{
        flex-basis: 12.5%;

    }
}

.portfolio .imgs-contianer .box img{
    width:100%;
    height:100%;
    transition: 0.3s;
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
}
.portfolio .imgs-contianer .box .caption{
    position: absolute;
    left: 0;
    bottom:-100%;
    width: 100%;
    height: 60px;
    background-color: white;
    color: #777;
    transition: 0.3s;
    -webkit-transition: 0.3s;
    -moz-transition: 0.3s;
    -ms-transition: 0.3s;
    -o-transition: 0.3s;
    padding:7px;
}
.portfolio .imgs-contianer .box .caption h4 {
    margin-bottom: 3px;
    text-align: center;
}
.portfolio .imgs-contianer .box .caption p{
    color: rgb(35, 160, 160);
    text-align: center;
}

.portfolio a {
    text-decoration: none;
    /* display: flex;
    justify-content: center;
    align-items: center; */

}
.portfolio a p{
width: 100px;
height: 50px;
background-color: #607d8b;
color: white;
padding: 15px 5px 5px ;
text-align: center;
margin: auto;
text-transform: uppercase;

}
/* contact */
.special_heading {
    margin        : 0;
    text-align    : center;
    font-size     : 100px;
    font-weight   : 800;
    letter-spacing: -3;
    color         : #e1e1e1;
}

.special_heading+p {
    text-align: center;
    font-size : 20px;
    margin-top: -30px;
    color     : #333;
}

@media (max-width:767) {
    .special_heading {
        font-size: 50px;

    }

    .special_heading+p {
        margin-top: -20;
    }
}

.contact {
    padding-top     : 60px;
    padding-bottom  : 60px;
    background-color: rgba(239, 237, 237, 0.843);
}

.contact .contact-content {
    margin-top: 60px;
    text-align: center;

}

.contact .contact-content .lable {
    font-size     : 40px;
    font-weight   : 800;
    color         : #333;
    letter-spacing: -2;
    margin        : 20px 0;


}

.contact .contact-content .link {
    display        : block;
    font-size      : 40px;
    font-weight    : 700;
    color          : #26b3a4;
    margin         : 20px 0;
    text-decoration: none;
}

.contact .contact-content .social {
    text-align: center;
    font-size : 18px;
    color     : #777;

}

.contact .contact-content .social i {
    color       : #333;
    padding-left: 20px;
    font-size   : 30px;
}

@media (max-width: 767px) {

    .contact .contact-content .lable,
    .contact .contact-content .link {
        font-size: 25px;
    }
}

.footer {
    background-color: #21668b;
    color           : white;
    font-size       : 18px;
    padding         : 30px 10px;
    text-align      : center;

}

.footer span {
    color      : #10cab7;
    font-size  : 22px;
    font-weight: bold;

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
            <a class="nav-link text-light" href="#Contact">Contact </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="cart.php"><i class="fa-solid fa-cart-arrow-down"></i><sup><?php cart_item() ?></sup></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#"> price: <?php total_cart_price() ?>/-</a>
          </li>
        </ul>
        <form class="d-flex" action="search_product.php" method="get">
          <input class="form-control me-2" type="search" placeholder="Search"autocomplete="none" aria-label="Search" name="search_data">
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
              <a class='nav-link text-light' href='#'>Welcome  <span class='user'>".$_SESSION['username']."<span> </a>
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
<!-- protfolio -->


  <div class="row px-1">
    <!-- products child -->
    
        <div class="col-md-10 bg-light" >
          <div class="row">
            <!-- fetching_product -->
            <?php
            getproducts();
            get_uniqe_categories();
            get_uniqe_brands();
            // $ip = getIPAddress();  
            // echo 'User Real IP Address - '.$ip;  
            ?>
          </div>
  </div>
    

      <!-- categories and brands child -->
      
        <div class="col-md-2 bg-secondary p-0" >
          <ul class="navbar-nav me-auto text-center">
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
  
      <div class="portfolio ">
        <div class="container">  
            <a href="#" class="more">
            <p>more</p>
            </a>
        </div>
        <div class="imgs-contianer">
            <div class="box">
                <img src=" image/img8.jpg" alt="">
                <div class="caption">
                    <h4>product</h4>
                    <p>photograghy</p>
                </div>
            </div>
            <div class="box">
                <img src="image/img1.jpg" alt="">
                <div class="caption">
                    <h4>product</h4>
                    <p>photograghy</p>
                </div>
            </div>
            <div class="box">
                <img src="image/img2.jpg" alt="">
                <div class="caption">
                    <h4>product</h4>
                    <p>photograghy</p>
                </div>
            </div>
            <div class="box">
                <img src="image/img3.jpg" alt="">
                <div class="caption">
                    <h4>product</h4>
                    <p>photograghy</p>
                </div>
            </div>
            <div class="box">
                <img src="image/img4.jpg" alt="">
                <div class="caption">
                    <h4>product</h4>
                    <p>photograghy</p>
                </div>
            </div>
            <div class="box">
                <img src="image/img5.jpg" alt="">
                <div class="caption">
                    <h4>product</h4>
                    <p>photograghy</p>
                </div>
            </div>
            <div class="box">
                <img src="image/img6.jpg" alt="">
                <div class="caption">
                    <h4>product</h4>
                    <p>photograghy</p>
                </div>
            </div>
            <div class="box">
                <img src="image/img7.jpg" alt="">
                <div class="caption">
                    <h4>product</h4>
                    <p>photograghy</p>
                </div>
            </div>
        </div>
        <a href="#" class="more">
            <p>more</p>
        </a>
    </div>
    <!-- curcal -->
    <div class="row px-1 ">
    <div class="col-md-12 bg-light " >
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/img2s.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="image/col2.jpg" class="d-block w-100 h-80" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="image/wat2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
</div>
<!-- contact &footer -->
<div class="contact" id="Contact">
    <div class="container">
        <h2 class="special_heading">Contact</h2>
        <p> we are born to create</p>
        <div class="contact-content">
            <p class="lable"> Feel free to drop us a line at:</p>
            <a href=" mailto:mharb4064@gmail.com?subject=contact" class="link">mharb4064@gmail.com</a>
            <div class="social">
                Find Us On a Social Network
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-twitter"></i>
            </div>

        </div>
    </div>
</div>

<!-- footer -->
<div class="footer">
    &copy; 2022 <span>shoping</span> All Right Reserved

</div>
    <?php
  // include("includes/footer.php");
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