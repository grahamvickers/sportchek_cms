<?php 

function getAll($tbl){
    $pdo = Database::getInstance()->getConnection();
    $queryAll = 'SELECT * FROM ' . $tbl;
    $results = $pdo->query($queryAll);

    if ($results) {
        return $results;
    } else {
        return 'There was a problem accessing this info';
    }
}

function getSingleMovie($tbl, $col, $id){
    //TO DO: finish the function based on getALL, this time only return one movies feild

    $pdo = Database::getInstance()->getConnection();
    //$query = 'SELECT * FROM '.$tbl.' WHERE '$col' = '.$id';
    $query = "SELECT * FROM $tbl WHERE $col=$id";
    $results = $pdo->query($query);
    // var_dump($queryAll);exit;

    if($results){
        return $results;
    }else{
        return 'There was a problem accessing the information';
    }

}

function getMoviesByFilter($args){
    $pdo = Database::getInstance()->getConnection();

    $filterQuery = "SELECT * FROM $args[tbl] AS t, $args[tbl2] AS t2, $args[tbl3] AS t3  ";
    $filterQuery .= " WHERE t.$args[col] = t3.$args[col]";
    $filterQuery .= " AND t2.$args[col2] = t3.$args[col2]";
    $filterQuery .= " AND t2.$args[col3] = '$args[filter]'";
    
    
    $results = $pdo->query($filterQuery);
    //var_dump($filterQuery);exit;

    if($results){
        return $results;
    }else{
        return 'There was a problem accessing the information';
    }

}

