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
            <h1 class="text-center"> Admin Area <small>Account Login</small></h1>
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
                    <label>Email Address</label>
                    <input type="text" name="Admin_email"class="form-control" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="Admin_pass" class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" name="submit" class="btn btn-default btn-block">Login</button>
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

	 $Admin_email = $_SESSION['A_email'] = $_POST['Admin_email'];
	 $Admin_pass =  $_POST['Admin_pass'];
	 // Null Validation
	 if($Admin_email == "" or $Admin_pass == ""){
	   alert("Admin email or pass is missing");
	     exit();
	   }
	 // Connect to DB
	 $con = new mysqli("localhost","root","hamza");
	 $db = "cms_test_2";
	 $con->select_db($db);
	 // Validate Login
	  $query = "select * from admin where Admin_email = '".$Admin_email."' and Admin_pass = '".$Admin_pass."'";
	 
	  $rs = $con->query($query);
	      if($rs->num_rows>0){
		 $query = "select * from admin where Admin_email = '".$Admin_email."' and Admin_pass = '".$Admin_pass."'";	  
			  $rs = $con->query($query);
			  $row = $rs->fetch_assoc();
		$query2 = "select Max(Admin_total_login) as last_login from admin_log where Admin_id = '".$row['Admin_id']."' ";	  
			$rs2 = $con->query($query2); 
            $row2 = $rs2->fetch_assoc();
           $_SESSION['last_login'] =  $last_login = $row2['last_login']+1;
         echo $row['Admin_id']." ".$last_login;		 
			  $query1 = "insert into admin_log (Admin_id,Admin_total_login) values('".$row['Admin_id']."','".$last_login."')";
            $rs3 = $con->query($query1);
		
$query4 = "select * from admin_log where Admin_total_login = '".$row2['last_login']."'  and Admin_id = '".$row['Admin_id']."'";			
		$rs5 = $con->query($query4);
		$row5 = $rs5->fetch_assoc();
		$_SESSION['last_date'] = 	$row5['Admin_lastlogin'];		
		echo "<script>window.open('admin_index.php?logged=Logged in Successfully..!','_self')</script>";
		  
		  } else
	             {
			echo "<br><br>Incorrect Email or Pass!";
			exit();
	             }
	 
   }
?>
