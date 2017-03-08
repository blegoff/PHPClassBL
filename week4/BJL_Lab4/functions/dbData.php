<?php

function getAllCorpsData(){
    $db = dbconnect();
           
    $stmt = $db->prepare("SELECT * FROM corps");

     $results = array();
     if ($stmt->execute() && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    return $results;
}

function searchCorps($column, $search){
    
}

function dbconnect() {
    $config = array(
        'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=corps',
        'DB_USER' => 'root',
        'DB_PASSWORD' => ''
    );

    try {

        $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (Exception $ex) {

        $db = null;
        $message = $ex->getMessage();
        include './includes/error.php';
        exit();
    }

    return $db;
}

function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}
