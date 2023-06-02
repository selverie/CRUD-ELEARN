<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['login'];
    $password = $_POST['password'];

    if ($username === 'user' && $password === 'pw') {

        $_SESSION['user'] = $username;

        header('Location: dashboard_user.php');
        exit();
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
    .card {
        margin-top: 20px;
        margin-bottom: 30px;
        width: 450px;
        margin-left: auto;
        margin-right: auto;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        padding: 20px;
        text-align: center;
    }

    .card-body {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        padding: 8px;
        font-size: 14px;
        border-radius: 10px;
    }

    a {
        font-size: 11px;
    }

    h1 {
        font-size: 15px;
    }

    p {
        font-size: 11px;
    }

    .btn {
        padding: 8px 16px;
        font-size: 12px;
        border-radius: 10px;
        transition: background-color 0.3s, border-color 0.3s, color 0.3s;
    }

    .btn-primary:not(.login-button) {
        background-color: #DCDCDC;
        border-color: #DCDCDC;
        color: black;
    }

    .btn-splash:hover {
        background-color: #777777;
        border-color: #777777;
        color: white;
    }
</style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <img src="assets/logo.png" alt="Logo" width="370px">
        </div>
        <div class="card-body">
            <form action="login.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" id="login" name="login" placeholder="Username or Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary login-button">Login</button>
                <?php if (isset($error)): ?>
                    <p class="text-danger"><?php echo $error; ?></p>
                <?php endif; ?>
                <br>
                <a href="lost_password.php">Lost password?</a>
                <hr>
                <h1>Is this your first time here?</h1>
                <p>For full access to this site, you first need to create an account.</p>
                <a href="create_account.php" class="btn btn-primary btn-splash">Create new account</a>
                <hr>
                <h1>Some courses may allow guest access</h1>
                <a href="login_guest.php" class="btn btn-primary btn-splash">Log in as a guest</a>
                <hr>
                <a href="cookies.php" class="btn btn-primary btn-splash">Cookies notice</a>
            </form>
        </div>
    </div>
</body>
</html>
