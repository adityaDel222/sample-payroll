<?php
include "connect.php";
include "php_style.php";
$conn->query("USE payroll");
$var1 = $_POST["des_id"];
$sql = 'SELECT * FROM designation WHERE Designation_ID = '.$var1;
$result = $conn->query($sql);
if($result->num_rows > 0) {
 $sql1 = 'DELETE FROM designation WHERE Designation_ID = '.$var1;
 if($conn->query($sql1)) {
  echo '<center><p class="success" style="background-color: forestgreen;">Position removed successfully.</p></center>';
 }
 else {
  echo '<center><p class="failure" style="background-color: maroon;">Error removing position: '.$conn->error.'</p></center>';
 }
}
else {
 echo '<center><p class="failure" style="background-color: CadetBlue;">Position not found.</p></center>';
}
echo '<br /><br /><center><a class="back" href="delete_designation.html">Back</a>';
$conn->close();
?>