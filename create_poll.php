<?php
require("includes/common.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Poll</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


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

</head>
<body>
 <?php
require("includes/head.php");
?>
<br><br><br><br>
<?php 
 if(isset($_POST['create_poll']))
 { 
 ?>
 <?php
 	if(!empty($_POST['poll']))
 	{ 
 		$poll = mysqli_real_escape_string($con,$_POST['poll']);

 		$query = "SELECT * FROM post WHERE title = '" . $poll . "'";
  		$result = mysqli_query($con, $query) or die(mysqli_error($con));  
  		$row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
   		$post_id = $row['id'];

 ?>

 <?php

      $query1 = "SELECT * FROM polls WHERE post_id = '" . $post_id . "'";
      $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));  
      $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
      $count1 = mysqli_num_rows($result1);

      if($count1==1)
      { 

        echo"<script>alert('Poll is Already Created')</script>";
        echo("<script>location.href='admin'</script>");

 ?>

 <?php
      }
      else
      {
   ?>

 		<div class="container">
 			<div class="container" style="border: solid;">
 				<center><h2>Create Poll</h2></center>
 			</div><br><br>
 			<form action="create_poll_script" method="POST">
 				<div class="form-group">
 					<label style="color: black;font-weight: bold;">Post_ID:</label>
 					<input type="text" name="id" value="<?php echo $post_id ?>" readonly>
 				</div>
 				<div class="form-group">
 					<label style="color: black;font-weight: bold;">Title:</label>
 					<input type="text" name="title" value="<?php echo $poll ?>">
 				</div>
 				<div class="form-group">
 					<label style="color: black;font-weight: bold;">Description:</label>
 					<input type="text" name="description">
 				</div>
 				<div class="form-group">
 					<label style="color: black;font-weight: bold;">Answers:</label>
 					<textarea name="answer" placeholder="Write all the option line by line. " style="height:200px" ></textarea>
 				</div>
 				<div class="form-group">
    				<input type="submit" name="create" value="create" >
   				 </div>
 			</form>
 		</div>

    <?php
        }
      ?>



  <?php
	}
	else
	{
	
		echo"<script>alert('Please Select Post to create Poll')</script>";
        echo("<script>location.href='admin.php'</script>");

	}

	?>
 <?php
   }
?>
</body>
</html>