<?php
$conn = new mysqli("localhost", "Joe", "tZM6OyPrS.QPVk(U", "ProjetSSI");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");
