<?php
include "connect.php";
include "php_style.php";
$conn->query("USE payroll");
$var1 = $_POST["emp_id"];
$sql = 'SELECT * FROM employee WHERE ID = '.$var1;
$result = $conn->query($sql);
if($result->num_rows == 1) {
 echo '<center><p>Employee found.</p></center>';
 $sql1 = 'DELETE FROM employee WHERE ID = '.$var1;
 if($conn->query($sql1)) {
  echo '<center><p class="success" style="background-color: forestgreen;">Employee removed successfully.</p></center>';
 }
 else {
  echo '<center><p class="failure" style="background-color: maroon;">Error removing employee: '.$conn->error.'</p></center>';
 }
}
else {
 echo '<center><p class="failure" style="background-color: CadetBlue;">Employee not found.</p></center>';
}
echo '<br /><br /><center><a class="back" href="delete_employee.html">Back</a>';
$conn->close();
?>