<?php
    require_once 'load.php';
    
    if(isset($_GET['id'])){
        $product_table = 'tbl_product';
        $col = 'product_id';
        $id = $_GET['id'];

        $getProducts = getSingleProduct($product_table, $col, $id);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Single Product</title>
</head>
<body>
    <?php while($row = $getProducts->fetch(PDO::FETCH_ASSOC)):?>
        <div class="product-detail">
            <img src="images/<?php echo $row['product_image'];?>" alt="<?php echo $row['product_name'];?>"/>
            <h2><?php echo $row['product_name']; ?></h2>
            <h4><?php echo $row['product_price']; ?></h4>
            <p><?php echo $row['product_description']; ?></p>
            <a href="index.php">Back..</a>
        </div>
    <?php endwhile;?>
</body>
</html>