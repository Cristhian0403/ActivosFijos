<!DOCTYPE html>
<html lang=”es”>

<head>
    <meta charset=”UTF-8″ />
    <title>Activos Fijos</title>
</head>

<body style="text-align: center;">
    <h2>Nuevo Activo</h2>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" style="margin-bottom: 10px;"><br>
        <label for="mark">Marca:</label>
        <input type="text" id="mark" name="mark" style="margin-bottom: 10px;"><br>
        <label for="serial">Serial:</label>
        <input type="text" id="serial" name="serial" style="margin-bottom: 10px;"><br>
        <label for="descr">Descripcion:</label>
        <textarea id="descr" name="descr" style="margin-bottom: 10px;" placeholder="Escribe una descripcion de menos de 100 caracteres" cols="40" rows="5"></textarea><br>
        <label for="area">Area:</label>
        <select name="area" id="area" style="margin-bottom: 10px;">
            <?php
            include('../query/ListArea.php');

            $areas = json_decode($array, true);

            foreach ($areas as $value) {
                echo '<option value="' . $value['Cod'] . '">' . $value['Name'] . '</option>';
            }
            ?>
        </select>
        <br>
        <label for="cost">Costo:</label>
        <input type="text" id="cost" name="cost" style="margin-bottom: 10px;"><br>
        <label for="type">Tipo:</label>
        <select name="type" id="type" style="margin-bottom: 10px;">
            <option value="Tangible">Tangible</option>
            <option value="Intangible">Intangible</option>

        </select><br>
        <label for="cat">Categoria:</label>
        <select name="cat" id="cat" style="margin-bottom: 10px;">
            <?php
            include('../query/ListCat.php');

            $categorys = json_decode($array, true);

            foreach ($categorys as $value) {
                echo '<option value="' . $value['Cod'] . '">' . $value['Name'] . '</option>';
            }
            ?>
        </select><br>
        <label for="photo">Foto:</label>
        <input type="file" id="photo" name="file" style="margin-bottom: 10px;"><br>
        <label for="personal">Encargado:</label>
        <input type="text" id="personal" placeholder="Digita su documento" name="personal" style="margin-bottom: 10px;"><br>
        <button type="submit" name="upload">Guardar</button><br>
        <a href="../Index.php" type="button">Regresar al inicio</a>

    </form>

    <?php

    if (isset($_POST['upload'])) {
        if (strlen($_POST['name']) >= 1 && strlen($_POST['mark']) >= 1 ) {
            include("../query/RegisterDb.php");
        } else {
    ?>
            <h3 class="bad">¡Por favor complete los campos!</h3>
    <?php
        }
    }




    ?>
</body>

</html>