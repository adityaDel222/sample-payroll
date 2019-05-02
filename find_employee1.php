<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="logo.ico" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>View Employee | Administrator | Paper Jack Solutions</title>
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
<h1 class="content_head">View Employee</h1>
<?php
include "connect.php";
$conn->query("USE payroll");
$emp_id = $_POST["emp_id"];
//$sql1 = "SELECT * FROM employee,department,designation,salary,contact WHERE employee.ID = ".$emp_id." AND employee.DepID = department.Department_ID AND employee.DesID = designation.Designation_ID AND salary.EmpID = employee.ID AND contact.EmpID = employee.ID";
$sql1 = "SELECT * FROM employee,department,designation WHERE employee.ID = ".$emp_id." AND employee.DepID = department.Department_ID AND employee.DesID = designation.Designation_ID";
$sql2 = "SELECT * FROM employee,salary WHERE employee.ID = ".$emp_id." AND salary.EmpID = employee.ID";
$sql3 = "SELECT * FROM employee,contact WHERE employee.ID = ".$emp_id." AND contact.EmpID = employee.ID";
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
if($result1->num_rows == 1 && $result2->num_rows == 1 && $result3->num_rows == 1) {
 $row1 = $result1->fetch_assoc();
 $row2 = $result2->fetch_assoc();
 $row3 = $result3->fetch_assoc();
 echo '<table>';
 echo '<tr>';
 echo '<td>Employee ID:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["ID"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Basic:</td>';
 echo '<td style="font-family: Calibri;">'.$row2["Basic"].'/-</td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>First Name:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["First_Name"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Allowance:</td>';
 echo '<td style="font-family: Calibri;">'.$row2["Allowance"].'/-</td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Middle Name:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Middle_Name"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Gross Salary:</td>';
 echo '<td style="font-family: Calibri;">'.$row2["Gross_Salary"].'/-</td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Last Name:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Last_Name"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Tax levied:</td>';
 echo '<td style="font-family: Calibri;">'.$row2["Tax"].'%</td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Address:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Address"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Net Salary:</td>';
 echo '<td style="font-family: Calibri;">'.$row2["Net_Salary"].'/-</td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Join Date:</td>';
 echo '<td style="font-family: Calibri;">'.substr($row1["Join_Date"],0,10).'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Phone Number:</td>';
 echo '<td style="font-family: Calibri;">'.$row3["Phone"].'</td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Department:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Department_Name"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Email address:</td>';
 echo '<td style="font-family: Calibri;">'.$row3["Email"].'</td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Designation:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Designation_Name"].'</td>';
 echo '</tr>';
 echo '<tr>';
 echo '</tr>';
 echo '</table>';
}
else if ($result1->num_rows == 1 && $result2->num_rows == 1 && $result3->num_rows == 0) {
 $row1 = $result1->fetch_assoc();
 $row2 = $result2->fetch_assoc();
 //$row3 = $result3->fetch_assoc();
 echo '<table>';
 echo '<tr>';
 echo '<td>Employee ID:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["ID"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Basic:</td>';
 echo '<td style="font-family: Calibri;">'.$row2["Basic"].'/-</td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>First Name:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["First_Name"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Allowance:</td>';
 echo '<td style="font-family: Calibri;">'.$row2["Allowance"].'/-</td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Middle Name:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Middle_Name"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Gross Salary:</td>';
 echo '<td style="font-family: Calibri;">'.$row2["Gross_Salary"].'/-</td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Last Name:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Last_Name"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Tax levied:</td>';
 echo '<td style="font-family: Calibri;">'.$row2["Tax"].'%</td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Address:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Address"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Net Salary:</td>';
 echo '<td style="font-family: Calibri;">'.$row2["Net_Salary"].'/-</td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Join Date:</td>';
 echo '<td style="font-family: Calibri;">'.substr($row1["Join_Date"],0,10).'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Phone Number:</td>';
 echo '<td style="font-family: Calibri;"></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Department:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Department_Name"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Email address:</td>';
 echo '<td style="font-family: Calibri;"></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Designation:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Designation_Name"].'</td>';
 echo '</tr>';
 echo '<tr>';
 echo '</tr>';
 echo '</table>';
}
else if($result1->num_rows == 1 && $result2->num_rows == 0 && $result3->num_rows == 1) {
 $row1 = $result1->fetch_assoc();
 //$row2 = $result2->fetch_assoc();
 $row3 = $result3->fetch_assoc();
 echo '<table>';
 echo '<tr>';
 echo '<td>Employee ID:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["ID"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Basic:</td>';
 echo '<td style="font-family: Calibri;"></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>First Name:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["First_Name"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Allowance:</td>';
 echo '<td style="font-family: Calibri;"></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Middle Name:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Middle_Name"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Gross Salary:</td>';
 echo '<td style="font-family: Calibri;"></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Last Name:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Last_Name"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Tax levied:</td>';
 echo '<td style="font-family: Calibri;"></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Address:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Address"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Net Salary:</td>';
 echo '<td style="font-family: Calibri;"></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Join Date:</td>';
 echo '<td style="font-family: Calibri;">'.substr($row1["Join_Date"],0,10).'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Phone Number:</td>';
 echo '<td style="font-family: Calibri;">'.$row3["Phone"].'</td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Department:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Department_Name"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Email address:</td>';
 echo '<td style="font-family: Calibri;">'.$row3["Email"].'</td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Designation:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Designation_Name"].'</td>';
 echo '</tr>';
 echo '<tr>';
 echo '</tr>';
 echo '</table>';
}
else if($result1->num_rows == 1 && $result2->num_rows == 0 && $result3->num_rows == 0) {
 $row1 = $result1->fetch_assoc();
 //$row2 = $result2->fetch_assoc();
 //$row3 = $result3->fetch_assoc();
 echo '<table>';
 echo '<tr>';
 echo '<td>Employee ID:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["ID"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Basic:</td>';
 echo '<td style="font-family: Calibri;"></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>First Name:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["First_Name"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Allowance:</td>';
 echo '<td style="font-family: Calibri;"></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Middle Name:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Middle_Name"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Gross Salary:</td>';
 echo '<td style="font-family: Calibri;"></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Last Name:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Last_Name"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Tax levied:</td>';
 echo '<td style="font-family: Calibri;"></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Address:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Address"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Net Salary:</td>';
 echo '<td style="font-family: Calibri;"></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Join Date:</td>';
 echo '<td style="font-family: Calibri;">'.substr($row1["Join_Date"],0,10).'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Phone Number:</td>';
 echo '<td style="font-family: Calibri;"></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Department:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Department_Name"].'</td>';
 echo '<td style="width: 3em;"></td>';
 echo '<td>Email address:</td>';
 echo '<td style="font-family: Calibri;"></td>';
 echo '</tr>';
 echo '<tr>';
 echo '<td>Designation:</td>';
 echo '<td style="font-family: Calibri;">'.$row1["Designation_Name"].'</td>';
 echo '</tr>';
 echo '<tr>';
 echo '</tr>';
 echo '</table>';
}
else {
 echo '<p style="width: 50%;text-align: center;border-radius: 0.5em;background-color: maroon;padding: 1em;font-family: Courier New;font-size: 1.5em;color: #ffffff;">Employee not found.</p>';
}
$conn->close();
?>
</div>
</body>
</html>