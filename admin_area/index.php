<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin Dashboard </title>
      <!-- Boatstrap css link -->
      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
      <!-- fontasome -->
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
      <!-- css -->
      <!-- bootstrap css internal -->
      <link rel="stylesheet" href="../css_style/bootstrap.min.css">
      <link rel="stylesheet" href="../css_style/all.min.css">
      <link rel="stylesheet" href="../css_style/style.css">

      <!-- font from google -->
      <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Public+Sans:wght@300;400&family=Roboto:wght@300;500;900&family=Work+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"> -->

      <style>
            .conts{
            height: 100vh;
            }
            .admin-image{
            width: 70px;
            object-fit: contain;
            height: 70px;
            }
            .footer{
            position: absolute;
            bottom:0 ;
            }
            .logo{
            width: 4%;
            height: 4%;
            }
            .shadow{
            box-shadow: 0 .5rem 1rem rgba(2,2,2,15)!important;
            border-radius: 6px;
            }
            .navbar{
            background-color:#6F2D91 ;    
            }
            .button{
            
            width: 50%;
            height: 100%;
            position: relative;
            left: 100px;
            
            }
            .shadow2{
                  box-shadow: 0px 8px 5px #939393;
                  border-radius: 6px;
            }
            .button button{
                  background-color: #6F2D91;
                  box-shadow: 0px 8px 5px #939393;

                  border-top-left-radius: 10px;
                  border-bottom-right-radius: 10px;
                  border-color: #6F2D91;
                  border-style: solid;
            }
            /* vedio */
            .video{
position: relative;
}

.video::before{
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background-color: rgb(0, 0, 0, 40%);

}
.video video {
    width: 100%;

}
.video .text{ 
    position: absolute;
    top: 50%; 
    transform:translateY(-50%);
    -webkit-transform:translateY(-50%);
    -moz-transform:translateY(-50%);
    -ms-transform:translateY(-50%);
    -o-transform:translateY(-50%);
    background-color: #607d8b;
    width:100%;
    text-align: center;
    padding: 20px;

}
.video .text h2{
text-transform: uppercase;
font-weight: normal;
color: white;
margin-bottom: 15px;

}
.video .text p{
    margin-bottom: 10px;

}
.video .text button {
    background-color: #333;
    color: white;
    padding: 10px 30px;
    border: none;
    cursor: pointer;
    text-transform: uppercase;
    

}

            
      </style>
</head>
<body>
<!-- navbar -->
<div class =  "container-fluid p-2 ">
 


<!-- frist child -->
      <div class="shadow2">
            <nav class="navbar navbar-expand-lg navbar-light  p-0 "  >
                  <div class=" container-fluid ">        
                  <span> <i class="fa-brands fa-nfc-symbol"></i></span>
                        <nav class="navbar navbar-expand-lg" > 
                              <ul class="navbar-nav " >
                                    <li class=" nav-item" >
                                          <a href="" class="nav-link text-light font-weight-bold">Dashboard</a> 
                                    </li>
                              </ul>
                        </nav>
                  </div>
            </nav>
      </div>
      <!-- second child -->
            <div class="shadow">
                  <div class="bg-dark rounded-lg">
                  <h3 class="text-center p-1 text-light">Manage Details</h3>
                  </div>
            </div>
      <!-- third child -->
      <div class="row" >
            <div class="col-md-12  p-1 d-flex align-items-center my-1">
                  <div class="px-2">
                        <img src="../image/admin.png" alt="admin image" class="admin-image" >
                        <p clss="text-light text-center"> Admin Name</p>
                  </div>
                  <div class="button text-center">
                        <button class="my-2"><a href="insert_products.php " class="nav-link text-light font-weight-bold my-1">Insert Products</a></button>
                        <button><a href="" class="nav-link text-light font-weight-bold my-1">View Products</a></button>
                        <button><a href="index.php?insert_category" class="nav-link text-light font-weight-bold my-1">Insert Categories</a></button>
                        <button><a href="" class="nav-link text-light font-weight-bold my-1">View Categories</a></button>
                        <button><a href="index.php?insert_brands" class="nav-link text-light font-weight-bold my-1">Insert Brands</a></button>
                        <button><a href="" class="nav-link text-light font-weight-bold my-1">View Brands</a></button>
                        <button class="my-2"><a href="" class="nav-link text-light font-weight-bold my-1">All Orders</a></button>
                        <button><a href="" class="nav-link text-light font-weight-bold my-1">All Orders</a></button>
                        <button><a href="" class="nav-link text-light font-weight-bold my-1">List Users</a></button>
                        <button><a href="" class="nav-link text-light font-weight-bold my-1">Logout</a></button>
                  </div>
            </div>
            
      </div>
      <!-- included pages child -->
      <div class="conts">
      <div class="container my-3">
            <?php
            if(isset($_GET['insert_category'])){
                  include('insert_categories2.php');
            }
            if(isset($_GET['insert_brands'])){
                  include( 'insert_brands.php');
            }
            ?>
      </div>
       <!-- vedio -->
            <div class="video">
                  <video muted autoplay loop>
                        <source src="../image/companyvd.mp4" type="video/mp4">
                  </video>
                  <div class="text">
                        <h2>product is ready</h2>
                        <p>its all you need</p>
                        <button> see more</button>
                  </div>
            </div>
      </div>

      

</div>

      <!-- bootstrap js link external -->
      <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
      <!-- js js internal -->
      <!-- fontasome.js -->
      <script src="../js/all.min.js"></script>
      <!-- bootstrap .js -->
      <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>