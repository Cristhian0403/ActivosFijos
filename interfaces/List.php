<!DOCTYPE html>
<html lang=”es”>

<head>
    <?php
    include('../query/Querys.php');


    $actives = json_decode(query(), true);

    if (isset($_POST['clean'])) {
        $actives = json_decode(query(), true);
    } else if (isset($_POST['serial'])) {
        $actives = json_decode(querySerial($_POST['value']), true);
    } else if (isset($_POST['id'])) {
        $actives = json_decode(queryId($_POST['value']), true);
    }

    ?>
    <meta charset=”UTF-8″ />
    <title>Activos Fijos</title>
</head>

<body style="text-align: center;">


    <h2>Consultas</h2>

    <form method="POST" style="margin-bottom: 10px;">
        <label for="value">Valor:</label>
        <input type="text" id="value" name="value" style="margin-bottom: 10px;">


        <input type="submit" class="btn btn-primary" name="serial" value="Serial" />
        <input type="submit" class="btn btn-primary" name="id" value="ID encargado" />
        <input type="submit" class="btn btn-primary" name="clean" value="Borrar" />


    </form>




    <table class="default" align="Center">

        <tr>

            <th>Serial</th>

            <th>Nombre</th>

            <th>Estado</th>

            <th>Encargado</th>

            <th>Detalle</th>

            <th>Actualizar</th>

        </tr>

        <?php


        foreach ($actives as $value) {
            $opcion ='';
            if($value['State'] == 'Inactivo'){
                $opcion = 'selected';
            }

            echo  '
            <tr>

            <form name="help" action="../query/Detail.php" method="POST" style="margin-bottom: 10px;">
            
            <td> <input type="text" readonly id="ser" value="' . $value['Serial'] . '" name="ser""></td>
        
            <td> <input type="text" readonly id="name" value="' . $value['Name'] . '" name="name""></td>
            
            <td><select name="state2" id="state2" style="margin-bottom: 10px;">

            <option value="Activo" >Activo</option>
            <option value="Inactivo" '. $opcion. '>Inactivo</option>
            
        
            </select></td>
            <td> <input type="text" id="id_Per" value="' . $value['Id_Per'] . '" name="id_Per""></td>

            <td><input type="submit" class="btn btn-primary" name="detail" value="Detalle" /></td>
            <td><input type="submit" class="btn btn-primary" name="state" value="Estado" />
            <input type="submit" class="btn btn-primary" name="idI" value="Encargado" /></td>
        
        
          </tr> 
    
    
        </form>';
        }


        ?>

    </table>
    <a href="../Index.php" type="button">Regresar al inicio</a>




</body>

</html>