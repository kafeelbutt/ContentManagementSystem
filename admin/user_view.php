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
    $User_id = $_SESSION['User_id'];	
	// Article Category Title and Author Name

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | User View</title>
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
          <a class="navbar-brand" href="#">CMS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">Dashboard</a></li>
            <li><a href="/cms" target="blank">Home-Page</a></li>
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> User Profile <small>View</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Create Content
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Add Page</a></li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
      
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.html" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              
			  </div>

    
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">User View</h3>
              </div>
              <div class="panel-body">
			  <?php
			  $con = new mysqli("localhost","root","hamza");
	          $con->select_db("cms_test_2");
			  $query = "select * from users where User_id = '".$User_id."'";
			  $rs = $con->query($query);
			  $row=$rs->fetch_assoc();
			  $User_fname = $row["User_fname"];
			  $User_lname = $row["User_lname"];
			  $User_email = $row["User_email"];
			  $User_joined = $row["User_joined_date"];
			  			 
			  ?>
                <form method="post" >
                  <div class="form-group">
                    <label>User Fname</label>
                    <input type="text" name="f_name" class="form-control"  value="<?php echo $User_fname;?>" disabled>
                  </div>
				  <div class="form-group">
                    <label>User Lname</label>
                    <input type="text" name="l_name" class="form-control"  value="<?php echo $User_lname;?>" disabled>
                  </div>
				  <div class="form-group">
                    <label>User Email</label>
                    <input type="text" name="u_email" class="form-control"  value="<?php echo $User_email;?>" disabled>
                  </div>
				  <div class="form-group">
                    <label>User Joined</label>
                    <input type="text" name="joined_date" class="form-control"  value="<?php echo  $User_joined;?>" disabled>
                  </div>
	 			
                
				</form>
              </div>
              </div>
          </div>
        </div>
      </div>
    </section>

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
	 
	$a_title = $_POST['a_title'];
	$editor1 = $_POST['editor1'];
	$Meta_title = $_POST['meta_title'];
	$Meta_desc = $_POST['meta_desc'];
	$Select_cat = $_POST['category'];
	$Select_author = $_POST['author_select'];
	$visibilty = $_POST['visibilty'];

	$con = new mysqli("localhost","root","hamza");
	$con->select_db("cms_test_2");
	 
	if($a_title == '' or $editor1 == '')
	{echo"alert('Fields not to be Empty');";
		exit();}
// Get Category id by Title
$query = "select * from category where Cat_title = '".$Select_cat."' ";
$rs = $con->query($query);
$cat_rs = $rs->fetch_assoc();
$cat_id = $cat_rs['Cat_id'];
// Get Author id by Name
mysqli_free_result($rs);
$con = new mysqli("localhost","root","hamza","cms_test_2");

$query = "select Author_id from author where Author_name = '".$Select_author."' ";
$rs = $con->query($query);
$Author_rs = $rs->fetch_assoc();
$Author_id = $Author_rs['Author_id'];
$pub_type = 'Admin';
    $con = new mysqli("localhost","root","hamza","cms_test_2");
$query = "Update article set Article_title = '".$a_title."' , Article_desc = '".$editor1."' , Artile_visibility = '".$visibilty."' , Article_cat_id = '".$cat_id."' , Article_publisher_id = '".$_SESSION['A_id']."' , Article_author_id = '".$Author_id."' , Article_publisher_type = '".$pub_type."'  where Article_id = '".$Article_id."'";
    $rs = $con->query($query);
	if($con->error){echo $con->error;}
	if($rs == 1 )
	  {
		     echo "<script>window.open('admin_index.php?Record Updated Successfully','_self')</script>";
	  }
   }
   
?>
