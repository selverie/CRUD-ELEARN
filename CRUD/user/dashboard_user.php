<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'user') {
    header('Location: login.php');
    exit();
}

include("config_user.php");
include("firebaseRDB_user.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 20px;
        }

        .card {
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>
<body>
    <div class="container">
            <h2>Dashboard User</h2>
            <?php
            $db = new firebaseRDB($databaseURL);
            $data = $db->retrieve("project");
            $data = json_decode($data, 1);

        if (is_array($data)) {
            foreach ($data as $id => $project) {
                echo "<div class='card'>
                    <div class='card-body'>
                        <p>Pertemuan : {$project['pertemuan']}</p>
                        <p>Deskripsi : {$project['deskripsi']}</p>
                        <a href='edit_tugas_user.php?id=$id' class='btn btn-primary'>Kerjakan Tugas</a>
                        <a href='hapus_tugas_user.php?id=$id' class='btn btn-danger'>Tugas Selesai</a>
                    </div>
                </div>";
            }
        }
        ?>
    </div>
</body>
</html>
