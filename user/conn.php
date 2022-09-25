<?php
$conn = new mysqli("10.0.1.6", "SGBD", "g489Z15n!mM34JKISZZL", "ProjetSSI");
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
}
if (!$conn) {
    error_log("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");
