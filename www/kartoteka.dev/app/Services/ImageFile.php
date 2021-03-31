<?php
//Не забывать про права на директорию под изображения
if (isset($_FILES['poster'])) {
$path = 'public/assets/images/'. time() . $_FILES['poster']['name'];
move_uploaded_file($_FILES['poster']['tmp_name'], $path);
}