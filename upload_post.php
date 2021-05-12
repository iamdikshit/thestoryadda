<?php
require("includes/common.php");

?>

<?php
function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
}

?>
<?php

  // session_start();
  date_default_timezone_set("Asia/Kolkata"); 

 
  $title = mysqli_real_escape_string($con, filter_input(INPUT_POST,'title'));
  $author = mysqli_real_escape_string($con, filter_input(INPUT_POST,'author')); 
  $category = mysqli_real_escape_string($con, filter_input(INPUT_POST,'category')); 
  $date = mysqli_real_escape_string($con, filter_input(INPUT_POST,'date'));
  $blog = mysqli_real_escape_string($con, filter_input(INPUT_POST,'editor1'));
  $code = mysqli_real_escape_string($con, filter_input(INPUT_POST,'code'));
  $source = mysqli_real_escape_string($con, filter_input(INPUT_POST,'source'));

  $image_name = mysqli_real_escape_string($con, filter_input(INPUT_POST,'image_name'));
  $brief = mysqli_real_escape_string($con, filter_input(INPUT_POST,'brief'));
  
  $tags = mysqli_real_escape_string($con, filter_input(INPUT_POST,'tags'));
  $type = mysqli_real_escape_string($con, filter_input(INPUT_POST,'type')); 



  $post_url = create_slug($title);
  $blog = htmlentities($blog);
  $code = htmlentities($code);
  $source = htmlentities($source);
  
  $query5 = "SELECT * FROM post WHERE title = '" . $title . "'";
  $result5 = mysqli_query($con, $query5) or die(mysqli_error($con));  
  $row5 = mysqli_fetch_array($result5, MYSQLI_ASSOC);
   $count5 = mysqli_num_rows($result5);  
   $id = $row5['id'];

   
  
  $timestamp = time();
  $upload_time = date("h:i:s A", $timestamp);
  $activation = 0;

     function GetImageExtension($imagetype){
    if(empty($imagetype)) return false;
    switch($imagetype){
    case 'image/bmp': return '.bmp';
    case 'image/gif': return '.gif';
    case 'image/jpeg': return '.jpg';
    case 'image/png': return '.png';
    default: return false;
    }
    }

    if($count5 == 1)
   {

   
// -----------------------------------------------------------------------
   		$query1 = "UPDATE post SET
   							 title='$title',
   							 author ='$author',
   							 category ='$category',
   							 date ='$date',
   							 blog ='$blog',
   							 upload_time ='$upload_time',
   							 post_url ='$post_url',
                             code = '$code',
                             source = '$source',
                             image_name = '$image_name',
                             brief = '$brief',
                             tags ='$tags',
                             type = '$type'
   							 WHERE id = '$id' ";

   		mysqli_query($con, $query1) or die(mysqli_error($con));

// --------------------------------------------------------------------------

  // Make a query to save data to your database.
        $query = "SELECT * FROM post WHERE upload_time = '" . $upload_time . "'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $post_id = $row['id'];

// ----------------------------------------------------------------------------------


 


   if (!empty($_FILES["headlineimage"]["name"])) {
      $file_name=$_FILES["headlineimage"]["name"];
      $temp_name=$_FILES["headlineimage"]["tmp_name"];
      $imgtype=$_FILES["headlineimage"]["type"];
      $ext= GetImageExtension($imgtype);
      $imagename=$image_name.$ext;
      $target_path = "headlines_image/".$imagename;
      if(move_uploaded_file($temp_name, $target_path)){
        // Make a query to save data to your database.

      $query4 = "UPDATE headlines SET
          								headline_image = '$imagename'
          								WHERE post_id = '$post_id'";
      mysqli_query($con, $query4) or die(mysqli_error($con));
  		}
		}
      
      
        echo"<script>alert('Post is Updated in database successfully')</script>";
        echo("<script>location.href='admin.php'</script>");

   }
   else
   {

   	
// -----------------------------------------------------------------------
   		$query1 = "INSERT INTO post (title,author,category,date,blog,upload_time,post_url,code,source,image_name,brief,tags,type) VALUES('" . $title . "','". $author ."','". $category ."','" . $date . "','" . $blog . "','". $upload_time ."','" . $post_url . "','" . $code . "','" . $source . "','" . $image_name . "','" . $brief . "','". $tags ."','" . $type . "')";
   		mysqli_query($con, $query1) or die(mysqli_error($con));

// --------------------------------------------------------------------------

  // Make a query to save data to your database.
        $query = "SELECT * FROM post WHERE upload_time = '" . $upload_time . "'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $post_id = $row['id'];

// ----------------------------------------------------------------------------------




   if (!empty($_FILES["headlineimage"]["name"])) {
      $file_name=$_FILES["headlineimage"]["name"];
      $temp_name=$_FILES["headlineimage"]["tmp_name"];
      $imgtype=$_FILES["headlineimage"]["type"];
      $ext= GetImageExtension($imgtype);
      $imagename=$image_name.$ext;
      $target_path = "headlines_image/".$imagename;
      if(move_uploaded_file($temp_name, $target_path)){
        // Make a query to save data to your database.
      $query4 = "INSERT INTO headlines (post_id,post_title,headline_image,activation) VALUES('" . $post_id . "','" . $title . "','". $imagename ."','". $activation ."')";
      mysqli_query($con, $query4) or die(mysqli_error($con));

  		echo"<script>alert('Post is Uploaded in database successfully')</script>";
        echo("<script>location.href='admin.php'</script>");


  		}
		}
      
      
      
     


   }
 
    

    ?>