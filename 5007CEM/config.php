<?php

session_start();

$conn = new mysqli('localhost', 'root', '', '5007cem');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}