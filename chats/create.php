<!DOCTYPE html>

<?php
include('connexion.php');
$message = '';
if (isset($_POST['create'])) {
    $query = 'INSERT INTO tb_login (username, user_password) VALUES (:username, :user_password)';
    $statement = $conn->prepare($query);

    if ($statement->execute(array(':username' => $_POST['username'], ':user_password' => $_POST['password']))) {
        $message = 'Bien enregistrer';
    } else {
        $message = 'Echec';
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font/css/all.css">
    <title>Create Account</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <p class="text-danger"> <?php echo $message; ?> </p>
            <div class="col-md-5">
                <form action="create.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="username" id="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="text" name="password" id="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="create" class="btn btn-info">Enregistrer</button>
                        <a href="login.php" class="btn btn-success">Login</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>