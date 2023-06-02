<?php
include("config_admin.php");
include("firebaseRDB_admin.php");

session_start();

if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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
        <h2>Dashboard Admin</h2>
        <a href="tambah_tugas_admin.php" class="btn btn-primary">Tambah Tugas</a><br><br>
        <?php
        $db = new firebaseRDB($databaseURL);
        $data = $db->retrieve("project");
        $data = json_decode($data, 1);

        if (is_array($data)) {
            foreach ($data as $id => $project) {
                echo "<div class='card'>
                    <div class='card-body'>
                        <p>Pertemuan : {$project['pertemuan']}</p>
                        <p>Deskripsi Tugas : {$project['deskripsi']}</p>
                        <a href='edit_tugas_admin.php?id=$id' class='btn btn-primary'>EDIT TUGAS</a>
                        <a href='hapus_tugas_admin.php?id=$id' class='btn btn-danger'>HAPUS TUGAS</a>
                    </div>
                </div>";
            }
        }
        ?>
    </div>
</body>
</html>
