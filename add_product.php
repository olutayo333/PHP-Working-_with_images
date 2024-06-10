<?php
    require('connection.php');
    
    print_r($_POST);
    echo "</br>";
    print_r($_FILES);

    $product_name= $_POST['product_name'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $sub_category_id=1;

    $file_name = $_FILES['product_image']['name'];
    echo "</br>". $file_name;

    //RENAMING THE FILE
    $new_name = time().$file_name;
    echo"</br>". $new_name;

    //MOVING THE IMAGE FROM TEMPORARY LOCATION TO PERMANENT FOLDER called uploads
    $uploadFile = move_uploaded_file($_FILES['product_image']['tmp_name'], "uploads/".$new_name);

    //SAVING PRODUCT TO THE DATABASE
    $query = "INSERT INTO `table2`(`product_name`, `price`, `quantity`, `image`, `sub_category_id`) VALUES (?,?,?,?,?)";
    $prepareQuery = $connect->prepare($query);
    $bindParam=$prepareQuery->bind_param("ssssi", $product_name, $price, $quantity,  $new_name, $sub_category_id);
    $execute = $prepareQuery->execute();
    
    if($execute){
       // echo"Successful";
       header("location:displayImage.php");
    }
    else{
        echo"Not Successful";
    }
?>