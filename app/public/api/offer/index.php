<?php
// require 'common.php';
require 'class/DbConnection.php';


// Step 1: Get a datase connection from our helper class
$db = DbConnection::getConnection();



// Step 2: Create & run the query ONLY LINE YOU HAVE TO CHANGE TO MAKE A NEW API (COPY PASTE FILE AND RENAME THE GREEN LETTERS UNDERNEATH)
$sql = 'SELECT * FROM book';
$vars = [];

//if (isset($_GET['student'])) {
//   // This is an example of a parameterized query
//  $sql = 'SELECT * FROM offer WHERE studentId = ?';
//   $vars = [ $_GET['student'] ];
// }

$stmt = $db->prepare($sql);
$stmt->execute($vars);

$books = $stmt->fetchAll();

// Step 3: Convert to JSON
$json = json_encode($books, JSON_PRETTY_PRINT);

// Step 4: Output
header('Content-Type: application/json');
echo $json;