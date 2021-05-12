<?php
require("includes/common.php");

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Page SEO Editor</title>
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
<!--<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">-->
<!--<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>-->

<link rel="icon" type="image/png" href="/icon/Logo/favicon1.png"/>

</head>
<body>
    	<?php include 'includes/adminheader.php'; ?>
<br><br><br>
<?php
    
    if(isset($_POST['tag']))
    {
?>
    
<?php 
        if(isset($_POST['meta_tag']))
        {
        ?>
        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php
            $title  = mysqli_real_escape_string($con,$_POST['meta_tag']);
            $query1 = "SELECT * FROM post WHERE title = '" . $title . "'";
            $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));  
            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
            $post_id = $row1['id'];
            
             $query = "SELECT * FROM seo_tags WHERE post_id = '" . $post_id . "'";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);  
            
        ?>
        
        <?php
        
            if($count==1)
            {
        ?>
        
            <div class="container">
  <div class="row">
    <div class="col-lg-12" style=" border-radius: 15px;box-shadow: 0 0 20px 0 rgba(0,0,0,0.3);">
     <br><h3>SEO Editor</h3>
    <br><p><?php echo $row1['title'] ; ?></p>
  <form action="seo_script" method="POST">
    
  <br>
  <div class="form-group">
 	<label style="color: black;font-weight: bold;">ID:</label>
 	<input type="text" name="id" value="<?php echo $row['id'] ?>" readonly>
 	</div>
  <div class="form-group">
          <label style="font-weight: bold;">Title Tag</label>
            <input type="text" name="title_tag" value = "<?php echo $row['title_tag']; ?>" >
        </div>
    
          <div class="form-group">
            <label style="font-weight: bold;">Meta tag</label>
          <textarea id="meta_tag" name="meta_tag"  style="height:200px" ><?php echo $row['meta_tag']; ?></textarea>
          </div>

          <div class="form-group">
           <input type="submit" name="edit" value="Update">
        </div>

  </form><br><br>

    </div>
    
  </div>
</div> 
            
        
        <?php
            }
            
            else
            {
        ?>
                 <div class="container">
  <div class="row">
    <div class="col-lg-12" style=" border-radius: 15px;box-shadow: 0 0 20px 0 rgba(0,0,0,0.3);">
     <br><h3>SEO Editor</h3>
     <br><p><?php echo $row1['title'] ; ?></p>
  <form action="seo_script" method="POST">
    
  <br>
   <div class="form-group">
 	<label style="color: black;font-weight: bold;">Post_ID:</label>
 	<input type="text" name="id" value="<?php echo $row1['id'] ?>" readonly>
 	</div>
  <div class="form-group">
          <label style="font-weight: bold;">Title Tag</label>
            <input type="text" name="title_tag"  >
        </div>
    
          <div class="form-group">
            <label style="font-weight: bold;">Meta tag</label>
          <textarea id="meta_tag" name="meta_tag"  style="height:200px" ></textarea>
          </div>

          <div class="form-group">
           <input type="submit" name="add" value="Update">
        </div>

  </form><br><br>

    </div>
    
  </div>
</div> 
                
                            
            <?php
            }
            ?>
            
            <!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
 <?php
        }
        
        ?>
     
     
<?php  
    } 
    ?>

?>
</body>
</html>