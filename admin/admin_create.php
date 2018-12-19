<?php
session_start();
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
            <h1 class="text-center"> Admin Sign-Up Area <small>Admin Account Sign-Up</small></h1>
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
                    <input type="text" name="Admin_fname"class="form-control" placeholder="Enter First Name" required>
                  </div>
				  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="Admin_lname"class="form-control" placeholder="Enter Last Name" required>
                  </div>
				  <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" name="Admin_email"class="form-control" placeholder="Enter Email" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="Admin_pass" class="form-control" placeholder="Password" required>
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
     $Admin_fname = $_POST['Admin_fname'];
	 $Admin_lname = $_POST['Admin_lname'];
	 $Admin_email = $_POST['Admin_email'];
	 $Admin_pass =  $_POST['Admin_pass'];
	 // Connect to DB
	 $con = new mysqli("localhost","root","hamza");
	 $db = "cms_test_2";
	 $con->select_db($db);
	 // Validate Emial if have
	  $query = "select Admin_email from admin where Admin_email = '".$Admin_email."' ";
	 
	  $rs = $con->query($query);
	      if($rs->num_rows>0){
        echo "<script>alert('Email Already Exist');</script>";
		exit();
		                     }
            else
	             {
		$query = "INSERT INTO admin(Admin_fname,Admin_lname,Admin_email,Admin_pass) VALUES 
('".$Admin_fname."','".$Admin_lname."','".$Admin_email."','".$Admin_pass."')";
	            $rs = $con->query($query);
                   if($rs==0)
				   {
	$query = "ALTER TABLE admin AUTO_INCREMENT = 1";
	$con->query($query);

				   }	
                   else
				    {
echo "<script>window.open('login.php','_self')</script>";						
					}				   
				 }
	 
	 
   }
?>
