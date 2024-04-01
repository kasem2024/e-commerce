
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
    <title>User_registration</title>
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


<body>
    
    <div class="container-fluid text-bg-dark p-3">
        <h2 class="text-center my-3"> User Registration Form</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- username -->
                    <div class="form-outline mb-4">
                        <label for="user_name" class="form-label ">UserName</label>
                        <input type="text" id="user_name" class="form-control " placeholder="USER NAME"
                        autocomplete="off" required="required" name="user_username"/>
                    </div>
                    <!-- email -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">UserEmail</label>
                        <input type="email" id="user_email" class="form-control " placeholder="USER EMAIL"
                        autocomplete="off" required="required" name="useremail"/>
                    </div>
                    <!-- image -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">UserImage</label>
                        <input type="file" id="user_image" class="form-control " 
                        required="required" name="user_image"/>
                    </div>
                    <!-- password -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control "
                        placeholder="PASSWORD" 
                        required="required" name="user_password"/>
                    </div>
                    <!-- confirm password -->
                    <div class="form-outline mb-4">
                        <label for="user_confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="user_confirm_password" class="form-control "
                        placeholder="CONFIRM PASSWORD" 
                        required="required" name="user_confirm_password"/>
                    </div>
                    <!-- address -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label"> TheAddress</label>
                        <input type="text" id="user_address" class="form-control " placeholder="USER ADDRESS"
                        autocomplete="off" required="required" name="user_address"/>
                    </div>
                    <!-- contact -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label"> Contact</label>
                        <input type="number" id="user_contact" class="form-control " placeholder="Enter Your Mobile"
                        autocomplete="off" required="required" name="user_contact"/>
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0 rounded-2" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-2">Already have an account?<a style="color:#777" href="user_login.php"> Login</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="footer" style="height:
    300px;background-color:black;">

  

    </div>
</body>
</html>


<?php

if(isset($_POST['user_register'])){
    $user_username = $_POST['user_username'];
    $user_useremail = $_POST['useremail'];
    $user_userimage = $_FILES['user_image']['name'];
    $user_userimage_tmp = $_FILES['user_image']['tmp_name'];
    $user_userpassword = $_POST['user_password'];
    $hash_password = password_hash($user_userpassword,PASSWORD_DEFAULT);
    $user_confirm_password = $_POST['user_confirm_password'];
    $user_useradderss = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $ip_adderss = getIPAddress();
    //select from data base to do some conditiones 
    $select_query = "select * from `user_table` where user_name='$user_username' or user_email='$user_useremail'";
    $result_query = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $select_query);
    $rows_num = mysqli_num_rows($result_query);
    if($rows_num>0){
    echo "<script> alert('username or useremail is already exist')</script>";

    // confirm password 
    }else if($user_userpassword!=$user_confirm_password){
    echo "<script> alert('password not matching') </script>";
    }
    else{
    //insert query 
    move_uploaded_file($user_userimage_tmp, "./user_images/$user_userimage");
    $insert_query = "insert into `user_table` (user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) values
    ('$user_username','$user_useremail','$hash_password','$user_userimage','$ip_adderss','$user_useradderss',$user_contact)";
    $sql_execute = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $insert_query);
    }
    

    // define if you have any item from cart and direct you to checkout page then 
    // direct you to login or payment page else 
    //direct you to the home page to login or buy item from thr shop

    $cart_items = "select * from `cart_details` where ip_address='$ip_adderss' ";
    $result_cart_items = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $cart_items);
    $rows_num = mysqli_num_rows($result_cart_items);
    if($rows_num >0){
        // $_SESSION['username'] = $user_username;
        echo "<script> alert('you selected some product right now continue to login') </script>";
        echo "<script> window.open('checkout.php','_self')</script>";
    }
    else{
       echo "<script> alert('you did't select any product yet') </script>";
        echo "<script> window.open('../index4.php','_self')</script>";
        //  echo "<script> window.open('../index4.php','_self')</script>";
    }



}


?>
