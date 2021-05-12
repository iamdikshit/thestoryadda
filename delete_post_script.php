<?php
require("includes/common.php");

?>



<?php
	if(isset($_POST['delete']))
	{
			if(isset($_POST['post_delete']))
			{
			    $post_delete = mysqli_real_escape_string($con, filter_input(INPUT_POST,'post_delete'));
				
				foreach ($_POST['post_delete'] as $post_delete)
         			{
         				$query = "SELECT * FROM post WHERE title = '" . $post_delete . "'";
       					$result = mysqli_query($con, $query) or die(mysqli_error($con));  
        				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        				$post_id = $row['id'];

        				$query2 = "DELETE FROM headlines WHERE post_id ='$post_id' "; 
          				mysqli_query($con, $query2) or die(mysqli_error($con));

						      $query3 = "DELETE FROM post WHERE title ='$post_delete' ";
          				mysqli_query($con, $query3) or die(mysqli_error($con));
				  	}
                echo"<script>alert('Post is deleted')</script>";
         			 	echo("<script>location.href='admin'</script>");
			}
      else
        {
          echo"<script>alert('Please select post to delete')</script>"; 
          echo("<script>location.href='admin'</script>");
        }
	}

?>
