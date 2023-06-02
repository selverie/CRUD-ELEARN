<?php
include("config_admin.php");
include("firebaseRDB_admin.php");

$db = new firebaseRDB($databaseURL);
$id = $_GET['id'];
$retrieve = $db->retrieve("project/$id");
$data = json_decode($retrieve, 1);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
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

        h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Tugas</h2>
    <form method="post" action="action_edit.php">
        <div class="form-group row">
            <label for="pertemuan" class="col-sm-2 col-form-label">Pertemuan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pertemuan" name="pertemuan" value="<?php echo $data['pertemuan'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Tugas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $data['deskripsi'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
