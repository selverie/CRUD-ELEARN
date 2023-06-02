<?php
include("config_user.php");
include("firebaseRDB_user.php");

$db = new firebaseRDB($databaseURL);
$id = $_GET['id'];
if($id != ""){
    $delete = $db->delete("project", $id);
    echo "data deleted";
}

header("Location: dashboard_user.php"); 
exit();

