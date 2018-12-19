<?php
session_start();
if(!$_SESSION['A_email'])
	header('location:login.php?error=You must enter user details');
           //
		   $Admin_email = $_SESSION['A_email'];
  // Start Connection
              $con = new mysqli("localhost","root","hamza");
	          $con->select_db("cms_test_2");
			  $Admin_id = $_SESSION['A_id'];
                
?>
<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  <!--<script src="my.js"></script> -->
  </head>
<body>
    <!-- Modals -->

    <!-- Add Page -->

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="create_cat.php">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Category</h4>
      </div>
      <div class="modal-body">
		<div class="form-group">
          <label>Create New Category</label>
          <input type="text" name = "cat_name" class="form-control" placeholder="Enter Article Category" required>
        </div>
		<div class="form-group">
          <label>Category Description</label>
          <input type="text" name = "cat_desc"class="form-control" placeholder="Enter Category Description" required >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="submitnow" class="btn btn-primary">Save changes</button>
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
  if(isset($_POST['submitnow']))
   {
	 
	 
    $con = new mysqli("localhost","root","hamza");
	$con->select_db("cms_test_2");
	$cat_name = $_POST['cat_name'];
	$cat_desc = $_POST['cat_desc'];
	
	if($cat_name != '')
	 {
		 $Select_cat = $cat_name;
		 $con = new mysqli("localhost","root","hamza");
	          $con->select_db("cms_test_2");
$query = "select Cat_title from category where Cat_title = '".$Select_cat."' ";		  
$rs = $con->query($query);
           if($rs->num_rows>0)
		   {
			   echo "Category already Exist";
			   exit();
		   }else{
$query = "INSERT INTO category(Cat_title, Cat_desc, Cat_created_by)
  VALUES ('".$Select_cat ."','".$cat_desc."','".$Admin_id."')";
	$rs =  $con->query($query);
	 }
	 }

	if($rs == 1 )
	  {
		     echo "<script>window.open('admin_index.php?Record inserted Successfully','_self')</script>";
	  }
   }
   
?>
