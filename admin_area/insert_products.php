<?php

if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keyword = $_POST['product_keyword'];
    $product_category = $_POST['category_selected'];
    $product_brand = $_POST['brand_selected'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // accessing images 
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    // accessing tmp images
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];
    // cheching empty condition
    if (
        $product_title == "" or $product_description == "" or  $product_keyword == "" or
        $product_category == "" or $product_brand == "" or $product_price == "" or $product_image1 == "" or $product_image2 == "" or $product_image3 == ""
    ) {
        "<script>alert( 'please fill all the available fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");
        //insert query
        $insert_products = "INSERT INTO `products` (`product_title`, `product_description`,
    `product_keyword`, `category_id`,
    brand_id, product_imge1, product_imge2,
    `product_imge3`, `product_price`,date,status)
    VALUES ('$product_title',
    '$product_description','$product_keyword','$product_category',
    '$product_brand','$product_image1','$product_image2',
    '$product_image3','$product_price',NOW(),'$product_status')";

        $result = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $insert_products);
        if ($result) {
            echo  "<script>alert('successfully inserted the product')</script>";
        } else {
            echo "<script>alert('failed inserted the product')</script>";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert products-Admin Dashboard</title>
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

</head>

<body class="bg-dark">
    <div class="container mt-3 w-50 m-auto">
        <h1 class="text-center text-info"> Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4">
                <label for="product_title" class="form-label text-info">Product
                    Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control " placeholder=" Enter product title" autocomplete="off" required="required">
            </div>
            <!-- description -->
            <div class="form-outline mb-4">
                <label for="description" class="form-label text-info">Product
                    Description</label>
                <input type="text" name="product_description" id="description" class="form-control" placeholder=" Enter product description" autocomplete="off" required="required">
            </div>
            <!-- product key -->
            <div class="form-outline mb-4">
                <label for="keyword" class="form-label text-info">Product
                    Keyword</label>
                <input type="text" name="product_keyword" id="keyword" class="form-control" placeholder=" Enter product keyword" autocomplete="off" required="required">
            </div>
            <!-- select categories 0-->
            <div class="input-group p-2 mb-3">
                <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="category_selected">
                    <option selected>Select Category...</option>
                    <?php
                    $select_query = "select * from `categories` ";
                    $result_query = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-warning text-success " type="button">Select</button>
                </div>
            </div>
            <!-- select brands 0-->
            <div class="input-group p-2 mb-3">
                <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="brand_selected">
                    <option selected>Select Brand...</option>
                    <?php
                    $select_queries = "select * from `brands` ";
                    $result_queries = mysqli_query(mysqli_connect('localhost', 'root', '', 'mystore'), $select_queries);
                    while ($row = mysqli_fetch_assoc($result_queries)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-warning text-success" type="button">Select</button>
                </div>
            </div>

            <!-- product_imge -->

            <div class="form-outline mb-4">
                <label for="image1" class="form-label text-info">Product
                    Image 1</label>
                <input type="file" name="product_image1" id="image1" class="form-control btn btn-outline-warning text-success bg-dark " required="required">
            </div>

            <div class="form-outline mb-4">
                <label for="image2" class="form-label text-info">Product
                    Image 2</label>
                <input type="file" name="product_image2" id="image2" class="form-control btn btn-outline-warning text-success bg-dark ">
            </div>

            <div class="form-outline mb-4">
                <label for="image3" class="form-label text-info">Product
                    Image 3</label>
                <input type="file" name="product_image3" id="image3" class="form-control btn btn-outline-warning text-success bg-dark ">
            </div>

            <!-- price -->
            <div class="form-outline mb-4">
                <label for="price" class="form-label text-info">Product
                    Price</label>
                <input type="number" name="product_price" id="price" class="form-control" placeholder=" Enter product price" autocomplete="off" required="required">
            </div>
            <!-- botton -->
            <div class="form-outline mb-4 ">
                <input type="submit" name="insert_product" class="btn btn-outline-warning text-success mb-3 px-3" value="Insert Product">
            </div>
        </form>
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