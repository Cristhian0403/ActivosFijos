<?php
include 'db.php';

$sql = "SELECT * FROM bitacora ORDER BY Date DESC";
$stmt = $ccon->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);

$array = json_encode($result);
return $array;
