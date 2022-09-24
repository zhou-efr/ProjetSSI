<?php
$conn = new mysqli("10.0.0.6", "SGBD", "g489Z15n!mM34JKISZZL", "ProjetSSI");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");
