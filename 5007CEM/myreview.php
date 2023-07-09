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

    $sql = "SELECT * FROM review WHERE user_id=$id;";
    $all_review = $conn->query($sql);
        

    ?>


    <!DOCTYPE html>
    <html>
    <head>
    
      <title>Food Review Page</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="CSS/style.css"/>
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
            <li><a href="viewreview.php" >View Review</a></li>
            <li><a href="addreview.php" >Add Review</a></li>
            <li><a href="myreview.php" class="active">My Review</a></li>
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
      
      
      <div class="h2-heading">
        <h1>My Review Page</h1>
      </div>
      <div class="container-review">
        <table id="food-table">
          <tr>
              <th style="width: 40%;"><h2><center>Food Photo</center></h2></th>
            <th><h2><center>Details</center></h2></th>
          </tr>
        </table>
      </div>

        <?php
            while($row = mysqli_fetch_assoc($all_review)){


        ?>
      <div class="container-review">
      <table id="food-table">   
        <tr>
          <td rowspan="1" style="width: 40%;"><img class="food-photo" src="<?php echo $row["photo"]; ?>" alt=""></td>
          <td class="details-column">
            <h3><?php echo $row["food_name"]; ?></h3>
            <p><b>Username        : </b><?php echo $row["username"]; ?></p>
            <p><b>Restaurant Name : </b><?php echo $row["restaurant_name"]; ?></p>
            <p><b>Category        : </b><?php echo $row["category_name"]; ?></p>
            <p><b>Description     : </b><?php echo $row["description"]; ?></p>  
          </td>
          <td class="actions-column">
              <form method="post" action="handle_deleteReview.php">
                <input type="hidden" name="review_id" value="<?php echo $row["id"]; ?>">
                <input type="hidden" name="photo" value="<?php echo $row["photo"]; ?>">
                <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this review?')">Delete</button>
              </form>
      </td>
        </tr>

      </table>
      </div>

      <?php
        }
      ?>


    </body>
    </html>
