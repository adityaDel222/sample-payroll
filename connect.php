﻿<?php
$server = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($server,$username,$password);
if($conn->connect_error) {
 die("<br />Connection failed: " . $conn->connect_error);
}
?>