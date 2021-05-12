<?php
require("includes/common.php");

?>
<?php
if(!empty($_POST['answer']))
{
  $title = mysqli_real_escape_string($con, filter_input(INPUT_POST,'title'));
  $post_id = mysqli_real_escape_string($con, filter_input(INPUT_POST,'id')); 
  $description = mysqli_real_escape_string($con, filter_input(INPUT_POST,'description'));
  $total_vote = 0; 
  



  $query = "INSERT INTO polls (post_id,poll_title,description,total_vote) VALUES('" . $post_id . "','". $title ."','". $description ."','". $total_vote ."')";
   		mysqli_query($con, $query) or die(mysqli_error($con));
   		$vote = 0;
   		$answer = isset($_POST['answer']) ? explode(PHP_EOL, $_POST['answer']) : '';
   		foreach ($answer as $answer) {
   			if(empty($answer))
   			{
   				continue;
   			}
   			 $query1 = "INSERT INTO poll_answer (poll_id,title,vote) VALUES('" . $post_id . "','". $answer ."','". $vote ."')";
   			mysqli_query($con, $query1) or die(mysqli_error($con));

   		}

   		echo"<script>alert('Poll is created!!!')</script>";
        echo("<script>location.href='admin'</script>");

}
?>
