<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');

$_POST = json_decode(file_get_contents('php://input'), true);


$data = [
    "genre" => $_POST['genre'],
    "author" => $_POST['author'],
    "naming" => $_POST['naming'],
    "years" => $_POST['years']
];

$connection = new PDO('mysql:host=localhost;dbname=books', 'root', 'root');
$sql = 'INSERT INTO book (genre, author, naming, years) VALUES (:genre, :author, :naming, :years)';
$statement = $connection-> prepare($sql);
$result = $statement->execute($data);


$last_inserted_id=$connection->lastInsertId();

$data2 = [
    "id" => $last_inserted_id,
    "genre" => $_POST['genre'],
    "author" => $_POST['author'],
    "naming" => $_POST['naming'],
    "years" => $_POST['years']
];

$object = new stdClass();
$object->dataBook = $data2;
$object->resultCode = $result;

print_r(json_encode($object));
