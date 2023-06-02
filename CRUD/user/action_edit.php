<?php
include("config_user.php");
include("firebaseRDB_user.php");

$db = new firebaseRDB($databaseURL);
$id = $_POST['id'];
$update = $db->update("project", $id, [
    "pertemuan" => $_POST['pertemuan'],
    "deskripsi" => $_POST['deskripsi']
]);

header("Location: dashboard_user.php"); 
exit();
?>
