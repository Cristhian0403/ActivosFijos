<?php

include("db.php");



$personal = trim($_POST['personal']);

$sql = "SELECT * FROM personal WHERE ID = '$personal'";
$stmt = $ccon->prepare($sql);
$stmt->execute();
$result = $stmt->rowCount();
if ($result != 0) {
	$name = trim($_POST['name']);
	$mark = trim($_POST['mark']);
	$serial = trim($_POST['serial']);
	$descr = trim($_POST['descr']);
	$area = trim($_POST['area']);
	$cost = trim($_POST['cost']);
	$type = trim($_POST['type']);
	$cat = trim($_POST['cat']);
	$file = $_FILES['file'];
	$filename = '../img/' . $file['name'];
	$mimetype = $file['type'];

	$allowed_types = array("image/png");

	if (!in_array($mimetype, $allowed_types)) {
?>
		<h3 class="bad">¡Tipo de archivo no permitido! (Solo PNG)</h3>
	<?php
		die;
	}


	try {
		$consulta = "INSERT INTO actives(Serial, Name, Mark, Descr, Cod_Area, Cost, Type, Cod_Cat, Photo, Id_Per, State) VALUES ('$serial','$name','$mark','$descr','$area','$cost','$type','$cat','$filename','$personal','Activo')";
		$stmt = $ccon->prepare($consulta);
		$stmt->execute();
	} catch (Exception $e) {
	?>
		<h3 class="bad">¡Ups ha ocurrido un error!</h3>
	<?php
		die;
	}
	include("Upload.php");
	?>
	<h3 class="ok">¡Se ha cargado correctamente!</h3>
<?php

} else {
?>
	<h3 class="bad">¡Encargado no existe en la base de datos!</h3>
<?php
}
