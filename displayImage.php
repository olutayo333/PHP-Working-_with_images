<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div>
            <div>
                <?php
                    require("connection.php");
                    $query = "SELECT * FROM table2";
                    $preparedQuery = $connect->prepare($query);
                    $execute = $preparedQuery->execute();
                    $getProducts = $preparedQuery->get_result(); 
                    //print_r($getProducts);
                    while ($product=$getProducts->fetch_assoc()){
                        //print_r($product);
                        if($product['image']){
                            $url="uploads/".$product['image'];
                        }
                        else{
                            $url = "";
                        }
                        echo "<div>
                            <p> " .$product['product_name'] .$product['price'] .$product['quantity'] . " </p>
                            <img src='$url';
                            ";
                    }
                    
                    //USING PREPARED STATMENTS
        // $prepare = $connect->prepare($checkEmailQuery);
        // $bind = $prepare->bind_param('s', $email);
        // $check=$prepare->execute();
        // $found=$prepare->get_result()->fetch_assoc();
                
                ?>
            </div>
        </div>
    </div>
</body>
</html>