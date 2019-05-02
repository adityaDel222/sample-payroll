<?php
include "connect.php";
include "php_style.php";
$conn->query("USE payroll");
$var1 = $_POST["emp_id"];
$sql = 'SELECT * FROM contact WHERE EmpID = '.$var1;
$result = $conn->query($sql);
if($result->num_rows > 0) {
 $sql1 = 'DELETE FROM contact WHERE EmpID = '.$var1;
 if($conn->query($sql1)) {
  echo '<center><p class="success" style="background-color: forestgreen;">Contact removed successfully.</p></center>';
 }
 else {
  echo '<center><p class="failure" style="background-color: maroon;">Error removing contact: '.$conn->error.'</p></center>';
 }
}
else {
 echo '<center><p class="failure" style="background-color: CadetBlue;">Employee not found.</p></center>';
}
echo '<br /><br /><center><a class="back" href="delete_contact.html">Back</a>';
$conn->close();
?>