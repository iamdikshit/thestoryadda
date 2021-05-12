<?php
require("includes/common.php");

?>

<?php
 if(isset($_POST['id']))
        { 

        	$id = mysqli_real_escape_string($con,$_POST['id']);

          

         	$query = "SELECT * FROM poll_answer WHERE id = '" . $id . "'";
  			$result = mysqli_query($con, $query) or die(mysqli_error($con));  
  			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  			$vote = $row['vote'];
        $poll_id = $row['poll_id'];
        $_SESSION['clicked'] = $poll_id;
        $new_vote = $vote + 1;

          $query2 = "SELECT * FROM polls WHERE post_id = '" . $poll_id . "'";
        $result2 = mysqli_query($con, $query2) or die(mysqli_error($con));  
        $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
        $total_vote = $row2['total_vote'];
        $new_total_vote = $total_vote + 1;

  			
        

       $query1 = "UPDATE poll_answer SET
   							 vote='$new_vote'
   							 WHERE id = '$id' ";

        

   		mysqli_query($con, $query1) or die(mysqli_error($con));

      $query3 = "UPDATE polls SET
                 total_vote='$new_total_vote'
                 WHERE post_id = '$poll_id'";

      mysqli_query($con, $query3) or die(mysqli_error($con));

        echo("<script>location.href='result/$poll_id'</script>");
}

?>