<?php 
    require_once '../load.php';
    confirm_logged_in();

    $category_table = 'tbl_category';
    $category = getAll($category_table);

    if (isset($_GET['id'])) {

        $args = array(
            'tbl'=>'tbl_product',
            'tbl2'=>'tbl_category',
            'tbl3'=>'tbl_product_cat',
            'col'=>'product_id',
            'col2'=>'category_id',
            'col3'=>'category_name',
            'id'=>$_GET['id']
        );
        
        $product = getSingleProductCat($args);
    } 

    // somehow does not take in id? also fix taking in image and category without selection
    if(isset($_POST['submit'])){

        $newProduct = array(
            'name'        => trim($_POST['name']),
            'price'       => trim($_POST['price']),
            'description' => trim($_POST['description']),
            'image'       => $_FILES['image'],
            'category'    => trim($_POST['catList']),
            'id'          => trim($_POST['id'])
        );

        // if(empty($newproduct['name']) || empty($newproduct['price']) || empty($newproduct['description']) || empty($newproduct['image']) || empty($newproduct['category']) || empty($newproduct['id'])){
        //     $message = 'Please fill and select ALL fields';    
        // }else{
            $result  = updateProduct($newProduct);
            $message = $result;
        // }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update product</title>
</head>
<body>
    <h2>Please fill and select all fields</h2>
    <?php echo !empty($message)? $message : '';?>

    <form action="admin_updateproduct.php" method="post" enctype="multipart/form-data">
    <?php while($row = $product->fetch(PDO::FETCH_ASSOC)): ?>
        <label>Product Id (read-only):</label><br>
        <input name="id" readonly="readonly" style="color: lightgrey;" value="<?php echo $row['product_id'];?>"><br><br>

        <label>Product Name:</label><br>
        <input type="text" name="name" value="<?php echo $row['product_name'];?>"><br><br>

        <label>Product Price:</label><br>
        <input type="text" name="price" value="<?php echo $row['product_price'];?>"><br><br>

        <label>Product Description:</label><br>
        <input type="text" name="description" value="<?php echo $row['product_description'];?>"><br><br>

        <label>Product Image:</label><br>
        <img src="../images/<?php echo $row['product_image'];?>" alt="current image"><br>
        <input type="file" name="image" value="<?php echo $row['product_image'];?>"><br><br>

        <label>Product Category:</label><br>
        <select name="catList">
            <option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name']?></option>
            <?php while ($cat = $category->fetch(PDO::FETCH_ASSOC)): ?>
                <option value="<?php echo $cat['category_id']?>"><?php echo $cat['category_name']?></option>
            <?php endwhile; ?>
        </select><br><br>
    <?php endwhile; ?>
    <button type="submit" name="submit">Update Product</button>
    
    </form>

    
</body>
</html>