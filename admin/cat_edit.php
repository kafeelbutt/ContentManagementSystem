<?php
session_start();
if(!$_SESSION['A_email'])
	header('location:login.php?error=You must enter user details');
           //
		   $Admin_email = $_SESSION['A_email'];
  // Start Connection
              $con = new mysqli("localhost","root","hamza");
	          $con->select_db("cms_test_2");
			  // UserName of Admin
$query="select Admin_id,Admin_fname,Admin_lname from admin where Admin_email = '".$_SESSION['A_email']."'";
		      $rs = $con->query($query);
			  $myname=$rs->fetch_assoc();
			  $_SESSION['A_id']= $myname['Admin_id'];
              $fname = $myname['Admin_fname'];
              $lname = $myname['Admin_lname'];			  
			// Count total User 
			  $query = "select count(user_id) as total_user from users";
			  $rs = $con->query($query);
			  $total_user=$rs->fetch_assoc();
			  // Count total Articles
			  $query = "select count(Article_id) as total_article from article";
			  $rs = $con->query($query);
			  $total_article=$rs->fetch_assoc();
			  // Count Total Categories
  $query = "select count(Cat_id) as total_cat from category";
			  $rs = $con->query($query);
			  $total_cat=$rs->fetch_assoc();				  
            // Saving Article id
    $Cat_id = $_SESSION['Cat_id'];	
	// Article Category Title and Author Name

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Edit Cat</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AdminStrap</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Dashboard</a></li>
      
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome,<?php echo $fname." ".$lname;?></a></li>
            <li><a href="login.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Edit Page<small>About</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Create Content
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Add Page</a></li>
                <li><a href="#">Add Post</a></li>
                <li><a href="#">Add User</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="index.html">Dashboard</a></li>
          <li><a href="pages.html">Pages</a></li>
          <li class="active">Edit Page</li>
        </ol>
      </div>
    </section>

    <section id="main">
    
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Edit Category</h3>
              </div>
              <div class="panel-body">
			  <?php
			  $con = new mysqli("localhost","root","hamza");
	          $con->select_db("cms_test_2");
			 
			 $query1 = "select * from category where Cat_id = '". $Cat_id."'";
                $rs = $con->query($query1);
				$row = $rs->fetch_assoc();
			 $Cat_title_name = $row['Cat_title'];	
             $Cat_desc = $row['Cat_desc'];			 
			  ?>
                <form method="post" >
                  
	 <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="a_cat" class="form-control" placeholder="Category" value="<?php echo $Cat_title_name;?> ">
                  </div>
<div class="form-group">
                    <label>Category Desc</label>
                    <input type="text" name="a_cat_d" class="form-control" placeholder="Category" value="<?php echo $Cat_desc;?> " >
                  </div>				  
				  		<div class="form-group">
                  <input type="submit" name="submitnow" class="btn btn-default" value="Submit">
                </form>
              </div>
              </div>

          </div>
        </div>
      </div>
    </section>
	<div></div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer id="footer">
      <p>Copyright RESELLPK, &copy; 2017</p>
    </footer>

    <!-- Modals -->

    <!-- Add Page -->
  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

<?php
  if(isset($_POST['submitnow']))
   {
    $con = new mysqli("localhost","root","hamza","cms_test_2");
    $query = "update category set Cat_title = '".$_POST['a_cat']."' , Cat_desc = '".$_POST['a_cat_d']."' where Cat_id = '".$Cat_id."'  ";
	$rs = $con->query($query);
	if($con->error){echo $con->error;}
	if($rs == 1 )
	  {
		     echo "<script>window.open('admin_index.php?Record Updated Successfully','_self')</script>";
	  }
   }
   
?>
