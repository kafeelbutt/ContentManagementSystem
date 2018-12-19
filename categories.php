<?php
session_start();

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
    <title>Categories</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="index.php">CMS</a>
        </div>
      <!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
 
              
            </div>
          </div>
        </div>
      </div>
    </header>

    

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
		 
            <div class="list-group">
      
                     
			  <?php
			     
 				$query1 = "select * from category";
				$rs  = $con->query($query1);
				   while($row = $rs->fetch_array()){
			   ?>
             <form action="categories.php" method="post" >    
             <button class="btn btn-default" value="<?php echo $row['Cat_id'];?> " name="cat" ><?php echo $row['Cat_title'];?><br></button>  <br> 
             <br>
			 </form>
			 
				   <?php }?>
		   </div>
		  
 <br><br>
            
             <div class="well">
              <h4>Advertisement</h4><br>
            </div>
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Category Wise Articles</h3>
              </div>
              <div class="panel-body">
                <?php
				$mycat = $_SESSION['Cat_id'];
				$query = "select * from article where Article_Cat_id = '".$mycat."' and Artile_visibility = 'Public'";
				$rs = $con->query($query);
				$check = $rs->fetch_assoc();
	
				while($row = $rs->fetch_assoc()){
				
				?>
				<b>Title:<?php echo $row['Article_title'];?></b>
				<p>Desc:<?php echo $row['Article_desc'];?></p>
				<?php }?>
				<?php
	  		if($check['Article_title'] == ''){echo "NO Public Article is found";}
	  ?>
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
if(isset($_POST['cat']))
{
	$_SESSION['Cat_id'] = $_POST['cat'];
	echo $_SESSION['Cat_id'];
	echo"<script>window.open('categories.php','_self') </script>";
}

?>