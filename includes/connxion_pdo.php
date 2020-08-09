<?php
try {
    $conn = new PDO(
        'mysql:host=localhost; dbname=dbcommerceart; charset=utf8',
        'root',
        '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (PDOException $ex) {
    echo $ex;
}