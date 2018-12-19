<?php
  session_start();
  $con = new mysqli("localhost","root","hamza","cms_test_2");
  $query = "select * from article order by Article_created_date desc limit 2 ";
  $rs = $con->query($query);
?>
<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width">
 <meta name="title" content="Hamza Naeem - Portfolio">
 <meta name="description" content="Hamza Naeem is a Web Developer.Its Portfolio Describe it!">
 <title>Article Hub</title>
 <link rel="stylesheet" href="mystyle.css">
</head>
<body>
<header>
    <div class="container">
	  <div id="branding">
	    <h1><span class="highlight">Article</span> Hub</h1>
	  </div>
	  <nav>
	    <ul>
		<li class="current"><a href="#">Home</a></li>
		<li><a href="#">Categories</a></li>
		<li><a href="#">About us</a></li>
		</ul>
	  </nav>
	</div>
</header>
<?php
  $con = new mysqli("localhost","root","hamza");
	          $con->select_db("cms_test_2"); 
  $query1 = "select * from Cat_view";
  $rs  = $con->query($query1);
  $i=1;
   while($row = $rs->fetch_array()){
?>

<br><br>

<footer>
   <p> 
     ArticleCMs,Copyright &copy; 2017 by Hamza Naeem
   </p>
</footer>


</body>
</html>
<?php 

if(isset($_POST['search1']))
{
	
$_SESSION['search'] =	$search = $_POST['search'];
		echo "<script>window.open('search_articles.php?".$search."','_self')</script>";
}
?>