<?php
require("includes/common.php");

?>
<?php 
     $deactivating = 0;
     $activating = 1;
		if(isset($_POST['submit']))
		{ 

      $query = "SELECT * FROM headlines ";
      $result = mysqli_query($con, $query) or die(mysqli_error($con));
       
      while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        
        $query2 = "UPDATE headlines SET activation=$deactivating WHERE id ='$id' ";
        mysqli_query($con, $query2) or die(mysqli_error($con));
       
      }




			if(isset($_POST['post_headlines']))
			{
				
				$post_headlines = mysqli_real_escape_string($con, filter_input(INPUT_POST,'post_headlines'));
				foreach ($_POST['post_headlines'] as $headlines)
         {
					$query2 = "UPDATE headlines SET activation=$activating WHERE post_title ='$headlines' ";
          mysqli_query($con, $query2) or die(mysqli_error($con));
				  }

          echo"<script>alert('Headline is Activated')</script>";
          echo("<script>location.href='admin'</script>");
			}
      else
        {
          echo"<script>alert('Please Select Headline to activte!')</script>";
          echo("<script>location.href='admin'</script>");
        }
		}


		// // $title = mysqli_real_escape_string($con, filter_input(INPUT_POST,'Post'));
		// $title = $_POST['Post'];
		// // echo $title;

 	// 	$query = "SELECT * FROM post WHERE activation = 1";
  //      	$result = mysqli_query($con, $query) or die(mysqli_error($con));  
  //       $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
  //       $count = mysqli_num_rows($result);
  //       $id = $row['id'];
  //       $deactivating = 0;
  //       $activating = 1;

  //       if($count == 1)
  //       {	# deactivating the post setting activation value = 0
  //       	$query2 = "UPDATE post SET activation=$deactivating WHERE id = $id";
  //     		mysqli_query($con, $query2) or die(mysqli_error($con));


  //     		# activating the post which admin choosen by setting activation valur = 1.
  //     		$query3 = "UPDATE post SET activation=$activating WHERE title = '" . $title . "'";
  //     		mysqli_query($con, $query3) or die(mysqli_error($con));

  //     		echo"<script>alert('Post is Activated')</script>";
  //       	echo("<script>location.href='admin.php'</script>");


  //       }
  //       else
  //       {
  //       	# activating the post which admin choosen by setting activation valur = 1.
  //     		$query3 = "UPDATE post SET activation=$activating WHERE title='" . $title . "'";
  //     		mysqli_query($con, $query3) or die(mysqli_error($con));

  //     		echo"<script>alert('Post is Activated')</script>";
  //       	echo("<script>location.href='admin.php'</script>");
  //       }



 ?>