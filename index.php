<?php
    require_once 'load.php';
    
    if(isset($_GET['filter'])){
        $args = array(
            'tbl'=>'tbl_product',
            'tbl2'=>'tbl_category',
            'tbl3'=>'tbl_product_cat',
            'col'=>'product_id',
            'col2'=>'category_id',
            'col3'=>'category_name',
            'filter'=>$_GET['filter']
        );

        $getProducts = getProductsByFilter($args);
    }else{
        $products_table = 'tbl_product';
        $getProducts = getAll($products_table);
    }

    // var_dump($getProducts);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SportChek Custom CMS</title>
</head>
<body>
    <?php include 'templates/header.php';?>

    <div id="products">
    <?php while($row = $getProducts->fetch(PDO::FETCH_ASSOC)):?>
        <a href="details.php?id=<?php echo $row['product_id'];?>">
        <div class="product-box">
            <img src="images/<?php echo $row['product_image'];?>" alt="<?php echo $row['product_name'];?>"/>
            <h2><?php echo $row['product_name']; ?></h2>
            <h4><?php echo $row['product_price']; ?></h4>
        </div>
        </a>
    <?php endwhile;?>
    </div>
</body>
</html>