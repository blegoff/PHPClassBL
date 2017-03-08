<?php

function getDatabase() {
    $config = array(
        'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=actors',
        'DB_USER' => 'root',
        'DB_PASSWORD' => ''
    );

    try {
        $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (Exception $ex) {

        $db = null;
    }

    return $db;
}
