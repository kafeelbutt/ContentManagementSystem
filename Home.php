<?php
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'BRM_DB');
$q="SELECT * FROM book";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
<title>
Home Page
</title>
<link rel="stylesheet" href="./CSS/ViewStyle.css"/>
</head>
<body>
<h1> BOOK RECORD MANAGEMENT SYSTEM </h1>
<a href="Insert Form.php"> Insert Book </a> </br>
<a href="View.php"> View Book Records </a> </br>
<a href="DeleteForm.php"> Delete Book Records </a> </br>
<a href="UpdateForm.php"> Update Book Records </a> </br>
</body>
</html>