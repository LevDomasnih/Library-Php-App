<?php
header("Access-Control-Allow-Origin: *");

$connection = new PDO('mysql:host=localhost;dbname=books', 'root', 'root');
$sql = 'SELECT * FROM book';
$statement = $connection-> prepare($sql);
$statement->execute();

$array = $statement->fetchAll(PDO::FETCH_ASSOC);
print_r(json_encode($array));

