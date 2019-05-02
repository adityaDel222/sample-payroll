<?php
include "connect.php";
include "php_style.php";
$conn->query("USE payroll");
$var1 = $_POST["con_emp_id"];
$var2 = $_POST["con_phone"];
$var3 = $_POST["con_email"];
$sql = "INSERT INTO contact VALUES (".$var1.",'".$var2."','".$var3."')";
if ($conn->query($sql)) {
 echo '<center><p class="success" style="background-color: forestgreen;">Contact added successfully.</p></center>';
}
else {
 echo '<center><p class="failure" style="background-color: maroon;">Error adding contact: '.$conn->error.'</p></center>';
}
echo '<br /><br /><center><a class="back" href="add_contact.html">Back</a>';
$conn->close();
?>