<?php
require("includes/common.php");
?>
<?php

  if(isset($_POST['delete_poll']))
  {
      if(isset($_POST['poll']))
      { 
            $poll = $_POST['poll'];
        
                $query = "SELECT * FROM polls WHERE poll_title = '" . $poll . "'";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));  
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $post_id = $row['post_id'];

                $query2 = "DELETE FROM polls WHERE post_id ='$post_id' ";
                  mysqli_query($con, $query2) or die(mysqli_error($con));

                  $query3 = "DELETE FROM poll_answer WHERE poll_id ='$post_id' ";
                  mysqli_query($con, $query3) or die(mysqli_error($con));
            
                echo"<script>alert('Poll is deleted')</script>";
                echo("<script>location.href='admin'</script>");
      }
      else
        {
          echo"<script>alert('Please select post to delete')</script>"; 
          echo("<script>location.href='admin'</script>");
        }
  }

?>


