<?php
include "connect.php";
include "php_style.php";
$conn->query("USE payroll");
$var1 = $_POST["des_id"];
$var2 = $_POST["des_name"];
$sql = "INSERT INTO designation VALUES (".$var1.",'".$var2."')";
if ($conn->query($sql)) {
 echo '<center><p class="success" style="background-color: forestgreen;">Position added successfully.</p></center>';
}
else {
 echo '<center><p class="failure" style="background-color: maroon;">Error adding position: '.$conn->error.'</p></center>';
}
echo '<br /><br /><center><a class="back" href="add_designation.html">Back</a>';
$conn->close();
?>