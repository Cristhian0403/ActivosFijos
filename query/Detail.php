<?php

include("db.php");

function getArea($cod){

    require 'db.php';
    $sql = "SELECT Name FROM area WHERE Cod = '$cod'";
    $stmt = $ccon->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result[0];
}

function getCat($cod){

    require 'db.php';
    $sql = "SELECT Name FROM category WHERE Cod = '$cod'";
    $stmt = $ccon->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result[0];
}

function getPer($cod){

    require 'db.php';
    $sql = "SELECT Name FROM personal WHERE ID = '$cod'";
    $stmt = $ccon->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result[0];
}

if (isset($_POST['state']) && !empty($_POST['state2'])) {

    $st = $_POST['state2'];
    $code = $_POST['ser'];

    $sql = "SELECT State FROM actives WHERE Serial = '$code'";
    $stmt = $ccon->prepare($sql);

    if ($stmt->execute()) {
        $origin = $stmt->fetch();
        if ($origin[0] != $st) {
            $sql = "UPDATE actives SET State= '$st' WHERE Serial ='$code'";
            $stmt = $ccon->prepare($sql);
            if ($stmt->execute()) {

                $fechaActual = date('Y-m-d H:i:s');
                $msg = $origin[0] . '->' . $st;
                $sql = "INSERT INTO bitacora (Code, SerialActive, Type, Date, Descr) VALUES (NULL,:serial, 'Cambio de estado', :fecha, :msg)";
                $stmt = $ccon->prepare($sql);
                $stmt->bindParam(':serial', $code);
                $stmt->bindParam(':fecha', $fechaActual);
                $stmt->bindParam(':msg', $msg);
                $stmt->execute();
            }
        }
    }
    echo '<script>window.location.replace("../interfaces/List.php");</script>';
} elseif (isset($_POST['idI']) && !empty($_POST['id_Per'])) {
    $st = $_POST['id_Per'];
    $code = $_POST['ser'];

    $sql = "SELECT Id_Per FROM actives WHERE Serial = '$code'";
    $stmt = $ccon->prepare($sql);

    if ($stmt->execute()) {
        $origin = $stmt->fetch();
        if ($origin[0] != $st) {
            $sql = "UPDATE actives SET Id_Per= '$st' WHERE Serial ='$code'";
            $stmt = $ccon->prepare($sql);
            if ($stmt->execute()) {

                $fechaActual = date('Y-m-d H:i:s');
                $msg = $origin[0] . '->' . $st;
                $sql = "INSERT INTO bitacora (Code, SerialActive, Type, Date, Descr) VALUES (NULL,:serial, 'Cambio de encargado', :fecha, :msg)";
                $stmt = $ccon->prepare($sql);
                $stmt->bindParam(':serial', $code);
                $stmt->bindParam(':fecha', $fechaActual);
                $stmt->bindParam(':msg', $msg);
                $stmt->execute();
            }
        }
    }
    echo '<script>window.location.replace("../interfaces/List.php");</script>';
} elseif (isset($_POST['detail'])) {

    $code = $_POST['ser'];

    $sql = "SELECT * FROM actives WHERE Serial = '$code'";
    $stmt = $ccon->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    

?>
    <!DOCTYPE html>
    <html lang=”es”>

    <head>

        <meta charset=”UTF-8″ />
        <title>Detalles</title>
    </head>

    <body style="text-align: center; padding-top: 20px;">
       <img src='<?php echo $result[8]; ?>' border='0' width='200' height='200'><br><br>
       <b><label>Nombre: </label></b><label><?php echo $result[1]; ?></label> <br>
       <b><label>Marca: </label></b><label><?php echo $result[2]; ?></label><br><br>
       <textarea readonly placeholder="<?php echo $result[3]; ?>" id="" cols="30" rows="10"></textarea><br>
       <b><label>Area: </label></b><label><?php echo getArea($result[4]); ?></label><br>
       <b><label>Tipo: </label></b> <label><?php echo $result[6]; ?></label>
       <b><label>Categoria: </label></b><label><?php echo getCat($result[7]); ?></label><br>
       <b><label>Costo: </label></b><label><?php echo $result[5]; ?></label><br>
       <b><label>Encargado: </label></b><label><?php echo getPer($result[9]); ?></label><br>
       <a href="../interfaces/List.php" type="button">Regresar</a>
    </body>
<?php
}
?>