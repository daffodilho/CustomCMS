<?php
function getAll($tbl){
    $pdo = Database::getInstance()->getConnection();

    $queryAll = 'SELECT * FROM '.$tbl;
    $results = $pdo->query($queryAll);

    if($results){
        return $results;
    } else {
        return 'There was a problem accessing this info';
    }
};

function getSingleProduct($tbl, $col, $id){
    // refer the function above to finish this one
    // make sure it returns only one movie that is filtered by $col = $id

    $pdo = Database::getInstance()->getConnection();

    $queryAll = 'SELECT * FROM '.$tbl.' WHERE '.$col.' = '.$id;
    $results = $pdo->query($queryAll);

    if($results){
        return $results;
    } else {
        return 'There was a problem accessing this info';
    }
};

function getProductsByFilter($args){
    $pdo = Database::getInstance()->getConnection();

    $queryAll = 'SELECT * FROM '. $args['tbl'].' AS t,';
    $queryAll .= ' '. $args['tbl2'].' AS t2, ';
    $queryAll .= ' '. $args['tbl3'].' AS t3';
    $queryAll .= ' WHERE t.'. $args['col'].' = t3.'.$args['col'];
    $queryAll .= ' AND t2.'. $args['col2'].' = t3.'.$args['col2'];
    $queryAll .= ' AND t2.'. $args['col3'].' = "'.$args['filter'].'"'; 

    // echo $queryAll;
    // exit;

    $results = $pdo->query($queryAll);

    if($results){
        return $results;
    } else {
        return 'There was a problem accessing this info';
    }
}

function getSingleProductCat($args){
    $pdo = Database::getInstance()->getConnection();

    // $queryAll = 'SELECT p.*, GROUP_CONCAT(c.category_name) as category_name  FROM tbl_product p';
    // $queryAll .= ' LEFT JOIN tbl_product_cat link ON link.product_id = p.product_id';
    // $queryAll .= ' LEFT JOIN tbl_category c ON link.category_id = c.category_id';
    // $queryAll .= ' WHERE p.product_id = 38';

    $queryAll = 'SELECT p.*, GROUP_CONCAT(c.category_name) as category_name  FROM '.$args['tbl'].' p';
    $queryAll .= ' LEFT JOIN '.$args['tbl3'].' link ON link.'.$args['col'].' = p.'.$args['col'];
    $queryAll .= ' LEFT JOIN '.$args['tbl2'].' c ON link.'.$args['col2'].' = c.'.$args['col2'];
    $queryAll .= ' WHERE p.'.$args['col'].' = "'.$args['id'].'"';

    // echo $queryAll;
    // exit;

    $results = $pdo->query($queryAll);

    if($results){
        return $results;
    } else {
        return 'There was a problem accessing this info';
    }
}
?>