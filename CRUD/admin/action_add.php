<?php
include("config_admin.php");
include("firebaseRDB_admin.php");
$db = new firebaseRDB($databaseURL);

$file = $_FILES['tampilanPage'];
$uploadPath = "uploads/" . $file['name'];
move_uploaded_file($file['tmp_name'], $uploadPath);

$insert = $db->insert("project", [
    "pertemuan" => $_POST['pertemuan'],
    "deskripsi" => $_POST['deskripsi']
]);

header("Location: dashboard_admin.php");
exit();
?>
