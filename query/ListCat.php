<?php
require 'db.php';


$sql = "SELECT * FROM category";
$stmt = $ccon->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);

$array = json_encode($result);