<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Mess Management</title>
    <link rel="stylesheet" href="css/homestyle.css">
</head>
<body>
    <div class="header">
        <h1>Admin Login</h1>
    </div>

    <div class="container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Enter Username"><br><br>
                <input type="password" name="password" placeholder="Enter Password"><br><br>
                <input type="submit" name="submit" value="Login" class="btn-secondary">
            </form>
        </div>
    </div>

    <?php include('partials/footer.php'); ?>
</body>
</html>

<?php
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM admlogin WHERE username='$username' AND password='$password'";
    $res = mysqli_query($connection, $sql);

    $count = mysqli_num_rows($res);

    if($count == 1) {
        
        header('location:'.SITEURL.'dashboard.php/');
    } else {
        header('location:'.SITEURL.'dashboard.php/');
    }
}
?>
