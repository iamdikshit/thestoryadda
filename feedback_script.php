<?php
require("includes/common.php");

?>

<?php 

if(isset($_POST['submit']))
{
  date_default_timezone_set("Asia/Calcutta");
  
  $first_name = mysqli_real_escape_string($con, filter_input(INPUT_POST,'first_name'));
  $last_name = mysqli_real_escape_string($con, filter_input(INPUT_POST,'last_name')); 
  $email = mysqli_real_escape_string($con, filter_input(INPUT_POST,'email')); 
  $phone = mysqli_real_escape_string($con, filter_input(INPUT_POST,'phone'));
  $subject = mysqli_real_escape_string($con, filter_input(INPUT_POST,'subject'));
  $message = mysqli_real_escape_string($con, filter_input(INPUT_POST,'message'));
  $date =  date("Y/m/d");

  $query1 = "INSERT INTO contact_us (first_name,last_name,email,phone,subject,message,date) VALUES('" . $first_name . "','". $last_name ."','". $email ."','" . $phone . "','" . $subject . "','". $message ."','" . $date . "')";
   		mysqli_query($con, $query1) or die(mysqli_error($con));


		echo"<script>alert('Thank you for Review...')</script>";
        echo("<script>location.href='../'</script>");

}
else
{
	echo("<script>location.href='review'</script>");
}




 ?>