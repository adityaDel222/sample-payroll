<?php
include "connect.php";
include "php_style.php";
$conn->query("USE payroll");
$var1 = $_POST["dep_id"];
$var2 = $_POST["dep_name"];
$sql = "INSERT INTO department VALUES (".$var1.",'".$var2."')";
if ($conn->query($sql)) {
 echo '<center><p class="success" style="background-color: forestgreen;">Department added successfully.</p></center>';
}
else {
 echo '<center><p class="failure" style="background-color: maroon;">Error adding department: '.$conn->error.'</p></center>';
}
echo '<br /><br /><center><a class="back" href="add_department.html">Back</a>';
$conn->close();
?>