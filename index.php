<?php include('partials/headerind.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIITDM Kancheepuram Mess Management Software</title>
    <link rel="stylesheet" href="css/homestyle.css">
</head>
<body>
    <div class="header">
        <h1>IIITDM Kancheepuram Mess Management Software</h1>
    </div>

    <div class="container">
        <div class="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </div>

        <div class="login-options">
            <div class="login-box">
                <h2>Admin Login</h2>
                <a href="admin-login.php">Login as Admin</a>
            </div>
            <div class="login-box">
                <h2>Student Login</h2>
                <a href="student-login.php">Login as Student</a>
            </div>
        </div>
    </div>

    <?php include('partials/footer.php'); ?>
</body>
</html>
