<?php

    include('../includes/connect.php');
    include('../functions/common_functions.php' );
    @session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User_login</title>
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
        .shape{
            width:100%;
            height: 450px;
            background-color:#fff;

        }
        .shape::before{
            position:absolute;
            content:"";
            width:0;
            left:50%;
            transform:translateX(-50%);
            background-color: #c4c4c4;
            border-width: 414px 528px 0px 520px;
            border-style: solid;
            border-color:#24252a #c4c4c4 #fff #0000;
        }
        .footer{
            height:230px;
            background-color: black;
        }

    </style>
</head>
<body>
    <div class="container text-bg-dark p-3 mt-5 ">
        <h2 class="text-center my-3"> User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="GET" enctype="multipart/form-data">
                    <!-- username -->
                    <div class="form-outline mb-4">
                        <label for="user_name" class="form-label">UserName</label>
                        <input type="text" id="user_name" class="form-control " placeholder="USER NAME"
                        autocomplete="off" required="required" name="user_username"/>
                    </div>
                    
                    <!-- password -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control "
                        placeholder="PASSWORD" 
                        required="required" name="user_password"/>
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0 rounded-2" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-2">Don't have an account?<a style="color:#777;"href="user_registration.php"> Register</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="shape">

    </div>
    <div class="footer">

    </div>

    
</body>
</html>
<?php

if (isset($_GET['user_login'])){
    $user_name = $_GET['user_username'];
    $user_password = $_GET['user_password'];
    $ip_address = getIPAddress();



    $select_qurey = "select * from `user_table` where user_name='$user_name' ";
    $result_qurey =  mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'),$select_qurey );
    $rows_count = mysqli_num_rows($result_qurey);
    $row_data = mysqli_fetch_assoc($result_qurey);
    $row_data['user_password'];

    //find number of item that user  has selected before
    $select_qurey_cart = "select * from `cart_details` where ip_address='$ip_address'";
    $result_qurey_cart = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $select_qurey_cart);
    $row_cart = mysqli_num_rows($result_qurey_cart);


    if($rows_count>0){
        // $_SESSION['username'] = $user_name;
        if(password_verify($user_password,$row_data['user_password']) ){
            if ($rows_count==1 and   $row_cart==0 ){
                $_SESSION['username'] = $user_name;
                echo "<script> alert('تم تسجيل الدخول بنجاح ')</script>";
                echo "<script>window.open('profil.php','_self')</script>";
            }else{
                $_SESSION['username'] = $user_name;
                echo "<script> alert('تم تسجيل الدخول بنجاح')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        }else{
        echo "<script> alert('كلمة مرور خاطئة')</script>";
        echo "<script>window.open('../index4.php','_self')</script>";

        }
    }else{
    echo "<script> alert('اسم المستخدم خطاء')</script>";
    echo "<script>window.open('../index4.php','_self')</script>";
    }

}
?>