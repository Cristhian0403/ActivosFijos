<?php
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $filename = $file['name'];
    $mimetype = $file['type'];

    $allowed_types = array("image/png");

    if (!in_array($mimetype, $allowed_types)) {
?>
        <h3 class="bad">¡Tipo de archivo no permitido! (Solo PNG)</h3>
<?php
        die;
    }

    move_uploaded_file($file['tmp_name'], '../img/' . $filename);
} else {
    echo 'No funciona';
}
