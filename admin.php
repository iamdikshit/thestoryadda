<?php
require("includes/common.php");

?>


<?php 
 if(isset($_POST['edit']))
 {
 	$title  = mysqli_real_escape_string($con,$_POST['edit_post']);
 	$query1 = "SELECT * FROM post WHERE title = '" . $title . "'";
    $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));  
    $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    $title = $row1['title'];
    $author = $row1['author'];
    $blog = html_entity_decode($row1['blog']);
    $code  = html_entity_decode($row1['code']);
    $source = html_entity_decode($row1['source']);
    $image_name = $row1['image_name'];
    $brief = $row1['brief'];
    $tags = $row1['tags'];


 }
 else
 {
 	$title = "";
    $author = "";
    $blog = "";
    $code  = "";
    $source = "";
    $image_name = "";
    $brief = "";
 }

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


  <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">



  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="static/style.css">

  <!-- include libraries(jQuery, bootstrap) -->
<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 -->
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<link rel="icon" type="image/png" href="/icon/Logo/favicon1.png"/>

</head>
<body>
	<?php include 'includes/adminheader.php'; ?>

<?php
if (isset($_SESSION['email_id']))
{ ?>

<br><br><br><br>
<!--<marquee><h3 style="color:red;" >Website is in Maintainance Do Not Click Anything in Admin Panel..</h3></marquee>-->
 <div class="container" >
 	<div class="row">
 		<div class="col-lg-12" style="border-radius: 15px;box-shadow: 0 0 20px 0 rgba(0,0,0,0.3);"><br>
 			<form action="upload_post" method="POST" enctype="multipart/form-data">
 				<div class="container">
 					<center><h2>Write Post</h2></center>
 				</div>
				
				<div class="form-group">
					<label style="font-weight: bold;">Title</label>
   					<input type="text" name="title" value="<?php echo($title)?>">
				</div>
				
				<!-- *++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
				
				  <div class="form-group">
                    <label style="font-weight: bold;">Type:</label>
                        <select name="type" id="type">
                            <option value="Post">Post</option>
                            <option value="Report">Report</option>
                         </select>
                  </div>
        <!-- *++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        <div class="form-group">
          <label style="font-weight: bold;">Image Name:</label>
            <input type="text" name="image_name" value="<?php echo($image_name)?>"  pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$">
        </div>   
        <!-- ++++++++++++++++++++++++++++++++++++++ -->
    
    			<div class="form-group">
    				<label style="font-weight: bold;">Editor</label>
					<input type="text" name="author" value="<?php echo($author)?>">
    			</div>

    			<div class="form-group">
    				<label style="font-weight: bold;">Date:</label>
					<input type="Date" name="date" ><br><br>
    			</div>
    			<div class="form-group">
    				<label style="font-weight: bold;">Category:</label>
					<select name="category" id="category">
  						<option value="International">International</option>
  						<option value="Covid19">Covid19</option>
  						<option value="Youth">Youth</option>
 						<option value="Politics">Politics</option>
 						<option value="Culture">Culture</option>
 						<option value="General">General</option>
					</select>
    			</div>
    			
    			 <!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->

                <div  class="form-group">
                    <label for="tags" style="font-weight: bold;">Tags</label>
                    <textarea id="tags" name="tags"  style="height:200px" ><?php echo $tags ; ?></textarea>
                </div>
          <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
    
    			<div  class="form-group">

    				<!-- Addind CK editor -->
					
							
					
    				<label for="blog" style="font-weight: bold;">Blog</label>
    				<!--  <textarea name="editor1"></textarea> -->
    				<textarea id="summernote" name="editor1"  style="height:200px" ><?php echo $blog ; ?></textarea>
    			</div>
    			
    			<!-- +++++++++++++++++++++++++++++++++++++++++++++++ -->

              <div  class="form-group">
            <label for="Brief" style="font-weight: bold;">Brief Discription</label>
           
            <textarea id="brief" name="brief"  style="height:200px" ><?php echo $brief ; ?></textarea>
          </div>
          <!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
          <div  class="form-group">
            <label for="Discussion_Code" style="font-weight: bold;">Discussion Code</label>
           
            <textarea id="code" name="code"  style="height:200px" ><?php echo $code ; ?></textarea>
          </div>
          <div  class="form-group">
            <label for="source" style="font-weight: bold;">News Source</label>
            <p style = 'color:red;'>Enter source in new line but don't give one line space!</p>
           
            <textarea id="source" name="source"  style="height:200px" placeholder='http://www.google.com'><?php echo $source ; ?></textarea>
          </div>
    		

    		

    			<div class="form-group">
    	 			<label style="font-weight: bold;">Upload Photo For Headlines:</label>
		 			<input type="file" name="headlineimage">
    			</div>

    			<div class="form-group">
    				<input type="submit" value="Submit">
   				 </div>

	<br><br>


  </form>
 			
 		</div>
 	</div>
</div>
<br><br>
<!-- ------------------------- 	MANAGEMENT AREA 	------------------------------ -->
 		<div class="container">
 			<div class="row">
 		<div class="col-lg-12" style="border-radius: 15px;box-shadow: 0 0 20px 0 rgba(0,0,0,0.3);"><br>
 			<div class="container">
				<center><h2>Management Area</h2></center>
 			</div>
 			<!-- ------------------------DELETE POST -------------------- -->
 			<div class="container">
 				<!--<br><h4>All POST</h4>-->
 				<h5 style="color: green">Delete Post</h6>

 			</div>
 			<div class="container">
 				<form action="delete_post_script" method="POST">
 				<select id="post_delete" name="post_delete[]" multiple class="form-group">
     				<?php $query = "SELECT * FROM post";
      					  $result = mysqli_query($con, $query) or die(mysqli_error($con));

       						while ($row = mysqli_fetch_array($result)){ ?>

								<option value="<?php echo $row['title'] ?>"><?php echo $row['title'] ?></option>
     				<?php } ?>
  
   				 </select>

   				 <div class="form-group">
    				<input type="submit" value="Delete" name="delete">
   				 </div>
   				 
   				</form>
 			</div><br><br>

 			<!-- +++++++++++++++++++++++++++++EDIT POST+++++++++++++++++++++ -->

 			<div class="container">
 				<!--<br><h4>All POST</h4>-->
 				<h5 style="color: green">Edit Post</h5>
 			</div>
 			<div class="container">
 				<form action="" method="POST">
 				<select id="edit_post" name="edit_post" class="form-group">
     				<?php $query = "SELECT * FROM post";
      					  $result = mysqli_query($con, $query) or die(mysqli_error($con));

       						while ($row = mysqli_fetch_array($result)){ ?>

								<option value="<?php echo $row['title'] ?>"><?php echo $row['title'] ?></option>
     				<?php } ?>
  
   				 </select>

   				 <div class="form-group">
    				<input type="submit" value="Edit" name="edit">
   				 </div>
   				 
   				</form>
 			</div><br><br>

 			<!-- +++++++++++++++++++++++++++++++++++Delete or edit Poll+++++++++++++ -->
 			<div class="container">
 				<!--<br><h4>All POST</h4>-->
 				<h5 style="color: green">Delete or Edit Poll</h5>
 			</div>
 			<div class="container">
 				<form action="edit_delete_pol" method="POST">
 				<select id="polls" name="poll" class="form-group">
     				<?php $query = "SELECT * FROM polls";
      					  $result = mysqli_query($con, $query) or die(mysqli_error($con));

       						while ($row = mysqli_fetch_array($result)){ ?>

								<option value="<?php echo $row['poll_title'] ?>"><?php echo $row['poll_title'] ?></option>
     				<?php } ?>
  
   				 </select>

   				 <div class="form-group">
    				
    				<input type="submit" value="Delete Poll" name="delete_poll">
   				 </div>
   				 
   				</form>
 			</div><br><br>
 				
 				
 				<!-- --------------------------------- create poll -----------------	 -->

 				<div class="container">
 				<!--<br><h4>All POST</h4>-->
 				<h5 style="color: green">Create Poll</h6>

 			</div>
 			<div class="container">
 				<form action="create_poll" method="POST">
 				<select id="polls" name="poll" class="form-group">
     				<?php $query = "SELECT * FROM post";
      					  $result = mysqli_query($con, $query) or die(mysqli_error($con));

       						while ($row = mysqli_fetch_array($result)){ ?>

								<option value="<?php echo $row['title'] ?>"><?php echo $row['title'] ?></option>
     				<?php } ?>
  
   				 </select>

   				 <div class="form-group">
    				<input type="submit" value="Create Poll" name="create_poll">
   				 </div>
   				 
   				</form>
 			</div><br><br>

<!-- ++++++++++++++++++++++++++++++ Delete Daily Stories ++++++++++++++++++++++++++ -->

        <div class="container">
        <!-- <br><h4>All POST</h4> -->
        <h6 style="color: green; font-weight: bold;">Delete Daily stories</h6>

      </div>
      <div class="container">
        <form action="delete_daily_stories" method="POST">
        <select id="" name="daily_stories_delete[]" multiple class="form-group">
            <?php $query_sql1 = "SELECT * FROM daily_update";
                  $result_sql1 = mysqli_query($con, $query_sql1) or die(mysqli_error($con));

                  while ($row_sql1 = mysqli_fetch_array($result_sql1)){ ?>

                <option value="<?php echo $row_sql1['daily'] ?>"><?php echo $row_sql1['daily'] ?></option>
            <?php } ?>
  
           </select>

           <div class="form-group">
            <input type="submit" value="Delete stories" name="delete_stories">
           </div>
           
          </form>
      </div><br><br>

<!-- +++++++++++++++++++++++++++++++++++++++++++++ End +++++++++++++++++++++++++++++++++++++ -->
 	</div>
</div> 
</div>
</div>

 	
<!-- ------------------------- 	HEADLINE ACTIVATION 	------------------------------ -->

<br><br>

 <div class="container">
 	<div class="row">
 		<div class="col-lg-12" style="border-radius: 15px;box-shadow: 0 0 20px 0 rgba(0,0,0,0.3);">

  <form action="activate_headlines" method="POST">
  	<br><h3>Activate Headlines</h3>
	<br>
	<div class="form-group">
    <label for="Headlines" style="font-weight: bold;">Headlines</label><br>
    <label for="instuctions" style="color: red;">ctrl + select</label>
  		<select id="Headlines" name="post_headlines[]" multiple class="form-group">
     <?php $query = "SELECT * FROM post WHERE type = 'Post'  ORDER BY  id DESC ";
       $result = mysqli_query($con, $query) or die(mysqli_error($con));

       while ($row = mysqli_fetch_array($result)){ ?>

			<option value="<?php echo $row['title'] ?>"><?php echo $row['title'] ?></option>
     <?php } ?>
  
    </select>
	</div>
  
	<div class="form-group">
    <input type="submit" name="submit" value="Activate Headlines">
 	</div>

  </form><br><br>

 		</div>
 		
 	</div>
</div> 
<br><br>
<!-- +++++++++++++++++++++++++++++++++++++ Daily Update +++++++++++++++++++++ -->

<div class="container">
  <div class="row">
    <div class="col-lg-12" style=" border-radius: 15px;box-shadow: 0 0 20px 0 rgba(0,0,0,0.3);">
     <br><h3>Daily updates</h3>
  <form action="daily_update" method="POST">
    
  <br>
  <div class="form-group">
          <label style="font-weight: bold;">Daily Headlines</label>
            <input type="text" name="daily" >
        </div>
    
          <div class="form-group">
            <label style="font-weight: bold;">Source</label>
          <input type="text" name="source" >
          </div>

          <div class="form-group">
           <input type="submit" name="submit" value="Daily Update">
        </div>

  </form><br><br>

    </div>
    
  </div>
</div> 
<br>
 <!--+++++++++++++++++++++++++++++++++++++ Meta tag Editor +++++++++++++++++++++ -->


<div class="container">
      <div class="row">
    <div class="col-lg-12" style=" border-radius: 15px;box-shadow: 0 0 20px 0 rgba(0,0,0,0.3);">
 				<!--<br><h4>All POST</h4>-->
 				<br>
 				<h5 style="color: green">SEO Editor</h5>
 		
 			<div class="container">
 				<form action="seo" method="POST">
 				<select id="meta_tag" name="meta_tag" class="form-group">
     				<?php $query = "SELECT * FROM post";
      					  $result = mysqli_query($con, $query) or die(mysqli_error($con));

       						while ($row = mysqli_fetch_array($result)){ ?>

								<option value="<?php echo $row['title'] ?>"><?php echo $row['title'] ?></option>
     				<?php } ?>
  
   				 </select>

   				 <div class="form-group">
    				<input type="submit" value="Add SEO" name="tag">
   				 </div>
   				 
   				</form>
 			</div>
 			  </div>
</div> 
	</div>

<!--<div class="container">-->
<!--  <div class="row">-->
<!--    <div class="col-lg-12" style=" border-radius: 15px;box-shadow: 0 0 20px 0 rgba(0,0,0,0.3);">-->
<!--     <br><h3>Meta tag Editor</h3>-->
<!--  <form action="meta_tag_update" method="POST">-->
    
<!--  <br>-->
<!--  <div class="form-group">-->
<!--          <label style="font-weight: bold;">Title Tag</label>-->
<!--            <input type="text" name="daily" >-->
<!--        </div>-->
    
<!--          <div class="form-group">-->
<!--            <label style="font-weight: bold;">Meta tag</label>-->
<!--          <textarea id="meta_tag" name="meta_tag"  style="height:200px" ></textarea>-->
<!--          </div>-->

<!--          <div class="form-group">-->
<!--           <input type="submit" name="submit" value="Add Meta Tag">-->
<!--        </div>-->

<!--  </form><br><br>-->

<!--    </div>-->
    
<!--  </div>-->
<!--</div> -->




<?php } else
{ ?>
 echo("<script>location.href='admin_login'</script>");

<?php }?>


<br><br>		
<?php
require("includes/footer.php");
?>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>

</body>
</html>