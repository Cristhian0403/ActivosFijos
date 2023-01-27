<!DOCTYPE html>
<html lang=”es”>

<head>
    <?php
    include('../query/ShowBit.php');


    $actives = json_decode($array, true);

    ?>
    <meta charset=”UTF-8″ />
    <title>Activos Fijos</title>
</head>

<body style="text-align: center;">


    <h2>Bitacora</h2>

    <table class="default" align="Center">

        <tr>

            <th>Fecha</th>

            <th>Tipo</th>

            <th>Serial</th>

            <th>Descripcion</th>

        </tr>

        <?php


        foreach ($actives as $value) {

            echo  '
            <tr>
           
            <td>' . $value['Date'] . '</td>
        
            <td>' . $value['Type'] . '</td>

            <td>' . $value['SerialActive'] . '</td>

            <td>' . $value['Descr'] . '</td>
        
          </tr> 
    ';
        }


        ?>

    </table>
    <a href="../Index.php" type="button">Regresar al inicio</a>




</body>

</html>