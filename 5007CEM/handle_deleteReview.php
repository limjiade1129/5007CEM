<?php
// handle_deleteReview.php

require 'config.php';

if (!empty($_POST['review_id']) && !empty($_POST['photo'])) {
    $id = $_POST['review_id'];
    $photo = $_POST['photo'];

    // Delete the review from the database
    $query = "DELETE FROM review WHERE id=$id";
    mysqli_query($conn, $query);

    // Delete the photo in uploads folder
    if (file_exists($photo)) {
        unlink($photo);
    }
}

header("Location: myreview.php");
exit();

?>