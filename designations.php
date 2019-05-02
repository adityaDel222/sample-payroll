<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="logo.ico" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Designations | Administrator | Paper Jack Solutions</title>
<style type="text/css">
.content_head {
 font-family: segoe ui light;
 font-size: 3em;
 color: #3cb371;
}
.each_row {
 background-color: #6fdc6f;
 font-family: Segoe UI;
}
.head_row {
 background-color: #6fed6f;
 font-family: Segoe UI;
 font-weight: bold;
}
.each_row td,.head_row td {
 padding: 1em;
}
</style>
</head>
<body>
<div class="header_nav">
<div class="header">
<p class="head"><span style="font-family: imprint mt shadow; font-size: 1.75em">p</span>aper&nbsp;&nbsp;<span style="font-family: imprint mt shadow; font-size: 1.75em">j</span>ack&nbsp;&nbsp;solutions</p>
<img src="Logo.jpg" class="img_logo" />
</div>
<div class="nav">
<a class="nav_links" style="padding-left: 2em" href="home.html">Home</a>
<a class="nav_links" href="employees.php">Employees</a>
<a class="nav_links" href="departments.php">Departments</a>
<a class="nav_links" href="designations.php">Positions</a>
<a class="login" href="index.html">Log Out</a>
</div>
</div>
<div class="menu">
<ul class="menu_list">
<li><a class="menu_link" href="edit_employee.html">Edit Employee</a></li>
<li><a class="menu_link" href="edit_department.html">Edit Department</a></li>
<li><a class="menu_link" href="edit_designation.html">Edit Designation</a></li>
<li><a class="menu_link" href="edit_salary.html">Edit Salary</a></li>
<li><a class="menu_link" href="edit_provident_fund.html">Edit Provident Fund</a></li>
<li><a class="menu_link" href="edit_contact.html">Edit Contact</a></li>
</ul>
</div>
<div class="content">
<h1 class="content_head">Designations</h1>
<?php
include "connect.php";
$conn->query("USE payroll");
$sql = 'SELECT * FROM designation';
$result = $conn->query($sql);
if($result->num_rows > 0) {
 echo '<table style="width: 50em;margin-bottom: 5em;">';
 echo '<tr class="head_row"><td>Position ID</td><td>Position Name</td></tr>';
 while($row = $result->fetch_assoc()) {
  echo '<tr class="each_row">';
  echo '<td>'.$row["Designation_ID"].'</td><td>'.$row["Designation_Name"].'</td>';
  echo '</tr>';
 }
 echo '</table>';
}
else {
 echo 'No Results';
}
$conn->close();
?>
</div>
</body>
</html>