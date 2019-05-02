<?php
include "connect.php";
include "php_style.php";
$conn->query("USE payroll");
$var1 = $_POST["dep_id"];
$sql = 'SELECT * FROM department WHERE Department_ID = '.$var1;
$result = $conn->query($sql);
if($result->num_rows > 0) {
 $sql1 = 'DELETE FROM department WHERE Department_ID = '.$var1;
 if($conn->query($sql1)) {
  echo '<center><p class="success" style="background-color: forestgreen;">Department removed successfully.</p></center>';
 }
 else {
  echo '<center><p class="failure" style="background-color: maroon;">Error removing department: '.$conn->error.'</p></center>';
 }
}
else {
 echo '<center><p class="failure" style="background-color: CadetBlue;">Department not found.</p></center>';
}
echo '<br /><br /><center><a class="back" href="delete_department.html">Back</a>';
$conn->close();
?>