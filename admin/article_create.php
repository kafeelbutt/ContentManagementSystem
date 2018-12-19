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
      <form method="post" action="article_create.php">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Article</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Article Title</label>
          <input type="text" name="a_title" class="form-control" placeholder="Enter Article Title">
        </div>
		<div class="form-group">
		<!--cat select-->
		 <label>Select Article Category</label>
		 <form>
  <table>
    <tr>
	  <td>
	  <?php 
			  $query = "select * from category";
			   $rs = $con->query($query);
			   $i=0;
		    while($row = $rs->fetch_array())
			{		   
			   $Cat_title[$i] = $row[1];
			   $i++;
			}
	      ?>
		 <?php
echo "<select name = 'category' >";
for ($i = 0; $i < count($Cat_title);  $i++) {  
echo "<option value='$Cat_title[$i]'>$Cat_title[$i]</option>";}
echo "</select>";
?> 
	  </td>
	</tr>
  </table>
  </form> 
  </body>
  </html>
		<!--cat end -->
		<br>
		<div class="form-group">
          <label>OR Create New Category</label>
          <input type="text" name = "cat_name" class="form-control" placeholder="Enter Article Category">
        </div>
		<div class="form-group">
          <label>Category Description</label>
          <input type="text" name = "cat_desc"class="form-control" placeholder="Enter Category Description">
        </div>
		
		<div class="form-group">
		<!--Author select-->
		 <label>Select Article Author</label>
		 </div>
  <table>
    <tr>
	  <td>
	  <?php 
			  $query = "select * from author";
			   $rs = $con->query($query);
			   $i=0;
		    while($row = $rs->fetch_array())
			{		   
			   $Author_title[$i] = $row[1];
			   $i++;
			}
	      ?>
		 <?php
echo "<select name = 'author_select' >";
for ($i = 0; $i < count($Author_title);  $i++) {  
echo "<option value='$Author_title[$i]'>$Author_title[$i]</option>";}
echo "</select>";
?> 
	  </td>
	</tr>
  </table>
		<div class="form-group">
          <label>OR Create  Article Author</label>
		  
          <input type="text" name="a_author" class="form-control" placeholder="Enter Author Name">
        </div>
	    <div class="form-group">
          <label>Article Author Description</label>
		  
          <input type="text" name="a_author_desc" class="form-control" placeholder="Enter Author Description">
        </div>
        <div class="form-group">
          <label>Article Description</label>
          <textarea name="editor1"  class="form-control" placeholder="Article Description"></textarea>
        </div>
        <div class="form-group">
          <label>Article Visibility</label><br>
            <select name="visibilty">
			 <option> Public</option>
			 <option> Private</option>
			</select>
          
        </div>
        <div class="form-group">
          <label>SEO Title</label>
          <input type="text" name="meta_title"class="form-control" placeholder="Add Some Tags...">
        </div>
        <div class="form-group">
          <label>SEO Description</label>
          <input type="text" name = "meta_desc"class="form-control" placeholder="Add Meta Description...">
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
	$a_title = $_POST['a_title'];
	$cat_name = $_POST['cat_name'];
	$cat_desc = $_POST['cat_desc'];
	$a_author = $_POST['a_author'];
	$a_author_desc = $_POST['a_author_desc'];
	$editor1 = $_POST['editor1'];
	$Meta_title = $_POST['meta_title'];
	$Meta_desc = $_POST['meta_desc'];
	$Select_cat = $_POST['category'];
	$Select_author = $_POST['author_select'];
	$visibilty = $_POST['visibilty'];
	$con = new mysqli("localhost","root","hamza");
	$con->select_db("cms_test_2");
	
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
	 $con->query($query);
	 }
	 }
	 if($a_author != '')
	 {
		 $Select_author = $a_author;
		 $con = new mysqli("localhost","root","hamza");
	          $con->select_db("cms_test_2");
$query = "INSERT INTO author(Author_name,Author_desc)
  VALUES ('".$Select_author ."','".$a_author_desc."')";
		   $con->query($query);
	 }
	 
	
// Get Category id by Title
$con = new mysqli("localhost","root","hamza","cms_test_2");
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

//echo $a_title." ".$editor1." ".$cat_id." ".$Author_id." ".$Meta_title." ".$Meta_desc." ".$Admin_id." ".$visibilty." ".$pub_type;
$con = new mysqli("localhost","root","hamza","cms_test_2");
	$query = "INSERT INTO article(Article_title,Article_desc,Article_cat_id,Article_author_id,Article_title_meta, Article_desc_meta,Article_publisher_id,Artile_visibility,Article_publisher_type) 
 VALUES ('".$a_title."','".$editor1."','".$cat_id."','".$Author_id."','".$Meta_title."','".$Meta_desc."','".$Admin_id."','".$visibilty."','".$pub_type."')";
    $rs = $con->query($query);
	if($rs == 1 )
	  {
		     echo "<script>window.open('admin_index.php?Record inserted Successfully','_self')</script>";
	  }
   }
   
?>
