<!DOCTYPE html>

<?php
include('connexion.php');
session_start();
$message = '';

if (isset($_SESSION['user_id'])) {
    header('location:index.php');
}

if (isset($_POST['login'])) {
    $query = "SELECT * FROM tb_login WHERE username=:username";
    $statement = $conn->prepare($query);
    $statement->execute(array(':username' => $_POST['username']));
    $count = $statement->rowCount();
    if ($count > 0) {
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            if ($_POST['password'] == $row['user_password']) {
                $_SESSION['user_id'] = $row['user_idd'];
                $_SESSION['user_name'] = $row['username'];
                $subquery = "INSERT INTO tb_login_details (ref_user) VALUES ('" . $row['user_idd'] . "')";
                $statement = $conn->prepare($subquery);
                $statement->execute();
                $_SESSION['login_detail_id'] = $conn->lastInsertId();
                header('location:index.php');
            } else {
                $message = '<label>Wrong password</label>';
            }
        }
    } else {
        $message = "<label>Wrong Username</label>";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font/css/all.css">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Login Here</h1>
            <p class="text-danger"> <?php echo $message; ?> </p>
            <form action="#" method="POST" class="col-md-5">
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info" name="login">Connexion <i
                                class="fa fa-"></i></button>
                        <a href="create.php" class="btn btn-warning">Create Account</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script src="bootstrap/js/jquery-2.2.4.min.js"></script>


</body>

</html>