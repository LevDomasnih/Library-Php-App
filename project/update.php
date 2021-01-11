<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');

$_POST = json_decode(file_get_contents('php://input'), true);

$data = [
    "id" => $_POST['id'],
    "genre" => $_POST['genre'],
    "author" => $_POST['author'],
    "naming" => $_POST['naming'],
    "years" => $_POST['years']
];

$connection = new PDO('mysql:host=localhost;dbname=books', 'root', 'root');
$sql = 'UPDATE book SET `genre` = :genre, `author` = :author, `naming` = :naming, `years` = :years WHERE `id` = :id ';
$statement = $connection-> prepare($sql);
$result = $statement->execute($data);

var_dump($result);