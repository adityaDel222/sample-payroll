<?php
include "connect.php";
include "php_style.php";
$conn->query("USE payroll");
$var1 = $_POST["sal_id"];
$var2 = $_POST["sal_basic"];
$var3 = $_POST["sal_allowance"];
$var4 = $_POST["sal_gross"];
$var5 = $_POST["sal_tax"];
$var6 = $_POST["sal_net"];
$var7 = $_POST["sal_emp_id"];
$sql = "INSERT INTO salary VALUES (".$var1.",".$var2.",".$var3.",".$var5.",".$var4.",".$var6.",".$var7.")";
if ($conn->query($sql)) {
 echo '<center><p class="success" style="background-color: forestgreen;">Salary added successfully.</p></center>';
}
else {
 echo '<center><p class="failure" style="background-color: maroon;">Error adding salary: '.$conn->error.'</p></center>';
}
echo '<br /><br /><center><a class="back" href="add_salary.html">Back</a>';
$conn->close();
?>