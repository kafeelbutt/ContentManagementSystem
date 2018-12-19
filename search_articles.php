<?php
  
  session_start();
if(!$_SESSION['search'])
	header('location:index.php?error=You must enter title');
  
  
  
  
?>
<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width">
 <meta name="title" content="Hamza Naeem - Portfolio">
 <meta name="description" content="Hamza Naeem is a Web Developer.Its Portfolio Describe it!">
 <title>Search Article Hub</title>
 <link rel="stylesheet" href="mystyle.css">
 <link rel="stylesheet" href="search.css">
</head>
<body>
<header>
    <div class="container">
	  <div id="branding">
	    <h1><span class="highlight">Article</span> Hub</h1>
	  </div>
	  <nav>
	    <ul>
		<li class="current"><a href="index.php">Home</a></li>
		<li><a href="categories.php">Categories</a></li>
		<li><a href="#">About us</a></li>
		</ul>
	  </nav>
	</div>
</header>

<br><br>
<section id="newsletter">
 
</section>

<section id="boxex">
         <h1>Your Search Articles</h1>
  <div class="container">
    <?php
  $search = $_SESSION['search'];
  $con = new mysqli("localhost","root","hamza","cms_test_2");
  $query = "select * from article where Article_title LIKE  '%{$search}%' or Article_desc LIKE  '%{$search}%' and Artile_visibility = 'Public' ";
  $rs = $con->query($query);
 
 if($con->connect_error){
	 echo $con->connect_error;
   exit();
 }
 $check = $rs->fetch_assoc();
   while($result = $rs->fetch_assoc()){

 ?>
 <div class="box">
	<h1><?php 

	echo $result['Article_id']." :".$result['Article_title'];

	?></h1>
	<p>
	   <?php echo $result['Article_desc']."......................................................................................................................................................................................................................................................................................................................................................................<br>"; ?>
	</p>
	</div>
		<?php } ?>
	
 </div>
    <?php
	if($check['Article_id'] == '' )
	{echo "<b>No Article Found";}
	?>   	
</section>
<footer>
   <p> 
     ArticleCMs,Copyright &copy; 2017 by Hamza Naeem
   </p>
</footer>


</body>
</html>