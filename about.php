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
 $login_button = '<a href="'.$google_client->createAuthUrl().'"><center><img style = "width:30%; hieght:30%;" src="icon/Login.png" /></center></a>';
}

?>

<!-- +++++++++++++++++++++++++++++++++++++++ end +++++++++++++++++++++++++++++++ -->


<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">



  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="static/style.css">
  
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

<!--+++++++++++++++++++++++++ Google ads ++++++++++++++++++++++++-->
<script data-ad-client="ca-pub-7925103159748512" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!--++++++++++++++++++++++++++++++++ End ++++++++++++++++++++++++++++-->

</head>


<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    
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

 <?php
require("includes/head.php");
?>
    
	<br><br>
        <div class="container" style="margin-top: 100px;">
	<center><h1 style="color : black; font-weight: bold;">About Us</h1></center>
</div><br><br><br><br>

<div class = "container">
	<div class="row">
		<div class="col-lg-"12 style=" width: 100%; height: 100%">
			<div class="container">
				<center><h3 style="color: black; font-weight: bold;">Our Mission</h3></center>
			</div><br><br>
			<div class="container">
				<center><p>“Just because something isn't a lie does not mean that it isn't deceptive. A liar knows that he is a liar, but one who speaks mere portions of truth in order to deceive is a craftsman of destruction.”</p></center>
			</div>
			<div class="container">
				<center><h4>― Criss Jami</h4></center>
			</div><br>
			<div class="container">
				<center><p>The stories that we witness in our daily life are often presented to us from a biased and agenda based perspective of the media.  </p></center>
			</div><br>
			<div class="container">
				<center><p>In a world full of propaganda news which presents only a portion of the truth, we are trying to let you know about the facts from different perspectives. The #KnowYourTruth is a campaign that we are forwarding through our platform “The Story ADDA”. We are covering the facts from different official sources without any biased judgment and let you decide what you want to believe.</p></center>
			</div><br>
			<div class="container">
				<center><p>We welcome you all to this new journey which we have started. Kindly feel free to share your thoughts with us on our different platforms. You can also share some relevant facts with us to give insight into the current affairs.
				</p></center>
			</div>
                        <br>
                        <br>
                        
                      
                        	<style>
			.logoimage{
  position: relative;
  width: auto;
  height: auto;

}
a #logoimg:last-child {
  display: none;  
}
a:hover #logoimg:last-child {
  display: block;  
}
a:hover #logoimg:first-child {
  display: none;  
}
			</style>
		<div class="logoimage">
				<br><br>
				<center></center>
				<center>
			<a href="../">
					 <img id="logoimg" src="icon/Logo/logo1.png" /> 
    				 <img id="logoimg" src="icon/Logo/logo2.png" /> 
			</a>
			</center>
			</div>
			  <br>
             <br>
           <br>
           
			<div class="container">
				<center><h3 style="color: black; font-weight: bold;">Our Message</h3></center>
			</div><br><br>
			<div class="container">
				<center><p>"It's a funny place, this world. Hate has rights. Love has none."</p></center>
			</div>
			<div class="container">
				<center><h4>― TOREY L HAYDEN</h4></center>
			</div><br>
			<div class="container">
				<center><p> Don't be a part of spreading the hate speech on social media.  </p></center>
			</div><br>
			<div class="container">
				<center><p> Before concluding to any judgement, take a moment to analyze the facts and different perspectives behind the story. The world has enough participants in hate. Be a person who spread peace and sympathy. </p></center>
			</div><br>
			<div class="container">
				<center><p> PS : The content shared on this platform is purely unbiased and a editorial point of view, nothing more has been written on this platform other than that of which has been reposted by various independent media sources. Anything that has been written can be backed up by various references given at the end of the posts.
				</p></center>
			</div>
        <br><br>
		</div>
		

	<!--	<div class="col-lg-4" style="width: 100%; height: 100%; margin-top: 10px;">-->
 <!--                   <center>-->
	<!--		<div>-->
	<!--			<center><h3 style="color: black; font-weight: bold;">The Founding Members</h3></center>-->
	<!--		</div><br>-->
	<!--		<div class="container" >-->
	<!--			<img class="img-responsive" src="about/Ashish.png" width="300" height="250">-->
	<!--		</div><br><br>-->
	<!--		<div class="container" >-->
	<!--			<img class="img-responsive"  src="about/Dikshit.png" width="300" height="250">-->
	<!--		</div><br><br>-->
	<!--		<div class="container" >-->
	<!--			<img class="img-responsive"  src="about/Dayol.png" width="300" height="250">-->
	<!--		</div><br><br>-->
	<!--		<div class="container" >-->
	<!--			<img class="img-responsive"  src="about/Anirban.png" width="300" height="250">-->
	<!--		</div><br><br>-->
 <!--                   </center>-->
		
	<!--</div>-->
	</div>
    
		
    
</div>

<?php
require("includes/footer.php");
?>



</body>
</html>