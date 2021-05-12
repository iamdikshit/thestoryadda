<?php
require("includes/common.php");

?>
<?php
date_default_timezone_set("Asia/Kolkata"); 
if(isset($_POST['submit']))
{

	if(!empty($_POST['daily']) && (!empty('source')))
	{
			$daily  = mysqli_real_escape_string($con,$_POST['daily']);
			$source  = mysqli_real_escape_string($con,$_POST['source']);

			$query = "INSERT INTO daily_update (daily,source,date) VALUES('" . $daily . "','" . $source . "','" . date('Y-m-d h:i:sa') . "')";
			$result = mysqli_query($con, $query) or die(mysqli_error($con));  
			echo"<script>alert('Daily Headlines updated!!! ')</script>";
        	echo("<script>location.href='admin.php'</script>");
 

	}
	else
	{
		 echo"<script>alert('Please Fill the Field...')</script>";
        echo("<script>location.href='admin'</script>");

	}
	
}


?>