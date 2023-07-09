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
<html>
<head>
    <title>Food Review Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css" />
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
            <li><a href="loginhomepage.php">Home</a></li>
            <li><a href="viewreview.php">View Review</a></li>
            <li><a href="addreview.php">Add Review</a></li>
            <li><a href="myreview.php">My Review</a></li>
            <li><a href="aboutus.php" class="active">About Us</a></li>
            <li><a href="logout.php" onclick="return confirm('Are you sure you want to log out?')">Log Out</a></li>
        </ul>
    </nav>
</header>

<script>
    hamburger = document.querySelector(".hamburger");
    hamburger.onclick = function () {
        navBar = document.querySelector(".nav-bar");
        navBar.classList.toggle("active");
    }
</script>

<div class="container">
    <h1>Welcome <?php echo $row['username']; ?> for using this website.</h1>

    <h2>Our Mission</h2>
    <p style="text-align: justify;">Our mission is to provide a reliable platform for food enthusiasts to discover, share, and explore culinary experiences. We aim to connect individuals with the best dining options, offering honest and unbiased reviews that help users make informed decisions. Our goal is to foster a vibrant community of food lovers, encouraging them to share their personal experiences, recommendations, and insights. Through our platform, we strive to celebrate diverse cuisines, promote local businesses, and inspire a passion for gastronomy. We believe that everyone deserves memorable dining experiences, and we are dedicated to being the go-to resource for food discovery and appreciation.</p>

    <h2>Our Team</h2>

    <div class="team-container">
        <div class="team-member">
            <img src="img/member1.png" alt="Member 1">
            <h3>The Lonely Frog</h3>
            <p>Lonely Website Developer</p>
        </div>
        <div class="team-member">
            <img src="img/member2.jpg" alt="Member 2">
            <h3>The Handsome</h3>
            <p>Handsome Website Developer</p>
        </div>
        <div class="team-member">
            <img src="img/member3.jpeg" alt="Member 3">
            <h3>The Bad Guy</h3>
            <p>Bad Website Developer</p>
        </div>
    </div>

    <h1>Location</h1>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15889.967954798654!2d100.2818707!3d5.3416038!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ac048a161f277%3A0x881c46d428b3162c!2sINTI%20International%20College%20Penang!5e0!3m2!1sen!2smy!4v1688752670786!5m2!1sen!2smy"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>  
</div>


<div class="footer">
            <p>&copy; <?php echo date("Y"); ?> Food Review Website. All rights reserved.</p>
</div>

</body>
</html>
