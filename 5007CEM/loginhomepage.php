<?php
require 'config.php';

if (!empty($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
} else {
     echo '<script>alert("Invalid! Sign In First");';
    echo 'window.location.href = "loginpage.php";</script>';
    exit(); 
}
?>


<!DOCTYPE html>

<html>
    <head>
        <title>Food Review Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <li><a href="loginhomepage.php" class="active">Home</a></li>
                    <li><a href="viewreview.php">View Review</a></li>
                    <li><a href="addreview.php">Add Review</a></li>
                    <li><a href="myreview.php">My Review</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="logout.php" onclick="return confirm('Are you sure you want to log out?')">Log Out</a></li>

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
    

            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
                        <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h4>Chocolate Lover</h4>
                        <p>Who love chocolate will be like it!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h4>Turkey's Chicken</h4>
                        <p>Look very juicy and delicious!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/3.jpg" class="d-block w-100"  alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h4>Red Seafood Plate</h4>
                        <p>Look Red and Fresh and bring your family to Enjoy Seafood's Party!</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        
    <div class="container-content">

            <div class="header1">
                <h2>Welcome <?php print $row['username']; ?> to FD Explorer</h2>
            </div>

            <div class="para1">
                <p>FD Explorer is a place that food lover's love to post their goodies!</p>
                
                <center><a href="viewreview.php" class="button">View Review</a></center>
            </div>


        </div>
        
<div class="footer">
            <p>&copy; <?php echo date("Y"); ?> Food Review Website. All rights reserved.</p>
</div>

</body>

</html>
