
<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$telno = $_POST['telno'];

require 'config.php';
if ($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
} else {
    // Check if the email already exists in the database
    $checkStmt = $conn->prepare("SELECT email FROM user WHERE email = ?");
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // Email already exists, display an error message
        $checkStmt->close();
        $conn->close();
        ?>
        <script>
            alert("Email already exists.");
            window.location.href = "signup.php"; // Redirect to the register page
        </script>
        <?php
        exit();
    } else {
        // Email does not exist, proceed with the registration
        $stmt = $conn->prepare("INSERT INTO user(username, email, password, telno) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $username, $email, $password, $telno);
        
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            ?>
            <script>
                alert("Registered successfully");
                window.location.href = "loginpage.php";
            </script>
            <?php
            exit();
        } else {
            $stmt->close();
            $conn->close();
            ?>
            <script>
                alert("Error occurred while registering");
                window.location.href = "register.php"; // Redirect to the register page if an error occurs
            </script>
            <?php
            exit();
        }
    }
}
?>

