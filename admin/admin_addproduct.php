<?php

require_once '../load.php';
confirm_logged_in();

$category_table = 'tbl_category';
$category = getAll($category_table);

if (isset($_POST['submit'])) {
    $product = array(
        'name'        => trim($_POST['name']),
        'price'       => trim($_POST['price']),
        'description' => trim($_POST['description']),
        'image'       => $_FILES['image'],
        'category'    => trim($_POST['catList'])
    );

    if(empty($product['name']) || empty($product['price']) || empty($product['description']) || empty($product['image']) || empty($product['category'])){
        $message = 'Please fill and select ALL fields';    
    }else{
        $result  = addProduct($product);
        $message = $result;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Page</title>
</head>
<body>
    <h2>Add Product</h2>
    <?php echo !empty($message)?$message:'';?>
    
    <form action="admin_addproduct.php" method="post" enctype="multipart/form-data">
        <label>Product Name:</label><br>
        <input type="text" name="name" value=""><br><br>

        <label>Product Price:</label><br>
        <input type="text" name="price" value=""><br><br>

        <label>Product Description:</label><br>
        <input type="text" name="description" value=""><br><br>

        <label>Product Image:</label><br>
        <input type="file" name="image" value=""><br><br>

        <label>Product Category:</label><br>
        <select name="catList">
            <option>Please select category</option>
            <?php while ($row = $category->fetch(PDO::FETCH_ASSOC)): ?>
                <option value="<?php echo $row['category_id']?>"><?php echo $row['category_name']?></option>
            <?php endwhile; ?>
        </select><br><br>

        <button type="submit" name="submit">Add Product</button>
    </form><br>

    <a href="index.php">Back to dashboard</a>
</body>
</html>