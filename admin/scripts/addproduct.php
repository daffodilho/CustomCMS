<?php

function addProduct($product)
{
    // var_dump($product);

    try {
        // 1. Connect to the DB
        $pdo = Database::getInstance()->getConnection();

        // 2. Validate the uploaded file
        $image          = $product['image'];
        $upload_file    = pathinfo($image['name']);
        $accepted_types = array('gif', 'jpg', 'jpe', 'png', 'jpeg', 'webp');
        if (!in_array($upload_file['extension'], $accepted_types)) {
            throw new Exception('Invalid file type!');
        }

        // 3. Move the uploaded file around (move the file from tmp path to the /images)
        $image_path = '../images/';

        // //Optional 10 ~ 20 mins
        // // Randomlize/hash the file name before move it over!
        $generated_name     = md5($upload_file['filename'] . time());
        $generated_filename = $generated_name . '.' . $upload_file['extension'];
        $targetpath         = $image_path . $generated_filename;

        if (!move_uploaded_file($image['tmp_name'], $targetpath)) {
            throw new Exception('Failed to move upload file, check permission!');
        }

        // *** Optional *** 1hr ~ couple hours
        // If the upload file is a image, convert it to WebP

        // 4. Insert into DB (tbl_movies as well as tbl_mov_genre)
        $insert_product_query = 'INSERT INTO tbl_product(product_name,product_price,product_description,product_image)';
        $insert_product_query .= ' VALUES(:product_name,:product_price,:product_description,:product_image)';

        $insert_product        = $pdo->prepare($insert_product_query);
        $insert_product_result = $insert_product->execute(
            array(
                ':product_name'       => $product['name'],
                ':product_price'      => $product['price'],
                ':product_description'=> $product['description'],
                ':product_image'      => $generated_filename,
            )
        );

        $last_uploaded_id = $pdo->lastInsertId();
        if ($insert_product_result && !empty($last_uploaded_id)) {
            $update_product_query = 'INSERT INTO tbl_product_cat(product_id, category_id) VALUES(:product_id, :category_id)';
            $update_product     = $pdo->prepare($update_product_query);

            $update_product_result = $update_product->execute(
                array(
                    ':product_id' => $last_uploaded_id,
                    ':category_id'=> $product['category'],
                )
            );
        }

        // 5. If all of above works, redirect user to index.php
        redirect_to('index.php');
    } catch (Exception $e) {
        // Otherwise, return some error message
        $error = $e->getMessage();
        return $error;
    }
}

