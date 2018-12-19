<?php
session_start();
if(!$_SESSION['A_email'])
	header('location:login.php?error=You must enter user details');
           //
		   $Admin_email = $_SESSION['A_email'];
  // Start Connection
              $con = new mysqli("localhost","root","hamza");
	          $con->select_db("cms_test_2");			                 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Account Login</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="my.js"></script>
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
          <a class="navbar-brand" href="#">Content Management System</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center"> User Sign-Up Area <small>From Admin Account</small></h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form id="login" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="well" >
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="User_fname"class="form-control" placeholder="Enter First Name" required>
                  </div>
				  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="User_lname"class="form-control" placeholder="Enter Last Name" required>
                  </div>
				  <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" name="User_email"class="form-control" placeholder="Enter Email" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="User_pass" class="form-control" placeholder="Password" required>
                  </div>
                  <button type="submit" name="submit" class="btn btn-default btn-block">SignUp</button>
              </form>
          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>Copyright by ResellPK, &copy; 2017</p>
    </footer>

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
  if(isset($_POST['submit']))
   {
     $User_fname = $_POST['User_fname'];
	 $User_lname = $_POST['User_lname'];
	 $User_email = $_POST['User_email'];
	 $User_pass =  $_POST['User_pass'];
	 // Connect to DB
	 $con = new mysqli("localhost","root","hamza");
	 $db = "cms_test_2";
	 $con->select_db($db);
	 // Validate Emial if have
	  $query = "select User_email from users where User_email = '".$User_email."' ";
	 
	  $rs = $con->query($query);
	      if($rs->num_rows>0){
        echo "<script>alert('Email Already Exist');</script>";
		exit();
		                     }
            else
	             {
		$query = "INSERT INTO users(User_fname,User_lname,User_email,User_pass) VALUES 
('".$User_fname."','".$User_lname."','".$User_email."','".$User_pass."')";
	            $rs = $con->query($query);
                   if($rs==0)
				   {
	$query = "ALTER TABLE users AUTO_INCREMENT = 1";
	$con->query($query);

				   }	
                   else
				    {
echo "<script>window.open('admin_index.php?Successfully Created','_self')</script>";						
					}				   
				 }
	 
	 
   }
?>
