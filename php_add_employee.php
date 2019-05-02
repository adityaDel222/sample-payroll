<?php
include "connect.php";
include "php_style.php";
$conn->query("USE payroll");
$var1 = $_POST["emp_id"];
$var2 = $_POST["emp_fname"];
$var3 = $_POST["emp_mname"];
$var4 = $_POST["emp_lname"];
$var5 = $_POST["emp_address"];
$var6 = $_POST["emp_jdate"];
$var7 = $_POST["emp_dep_id"];
$var8 = $_POST["emp_des_id"];
$sql = "INSERT INTO employee VALUES (".$var1.",'".$var2."','".$var3."','".$var4."','".$var5."','".$var6."','".$var7."',".$var8.")";
if ($conn->query($sql)) {
 echo '<center><p class="success" style="background-color: forestgreen;">Employee added successfully.</p></center>';
}
else {
 echo '<center><p class="failure" style="background-color: maroon;">Error adding employee: '.$conn->error.'</p></center>';
}
echo '<br /><br /><center><a class="back" href="add_employee.html">Back</a>';
$conn->close();
?>