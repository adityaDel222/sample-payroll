<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="logo.ico" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Update Employee | Administrator | Paper Jack Solutions</title>
<style type="text/css">
.content_head {
 font-family: segoe ui light;
 font-size: 3em;
 color: #3cb371;
}
table {
border: 0.2em solid black;
padding: 3em;
margin-bottom: 5em;
border: 0.2em dotted #6fdc6f;
padding: 5em;
font-family: Copperplate Gothic;
box-shadow: 0px 0px 10px 0px green;
}
td {
padding: 10px;
}
.submit {
border: 0em;
background-color: #6fdc6f;
padding: 1em;
font-family: Copperplate Gothic;
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
<h1 class="content_head">Update Employee</h1>
<?php
include "connect.php";
$conn->query("USE payroll");
$emp_id = $_POST["emp_id"];
$sql = "SELECT * FROM employee WHERE ID = ".$emp_id;
$result = $conn->query($sql);
if($result->num_rows == 1) {
 $row = $result->fetch_assoc();
 echo '<form method="post" action="php_update_employee.php">';
 echo '<table>';
 echo '<tr>';
 echo '<td>Updating for ID:</td>';
 echo '<td><input type="text" name="emp_id" value="'.$row["ID"].'" style="border: 0px" readonly /></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Enter First Name:</td>';
 echo '<td><input type="text" name="emp_fname" value="'.$row["First_Name"].'" required /></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Enter Middle Name:</td>';
 echo '<td><input type="text" name="emp_mname" value="'.$row["Middle_Name"].'" /></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Enter Last Name:</td>';
 echo '<td><input type="text" name="emp_lname" value="'.$row["Last_Name"].'" required /></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Enter Address:</td>';
 echo '<td><textarea name="emp_address" rows=5 cols=25 value="'.$row["Address"].'" required></textarea></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Enter Join Date:</td>';
 echo '<td><input type="date" name="emp_jdate" value="'.$row["Join_Date"].'" required /></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Enter Department ID:</td>';
 echo '<td><input type="text" name="emp_dep_id" value="'.$row["DepID"].'" required /></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Enter Designation ID:</td>';
 echo '<td><input type="text" name="emp_des_id" value="'.$row["DesID"].'" required /></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td><input type="submit" name="submit" class="submit" /></td>';
 echo '</tr>';
 echo '</table>';
 echo '</form>';
}
else {
 echo '<p style="width: 50%;text-align: center;border-radius: 0.5em;background-color: maroon;padding: 1em;font-family: Courier New;font-size: 1.5em;color: #ffffff;">Employee not found.</p>';
}
$conn->close();
?>
</div>
</body>
</html>