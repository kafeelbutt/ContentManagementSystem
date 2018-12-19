<?php 

$size=sizeof($_POST);
$records=$size/4;
for($i=1;$i<=$records;$i++)
{
	$index1="bookid".$i;
	$bookid[$i]=$_POST[$index1];
	$index2="title".$i;
	$title[$i]=$_POST[$index2];
	$index3="price".$i;
	$price[$i]=$_POST[$index3];
	$index4="author".$i;
	$author[$i]=$_POST[$index4];
}
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'BRM_DB');
for($i=1;$i<=$records;$i++){
$q="Update Book SET title='$title[$i]',price='$price[$i]',author='$author[$i]' where bookid=$bookid[$i] ";
}
mysqli_query($con,$q);
mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
<title>
Updation
</title>
</head>
<body>
<h1> BOOK RECORD MANAGEMENT SYSTEM </h1>
<p> <?php  echo "RECORDS Updated";?></p>
Go Back To Home Page<a href="Home.php"> Click Here </a>
 </body>
 </html>