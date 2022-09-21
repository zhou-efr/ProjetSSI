<?php
$conn = new mysqli("localhost", "SGBD", "g489Z15n!mM34JKISZZL", "ProjetSSI");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
