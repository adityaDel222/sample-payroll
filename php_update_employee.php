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
$sql = "UPDATE employee SET First_Name = '".$var2."',Middle_Name = '".$var3."',Last_Name = '".$var4."',Address = '".$var5."',Join_Date = '".$var6."',DepID = ".$var7.",DesID = ".$var8." WHERE ID = ".$var1;
if ($conn->query($sql)) {
 echo '<center><p class="success" style="background-color: forestgreen;">Employee updated successfully.</p></center>';
}
else {
 echo '<center><p class="failure" style="background-color: maroon;">Error updating employee: '.$conn->error.'</p></center>';
}
echo '<br /><br /><center><a class="back" href="add_employee.html">Back</a>';
$conn->close();
?>