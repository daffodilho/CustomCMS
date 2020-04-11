<?php
    include_once 'load.php';

    if(isset($_POST['submit'])){
        $search = trim($_POST['search']);

        $result = getSearchResult($search);
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SportChek Custom CMS</title>
</head>
<body>
    <?php include 'templates/header.php';?>

    <div id="products">
    <?php if(!is_string($result)):?>
        <?php while($row = $result->fetch(PDO::FETCH_ASSOC)):?>
            <a href="details.php?id=<?php echo $row['product_id'];?>">
            <div class="product-box">
                <img src="images/<?php echo $row['product_image'];?>" alt="<?php echo $row['product_name'];?>"/>
                <h2><?php echo $row['product_name']; ?></h2>
                <h4><?php echo $row['product_price']; ?></h4>
            </div>
            </a>
        <?php endwhile;?>
    <?php endif;?>
    </div>
</body>
</html>