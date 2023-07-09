<?php
require 'config.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' ");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header('Location: loginhomepage.php');
            exit();
        } else {
            echo "<script> alert('Invalid Password!'); </script>";
            
        }
    } else {
        echo "<script> alert('Invalid Email!'); </script>";
        
    }
}
?>


<html>
<head>
    <title>Login Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/login.css">
    <link rel="stylesheet" href="CSS/homepage.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>


    
</head>
<body>
    <header>
            <div class="logo">FD Explorer</div>
            <div class="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <nav class="nav-bar">
                <ul>
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="loginpage.php" class="active">Log in</a></li>
                    <li><a href="signup.php">Sign up</a></li>
                </ul>
            </nav>
        </header>
        
        <script>
            hamburger = document.querySelector(".hamburger");
            hamburger.onclick = function() {
                navBar = document.querySelector(".nav-bar");
                navBar.classList.toggle("active");
            }
        </script>
        


    <div class="form">
        <h1>Login</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for "email">Email:</label>
                <input type="email"  name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password"  name="password"  required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Log In" class="button">
            </div>
        </form>
    </div>
        

<div class="footer">
            <p>&copy; <?php echo date("Y"); ?> Food Review Website. All rights reserved.</p>
</div>
</body>
</html>
