    <?php
    require 'config.php';

    if (!empty($_SESSION['id'])) {
        $id = $_SESSION['id']; 
        $result = mysqli_query($conn, "SELECT * FROM user WHERE id=$id");
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
    } else {
        echo '<script>alert("Invalid! Sign In First");';
        echo 'window.location.href = "loginpage.php";</script>';
        exit(); 
    }

    // Retrieving form data
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $foodName = $_POST["food_name"];
        $restaurantName = $_POST["restaurant_name"];
        $categoryID = $_POST["category"];
        $categoryName = "";
        $description = $_POST["description"];
        $photo = $_FILES["photo"]["name"]; // Assuming you want to store the file name in the database
        $targetDir = "uploads/"; // Assuming you have a directory named "uploads" to store the uploaded files
        $targetFile = $targetDir . basename($_FILES["photo"]["name"]);
        

        // Check if the file already exists
        if (file_exists($targetFile)) {
            echo '<script>alert("File already exists. Please choose a different file.");</script>';
        } else {
            // Move uploaded file to the target directory
            move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile);

            // Retrieve the category name based on the selected category ID
            $categoryResult = mysqli_query($conn, "SELECT category_name FROM categories WHERE category_id=$categoryID");
            if ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                $categoryName = $categoryRow['category_name'];
            }

            // SQL query to insert the form data into the database
            $sql = "INSERT INTO review (food_name, restaurant_name, category_id, category_name, description, photo, user_id, username)
                    VALUES ('$foodName', '$restaurantName', '$categoryID', '$categoryName', '$description', '$targetFile', '$id', '$username')";

            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Review Submitted");</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    
    $categoryResult = mysqli_query($conn, "SELECT * FROM categories");
    $categories = mysqli_fetch_all($categoryResult, MYSQLI_ASSOC);

    // Closing the database connection
    $conn->close();
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
            <li><a href="viewreview.php">View Review</a></li>
            <li><a href="addreview.php" class="active">Add Review</a></li>
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

      <div class="h2-heading">
        <h2>Add Your Reviews</h2>
      </div>

      <div class="form">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="food_name">Food Name:</label>
            <input type="text" id="food_name" name="food_name" required>
          </div>

          <div class="form-group">
            <label for="restaurant_name">Restaurant Name:</label>
            <input type="text" id="restaurant_name" name="restaurant_name" required>
          </div>

          <div class="form-group">
            <label for="category">Category:</label>
            <select id="category" name="category" required>
              <?php foreach ($categories as $category) { ?>
                <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5" cols="45" required></textarea>
          </div>

          <div class="form-group">
            <label for="photo">Upload Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>
          </div>

          <input type="submit" value="Submit" class="button">
        </form>
      </div>
    </body>
    </html>
