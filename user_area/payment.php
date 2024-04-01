
<?php
    include('../includes/connect.php');
    include('../functions/common_functions.php' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
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
        /* .cover{
            width: 90%;
            overflow: hidden;
        }
        a{
            text-decoration: none;
            transition:  transform 1.5s;
        }
        a :hover{
            transform:  scale(1.2) rotate(5deg);
            opacity: 0.7;
            
        }
        img{
        width: 100%; 
        } */
    </style>
</head>
<body>
<?php
    $ip = getIPAddress();
    $get_user = "select * from `user_table` where user_ip='$ip' ";
    $result_user= mysqli_query(mysqli_connect('localhost','root','','mystore'),$get_user);
    $get_user_id= mysqli_fetch_array(result: $result_user);
    $user_id = $get_user_id['user_id'];
    ?>
    <div class="container">
    <h2 class="text-center text-info">payment options</h2>
    <div class="d-flex justify-content-center align-items-center my-5 ">
        <div class="col-md-6">
            <div class="cover"><a href="https://www.paypal.com" target="_blank"> <img src="../image/paypal.webp" alt="paypal onlin "></a></div>
        </div>
        <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id ?>">
                <h2 class="text-center"> pay offline </h2>
            </a>
        </div>
    </div>
</div>

</body>
</html>