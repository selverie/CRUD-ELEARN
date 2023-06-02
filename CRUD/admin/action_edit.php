<?php
include("config_admin.php");
include("firebaseRDB_admin.php");

$db = new firebaseRDB($databaseURL);
$id = $_POST['id'];
$update = $db->update("project", $id, [
    "pertemuan" => $_POST['pertemuan'],
    "deskripsi" => $_POST['deskripsi']
]);

header("Location: dashboard_admin.php"); 
exit();
?>
