<?php
require("includes/common.php");

?>



<?php
	if(isset($_POST['delete_stories']))
	{
			if(isset($_POST['daily_stories_delete']))
			{
				
				foreach ($_POST['daily_stories_delete'] as $daily_stories_delete)
         			{
         				
        				$query2 = "DELETE FROM daily_update WHERE daily ='$daily_stories_delete' ";
          				mysqli_query($con, $query2) or die(mysqli_error($con));

						    
				  	}
                echo"<script>alert('Daily Stories is deleted')</script>";
         			 	echo("<script>location.href='admin'</script>");
			}
      else
        {
          echo"<script>alert('Please select the stories to delete')</script>"; 
          echo("<script>location.href='admin'</script>");
        }
	}

?>
