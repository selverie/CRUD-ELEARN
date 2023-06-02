<?php
include("config_user.php");
include("firebaseRDB_user.php");

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
    <title>Upload</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <h2>Upload Tugas</h2>
    <form method="post" action="action_edit.php">
        <div class="form-group row">
            <label for="pertemuan" class="col-sm-2 col-form-label">Pertemuan </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pertemuan" name="pertemuan" value="<?php echo $data['pertemuan'] ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Tugas </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $data['deskripsi'] ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <div id="progressContainer">
                <div id="uploadProgress" class="progress">
                    <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                </div>
            </div>
            <br>
            <label for="tugas">Upload Tugas :</label>
            <input type="file" value="upload" id="uploadButton">
            <script src="https://www.gstatic.com/firebasejs/8.5.0/firebase.js"></script>
            <script src="script.js"></script>
            <script>

                var config = {
                    apiKey: "AIzaSyB0C_SICB0uGlPc2K6SFk3cVIRQ_YhXWTw",
                    authDomain: "elearn-5fc1d.firebaseapp.com",
                    databaseURL: "https://elearn-5fc1d-default-rtdb.asia-southeast1.firebasedatabase.app",
                    projectId: "elearn-5fc1d",
                    storageBucket: "elearn-5fc1d.appspot.com",
                    messagingSenderId: "391081724873",
                    appId: "1:391081724873:web:7b78f6dc3844c9dbd13618",
                    measurementId: "G-BKGNN8SMN4"
                };

                firebase.initializeApp(config);
                var storage = firebase.storage();

                var fileInput = document.getElementById('uploadButton');
                var progressBar = document.getElementById('progressBar');

                fileInput.addEventListener('change', function(event) {
                    var file = event.target.files[0];
                    var storageRef = firebase.storage().ref();
                    var uploadTask = storageRef.child('files/' + file.name).put(file);

                    uploadTask.on('state_changed', function(snapshot) {
                        var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                        progressBar.style.width = progress + '%';
                        progressBar.innerHTML = progress + '%';
                    }, function(error) {
                        console.log(error);
                    }, function() {
                        uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
                            console.log('File available at', downloadURL);
                            progressBar.innerHTML = 'Tugas Terkirim';
                        });
                    });
                });
            </script>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-15 text-left">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>


