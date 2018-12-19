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
               
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Users</title>
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
            <li><a href="admin_index.php">Dashboard</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
             <li><a href="#">Welcome,<?php echo $fname." ".$lname;?></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Users<small>Manage Site Users</small></h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Create Content
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
               
                <li><a href="article_create.php">Add Article</a></li>
                <li><a href="user_create.php">Add User</a></li>
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
          <li class="active">Users</li>
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
              <a href="categories.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Add/Delete Categories <span class="badge"><?php echo $total_cat['total_cat']; ?></span></a>
              <a href="article_view.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit/Delete Articles    <span class="badge"> <?php echo $total_article['total_article'];
					?></span></a>
              <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Add/DeleteUsers <span class="badge"><?php  echo $total_user['total_user']; ?></span></a>
            </div>
      <div class="well">
              <h4>Last Login:<br><?php echo $_SESSION['last_date'] ;?></h4><br>
			  <h4>Total Login:<?php echo $_SESSION['last_login'] ;?></h4><br>
              
            </div>
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Users</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filter Users...">
                      </div>
                </div>
                <br>
                	<?php
				    $query = "create view All_user as Select * FROM users ";
				       $rs = $con->query($query);
					 $query1 = "select * from All_user";
                     $rs = $con->query($query1);
	
						?>	 
                <table class="table table-striped table-hover">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined</th>  
                        <th></th>
                      </tr>
			<?php 
			   while($row = $rs->fetch_assoc()){
             ?>
					  
                      <tr >
                 
                        <td><?php echo $row["User_fname"];?> <?php echo $row["User_lname"];?></td>
                        <td><?php echo $row["User_email"];?></td>
                      <td>  <?php echo $row["User_joined_date"];?></td>
                     <td>
						<form method="post" action="users.php">
						<button class="btn btn-default" value="<?php echo $row['User_id'];?> " name="edit" >View</button>
<button class="btn btn-danger" value="<?php echo $row['User_id'];?> " name="delete" >Delete</button>						
						
						</form>	
						</td>
                      </tr>
                      
			   <?php }?>
                    </table>
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
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Page</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Page Title</label>
          <input type="text" class="form-control" placeholder="Page Title">
        </div>
        <div class="form-group">
          <label>Page Body</label>
          <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox"> Published
          </label>
        </div>
        <div class="form-group">
          <label>Meta Tags</label>
          <input type="text" class="form-control" placeholder="Add Some Tags...">
        </div>
        <div class="form-group">
          <label>Meta Description</label>
          <input type="text" class="form-control" placeholder="Add Meta Description...">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

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
if(isset($_POST['edit']))
{
	$_SESSION['User_id'] = $_POST['edit'];
	echo "<script>window.open('user_view.php','_self')</script>";
}
if(isset($_POST['delete']))
{
	$_SESSION['User_id'] = $_POST['delete'];
$query = "delete from users where User_id = '".$_SESSION['User_id']."'";
$con->query($query);
echo "<script>window.open('users.php','_self')</script>";
}
?>