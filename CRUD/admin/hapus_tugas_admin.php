<?php
include("config_admin.php");
include("firebaseRDB_admin.php");

$db = new firebaseRDB($databaseURL);
$id = $_GET['id'];
if($id != ""){
    $delete = $db->delete("project", $id);
    echo "data deleted";
}

header("Location: dashboard_admin.php"); 
exit();

