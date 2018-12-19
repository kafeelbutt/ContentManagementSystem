<?php
  session_start();
  $con = new mysqli("localhost","root","hamza","cms_test_2");
  $query = "select * from article where Artile_visibility = 'Public' order by Article_created_date desc limit 2 ";
  $rs = $con->query($query);
  $_SESSION['Cat_id'] = 2;
?>
<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width">
 <meta name="title" content="Hamza Naeem - Portfolio">
 <meta name="description" content="Hamza Naeem is a Web Developer.Its Portfolio Describe it!">
 <title>Article Hub</title>
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
		<li class="current"><a href="#">Home</a></li>
		<li><a href="categories.php">Categories</a></li>
		<li><a href="#">About us</a></li>
		</ul>
	  </nav>
	</div>
</header>
<section id="showcase">
   <div class="container">
       <h1>Search Thousands of Article </h1>
   <form class="form-wrapper cf" method="post" action="index.php">
  	<input type="text" name = "search" placeholder="Search Article by Title" required>
	  <button type="submit" name="search1" >Search</button>
</form>

	   </div>
	   <div></div>
</section>
<br><br>
<section id="newsletter">
 
</section>

<section id="boxex">
         <h1>Latest Articles of Article CMS </h1>
  <div class="container">
    <?php
	while($result=$rs->fetch_assoc() ){ ?>
	<div class="box">
	<h1><?php echo $result['Article_id']." :".$result['Article_title']; ?></h1>
	<?php
	//<img src="html.png">
	
	?>
	<p>
	   <?php echo $result['Article_desc']."......................................................................................................................................................................................................................................................................................................................................................................<br>"; ?>
	</p>
	</div>
	<?php } ?>
  </div>
</section>
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