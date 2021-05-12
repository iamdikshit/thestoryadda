<?php
require("includes/common.php");

?>

<?php
    
    if(isset($_POST["edit"]))
    {
        $id = mysqli_real_escape_string($con, filter_input(INPUT_POST,'id'));
         $title_tag = mysqli_real_escape_string($con, filter_input(INPUT_POST,'title_tag'));
        $meta_tag = mysqli_real_escape_string($con, filter_input(INPUT_POST,'meta_tag')); 
        
        // $title_tag = htmlentities($title_tag);
        // $meta_tag = htmlentities($meta_tag);
        
        $query4 = "UPDATE seo_tags SET 
          								title_tag = '$title_tag',
          								meta_tag = '$meta_tag'
          								WHERE id = '$id'";
      mysqli_query($con, $query4) or die(mysqli_error($con));
      
      echo"<script>alert(' Tags is Updated in database successfully')</script>";
        echo("<script>location.href='admin.php'</script>");
        
        
    }
    elseif(isset($_POST['add']))
    {
        $post_id = mysqli_real_escape_string($con, filter_input(INPUT_POST,'id'));
         $title_tag = mysqli_real_escape_string($con, filter_input(INPUT_POST,'title_tag'));
        $meta_tag = mysqli_real_escape_string($con, filter_input(INPUT_POST,'meta_tag')); 
        
        // $title_tag = htmlentities($title_tag);
        // $meta_tag = htmlentities($meta_tag);
        
        $query1 = "INSERT INTO seo_tags (post_id,title_tag,meta_tag) VALUES('" . $post_id . "','". $title_tag ."','". $meta_tag ."')";
   		mysqli_query($con, $query1) or die(mysqli_error($con));
   		
   		 echo"<script>alert('Tag is Stored in database successfully')</script>";
        echo("<script>location.href='admin.php'</script>");
        
    }
    else{
        echo("<script>location.href='admin.php'</script>");
        
    }
?>