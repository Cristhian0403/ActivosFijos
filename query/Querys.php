<?php

function query()
{
    require 'db.php';

    $sql = "SELECT * FROM actives";
    $stmt = $ccon->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    $array = json_encode($result);
    return $array;
}

function querySerial($serial)
{
    require 'db.php';

    $sql = "SELECT * FROM actives WHERE Serial = '$serial'";
    $stmt = $ccon->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    $array = json_encode($result);
    return $array;
}

function queryId($ID)
{
    require 'db.php';

    $sql = "SELECT * FROM actives WHERE Id_Per = '$ID'";
    $stmt = $ccon->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    $array = json_encode($result);
    return $array;
}
