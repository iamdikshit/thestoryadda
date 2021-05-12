<?php
require("includes/common.php");

?>

<!--++++++++++++++++++++++++++ google sign +++++++++++++++++++++++-->
<?php

//index.php

//Include Configuration File
include('config.php');

$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['given_name']))
  {
   $first_name = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $last_name = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $email = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $gender = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $picture = $data['picture'];
  }
  $token = $_SESSION['access_token'] ;
  $sql = "select * from user where email = '$email' ";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result); 
        echo $gender;
        
        if($count==0)
        {
            	$query1 = "INSERT INTO user (token,first_name,last_name,email,gender,picture) VALUES('" . $token . "','". $first_name ."','". $last_name ."','" . $email . "','" . $gender . "','". $picture ."')";
   		            mysqli_query($con, $query1) or die(mysqli_error($con));
   		            
   		            
        }
        
        $_SESSION['email']= $email;
 }
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
 //Create a URL to obtain user authorization
 $login_button = '<a href="'.$google_client->createAuthUrl().'"><center><img style = "width:30%; hieght:30%;" src="../icon/Login.png" /></center></a>';
}

?>

<!-- +++++++++++++++++++++++++++++++++++++++ end +++++++++++++++++++++++++++++++ -->

<!DOCTYPE html>
<html>
<head>
	<title>result</title>
	<!--+++++++++++++++++++++++++ Google ads ++++++++++++++++++++++++-->
<script data-ad-client="ca-pub-7925103159748512" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!--++++++++++++++++++++++++++++++++ End ++++++++++++++++++++++++++++-->

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../fonts/icomoon/style.css">



  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/jquery-ui.css">
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">

  <link rel="stylesheet" href="../css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="../css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="../css/aos.css">
  <link href="../css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../static/style.css">
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-172918604-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-172918604-1');
</script>


<!--------------------------- Favicon -------------------------------->
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

<!-------------------------------- Favicon end ------------------------------>


<?php
require("includes/post_head.php");
?>
</head>
<body>
    
        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content" style="border-radius: 0.9rem;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="user_login" method="POST">
        
          <div>
          <?php echo $login_button; ?>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
      
    </div>
  </div>
</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<br><br><br>

<?php

	if (isset($_GET['poll_id'])) 
	{
	?>
	

	<?php	$post_id = mysqli_real_escape_string($con,$_GET['poll_id']);


         	$query = "SELECT * FROM polls WHERE post_id = '" . $post_id . "'";
  			$result = mysqli_query($con, $query) or die(mysqli_error($con));  
  			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  			$title = $row['poll_title'];

  			$query1 = "SELECT * FROM poll_answer WHERE poll_id = '" . $post_id . "'";
  			$result1 = mysqli_query($con, $query1) or die(mysqli_error($con));  

  			$total_votes = 0;
  			while ($row1 = mysqli_fetch_array($result1)) {
  				
  				$total_votes = $total_votes + $row1['vote'];
  			}

  	?>

  		<?php
  				$query2 = "SELECT * FROM poll_answer WHERE poll_id = '" . $post_id . "'";
  				$result2 = mysqli_query($con, $query2) or die(mysqli_error($con)); 
  		?>
  	<br>
  	<div class="container">
  		<div class="row">
  			<div class="col-lg-3"></div>
  			<div class="col-lg-6" >
  				<br>
  				<div class="container" style="background-color: #000; border-radius: 20px;">
  				<center><h1 style="color: white; ">Result</h1></center>
         

  				</div>
         
  	<br>
  	<div class="content poll-result">
	<center><h3 style="font-weight: bold;"><?php echo $row['poll_title']; ?></h3></center>
	<br>
   <center><p><?php echo $row['description']; ?></p></center><br>
    <div class="wrapper">
       <?php	while ($row2 = mysqli_fetch_array($result2))

  		 {
  		 ?>
        <div class="poll-question">
            <p><?php echo $row2['title']?><!--  <span>(<?php echo $row2['vote']?> Votes)</span> --></p>
            <div class="result-bar" style= "width:<?php echo round(( $row2['vote']/$total_votes)*100)?>%">
                <?php echo round(($row2['vote']/$total_votes)*100)?>%
            </div>
        </div>
        <?php
  			} 
  			?>

    </div>
    <br>
    <div class="container">
      <center><a href="../" class="btn btn-primary">Go to Home</a></center>
    </div>
</div>
  				
  			</div>
  			<div class="col-lg-3"></div>
  		</div>
  	</div>
  	

  		
  				
  				
  		
  		

<?php	
}
?>
<br><br><br><br><br>
<?php
require("includes/footer.php");
?>

</body>
</html>