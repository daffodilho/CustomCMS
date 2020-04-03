<?php

function updateProduct($product) {
    // try to update product step by step

    var_dump($product);

    try {
        // get database connection
        $pdo = Database::getInstance()->getConnection();

        // validate uploaded image
        $image          = $product['image'];
        $upload_file    = pathinfo($image['name']);
        $accepted_types = array('gif', 'jpg', 'jpe', 'png', 'jpeg', 'webp');
        if (!in_array($upload_file['extension'], $accepted_types)) {
            throw new Exception('Invalid file type!');
        }
    
        // move to images file
        $image_path = '../images/';
        
        // hash image filename
        $generated_name     = md5($upload_file['filename'] . time());
        $generated_filename = $generated_name . '.' . $upload_file['extension'];
        $targetpath         = $image_path . $generated_filename;
    
        if (!move_uploaded_file($image['tmp_name'], $targetpath)) {
            throw new Exception('Failed to move upload file, check permission!');
        }
    
        // Update tbl_product and tbl_category
        $update_product_query = 'UPDATE tbl_product SET product_name = :product_name, product_price = :product_price,';
        $update_product_query .= ' product_description=:product_description, product_image =:product_image WHERE product_id = :product_id';
        $update_product_set = $pdo->prepare($update_product_query);
        $update_product_result = $update_product_set->execute(
            array(
                ':product_name'=>$product['name'],
                ':product_price'=>$product['price'],
                ':product_description'=>$product['description'],
                ':product_image'=>$generated_filename,
                ':product_id'=>$product['id']
            )
        );
    
        $last_uploaded_id = $pdo->lastInsertId();
        if ($update_product_result && !empty($last_uploaded_id)) {
            $update_linked_query  = 'UPDATE tbl_product_cat SET category_id = :category_id, ';
            $update_linked_query .= 'WHERE product_id = :product_id';
            $update_linked        = $pdo->prepare($update_linked_query);
    
            $update_linked_result = $update_linked->execute(
                array(
                    ':product_id' => $last_uploaded_id,
                    ':category_id'=> $product['category'],
                )
            );
        }    
    
        if($update_product_result){
            redirect_to('index.php');
        }else{
            return 'Update unsuccessful!';
        }
    } catch (Exception $e) {
        // Otherwise, return some error message
        $error = $e->getMessage();
        return $error;
    }
}

function deleteProduct($id){
    $pdo = Database::getInstance()->getConnection();

    $delete_product_query = 'DELETE FROM tbl_product WHERE product_id = :id';
    $delete_product_set = $pdo->prepare($delete_product_query);
    $delete_product_result = $delete_product_set->execute(
        array(
            ':id'=>$id
        )
    );

    $delete_linking_query = 'DELETE FROM tbl_product_cat WHERE product_id = :id';
    $delete_linking_set = $pdo->prepare($delete_linking_query);
    $delete_linking_result = $delete_linking_set->execute(
        array(
            ':id'=>$id
        )
    );

    //If everything went through, redirect to admin_deleteuser.php
    //Otherwise, return false
    if($delete_product_result && $delete_product_set->rowCount() > 0 
    && $delete_linking_result && $delete_linking_set->rowCount() > 0){
        redirect_to('admin_editproduct.php');
    }else{
        return false;
    }
}