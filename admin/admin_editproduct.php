<?php
    require_once '../load.php';
    confirm_logged_in();

    $tbl = 'tbl_product';
    $products = getAll($tbl);
    if(!$products){
        $message = 'Failed to get product list';
    }

    if(isset($_GET['id'])){
        $product_id = $_GET['id'];
        $delete_result = deleteProduct($product_id);

        if(!$delete_result){
            $message = 'Failed to delete product';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
</head>
<body>
    <h2>Select Product to update or delete</h2>
    <?php echo !empty($message)?$message:'';?>
    
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php while($product = $products->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td><?php echo $product['product_id'];?></td>
                <td><?php echo $product['product_name'];?></td>
                <td><?php echo $product['product_price'];?></td>
                <!-- redirect to single product page for edit -->
                <td><a href="admin_updateproduct.php?id=<?php echo $product['product_id'];?>">Edit</a></td>
                <td><a href="admin_editproduct.php?id=<?php echo $product['product_id'];?>">Delete</a></td>
            </tr>
        <?php endwhile;?>
        </tbody>
    </table>

    <a href="index.php">Back to dashboard</a>
</body>
</html>