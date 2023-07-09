
<!DOCTYPE html>
<html>
<head>
    <title>Register Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/register.css">
    <link rel="stylesheet" href="CSS/homepage.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/8bbe2c347b.js" crossorigin="anonymous"></script>

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
                    <li><a href="loginpage.php">Log in</a></li>
                    <li><a href="signup.php" class="active">Sign up</a></li>
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
        <h1>Register Page</h1>
        <form action="handle_signup.php" method="post">
            <div class="form-group">
                <label >Email:</label>
                <input type="email"  name="email" id="email" required>
            </div>
            <div class="form-group">
                <label >Password:</label>
                <input type="password"  name="password" id="password" required>
            </div>
            <div class="form-group">
                <label >Confirm Password:</label>
                <input type="password"  name="confirmpassword" id="confirmpassword" required>
            </div>
            <div class="form-group">
                <label>Username:</label>
                <input type="text"  name="username" id="username" required>
            </div>
            <div class="form-group">
                <label>Phone Number:</label>
                <input type="tel"  name="telno" id="telno" required>
            </div>
            <div class="form-group">
                <input type="submit" class="button" name="submit" value="Register">
            </div>
        </form>
        
        
        <script>
                document.querySelector('.button').onclick = function () {
                    var email = document.getElementById('email').value;
                    var password = document.getElementById('password').value,
                    confirmPassword = document.getElementById('confirmpassword').value;
                    var telno = document.getElementById('telno').value;
                    
                     var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!email.match(emailRegex)) {
                        alert("Invalid email format. Please enter a valid email address.");
                        return false;
                    }
                    if (password.length < 8) {
                        alert("Invalid password. Password must be at least 8 characters long.");
                        return false;
                    }
                    if (password !== confirmPassword) {
                        alert("Password not matched, try again");
                        return false;
                    }
                    if (!telno.match(/^0\d{9}$/)) {
                    alert("Invalid telephone number. Please enter a 10-digit number which start from 0.");
                    return false;
                    }

                };
            </script>
        

        </div>
    
<div class="footer">
            <p>&copy; <?php echo date("Y"); ?> Food Review Website. All rights reserved.</p>
</div>
</body>
</html>

