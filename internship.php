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
	<title>Internship</title>
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

		
<style>
    #first_row{
	margin-top: 200px;
}

.bg-img {
  /* The image used */
  /*background-image: url("icon/123.webp");*/
  margin-top: 100px;
 /*background-image: url("icon/2.jpg");*/
  background-image: url("icon/2.gif");
  min-height: 500px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

#internship-content{
	position:relative;
	width: 100%;
	 min-height: 700px;
	
	background-color: rgba(0,0,0,0.5);
}
#internship-detail{
	position:relative;
	width: 100%;
	 height: auto;
	
	background-color: rgba(0,0,0,0.5);
	border-radius: 20px;
}
#internship-content h1{
	font-size: 70px;
}
#internship-content h1,h4,h3,h2{

	color: white;
	font-weight: bold;
	font-family: calibri;
}
#internship-content li,p{
	color: white;
}

 #internship-detail h1,h4,h3,h2{

	color: white;
	font-weight: bold;
	font-family: calibri;
}
#internship-detail li,p{
	color: white;
}
#apply_button{
	background-color: black;
	border-radius: 30px;
}
#apply_button:hover{

	
	box-shadow: 0 0 30px 0 rgba(255,255,255,0.7); 
  transform: translateY(-2px);
}

/*__________________________________________*/
@media  (max-width: 768px) {
  /* For mobile phones: */
  #internship-content h4,h3 {
  	font-size: 17px;
  }
  #internship-content h2 {
  	font-size: 20px;
  }

   #internship-content li{
   	font-size: 14px;
   }
  .bg-img{
      margin-top: 0px;
  	/*background-image: url("icon/123.webp");*/
  	 /*background-image: url("icon/2.jpg");*/
  	  background-image: url("../icon/2.gif");

  min-height: 700px;
  }
  #internship-content{
	position:relative;
	width: 100%;
	 max-height: 700px;
	
	background-color: rgba(0,0,0,0.5);
}
  #apply_button:hover{

	
	box-shadow: 0 0 30px 0 rgba(255,255,255,0.7); 
  transform: translateY(-2px);
}

#first_row{
	margin-top: 100px;
}

#internship-detail{
	position:relative;
	width: 100%;
	 height: auto;
	
	background-color: rgba(0,0,0,0.5);
	border-radius: 30px;
}

 #internship-detail h4,h3 {
  	font-size: 16px;
  }
  #internship-detail h2 {
  	font-size: 20px;
  }

   #internship-detail li{
   	font-size: 14px;
   }

   #internship-detail h1,h4,h3,h2{

	color: white;
	font-weight: bold;
	font-family: calibri;
}
#internship-detail li,p{
	color: white;
}
}

/*++++++++++++++++++++++++++++++++++++++++++++++++*/
</style>
<!--+++++++++++++++++++++++++ Google ads ++++++++++++++++++++++++-->
<script data-ad-client="ca-pub-7925103159748512" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!--++++++++++++++++++++++++++++++++ End ++++++++++++++++++++++++++++-->

</head>

<?php
require("includes/head.php");
?>


<body >

<!--++++++++++++++++++++++++++++++++++++++ POP UP ++++++++++++++++++++++-->
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


<!--+++++++++++++++++++++++++++++++ End popup++++++++++++++++++++++++-->
<!-- <h2>Form on Hero Image</h2> -->
<div class="bg-img">

	<div class="container-fluid" id="internship-content">
		<div class="container" id="head_internship">
			<center>
				<h1>Internship</h1>
			</center>
			
		</div>
		
		
		
			
		
		<div class="row" id="first_row">
			<div class="col-md-4">
				<div class="container">
					<h4>Apply for </h4>
			<ul>
			<li><p>Graphics Design</p></li>
			<!--<li><p>Web Development</p></li>-->
			<li><p>Content Writing</p></li>
			<!--<li><p>SEO</p></li>-->
			</ul>
			</div>
			<br>
			</div>

			<div class="col-md-4">
				<div class="container"><h4>About the Work</h4>

					<p>Selected intern's day-to-day responsibilities include:</p></
					<ul>
						<li>Managing multilpe projects, prioritize and meet deadlines.</li>
					</ul>
				
			</div>
			<br>
			</div>

			<div class="col-md-4">
				<div class="container"><h4>Who can apply</h4>
				
				
					<p>Only those candidates can apply who:</p>
					<ul>
						<li><p>are available for the work from home internship.</p></li>
						<li><p>are available for duration of 1 month.</p></li>
						<li><p>have relevant skill and interests</p></li>
					</ul>
				
			</div>
				
				
			</div>
		</div>
		<!-- ++++++++++++++++++++++++++++++++++++++row end++++++++ -->
		<!-- +++++++++++++++button++++++++++++++ -->
		<div>
			<center>
					<a href="internform" id="apply_button"  class="btn btn-primary">APPLY</a>
				
				</center>
				<br><br>
		</div>
		
	</div>
  
</div>

<br>
<!-- +++++++++++++++++++++++++++++++++++++++++Discription-1+++++++ -->
<div class="container" id="internship-detail">
	<div class="row">
		<!--<div class="col-lg-4 col-md-4 col-12">-->
		<!--	<br>-->
		<!--	<div class="container">-->
		<!--		<h2>Web Development</h2>-->
		<!--		<p>Selected intern's day-to-day responsibilities include:</p>-->
		<!--		<ul>-->
		<!--			<li>Development in backend,tasks will be given such as creating polls, user login, etc.</li>-->
		<!--			<li>Maintaining the website and optimizing the front-end.</li>-->
		<!--		</ul>-->
		<!--		<h3>Skill(s) Required</h3>-->
		<!--		<ul>-->
		<!--			<li>HTML</li>-->
		<!--			<li>CSS</li>-->
		<!--			<li>JavaScript</li>-->
					
		<!--		</ul>-->
		<!--	</div>-->
			
		<!--	</div>-->
			
		
		<div class="col-lg-4 col-md-4 col-12">
			<br>
			<div class="container">
				<h2>Content Writing</h2>
				<p>Selected intern's day-to-day responsibilities include:</p>
				<ul>
					<li>Produce well-researched content for publication online.</li>
					<li>Proof read content for errors and inconsistencies.</li>
					<li>Create compelling headlines and body copy that will capture the attention of the targetaudience.</li>
					<li>Edit and polish existing content to improve readability.</li>
					<li>Assist the digital team in developing content for digital campaigns.</li>
					<li>Edit content produced by other members of the team.</li>
				</ul>
				<h3>Skill(s) Required</h3>
				<ul>
					<li>Creative Writing</li>
					<li>English Proficiency (Spoken)</li>
					<li>English Proficiency (Written)</li>
					
				</ul>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-12">
			<br>
			<div class="container">
				<h2>Graphics Designing</h2>
				<p>Selected intern's day-to-day responsibilities include:</p>
				<ul>
					<li>Working with the marketing team.</li>
					<li>Helping the team with banner adaptations.</li>
					<li>Being up to date with what's trending on social media and suggest ideas accordingly.</li>
					<li>Preparing images to coincide with social and blog posts.</li>
					
				</ul>
				<h3>Skill(s) Required</h3>
				<ul>
					<li>Basics of Adobe Photoshop</li>
					<li>Basics of Illustration</li>
					<li>Sketching</li>	
				</ul>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-12">
		    
		    	<br>
			<div class="container">
				<h2>Perks</h2>
				
				<ul>
					<li>Certificate</li>
					<li>Letter of recommendation</li>
					<li>Work From Home</li>
					
				</ul>
				
			</div>
		    </div>
	</div>
	<!-- +++++++++++++++++++++++++++++second discription 2 +++++++++++++++++ -->


	<div class="row">
		<div class="col-lg-4 col-md-4 col-12">
			<br>
			<div class="container">
				<h2>Other requirements</h2>
				<p>Selected intern's day-to-day responsibilities include:</p>
				<ul>
					<li>Up-to-date with social media design trends.</li>
					<li>Good Knowledge of what works on social media and websites.</li>
					<li>Should be highly motivated, energetic, team player with a strong knack for details</li>
					<li>Strong interpersonal and communication skills</li>
				</ul>
				
			</div>
			
			</div>
			
		
		<div class="col-lg-4 col-md-4 col-12">
			<!--<br>-->
			<!--<div class="container">-->
			<!--	<h2>Perks</h2>-->
				
			<!--	<ul>-->
			<!--		<li>Certificate</li>-->
			<!--		<li>Letter of recommendation</li>-->
			<!--		<li>Work From Home</li>-->
					
			<!--	</ul>-->
				
			<!--</div>-->
		</div>
		<div class="col-lg-4 col-md-4 col-12">
			
		</div>
		
	</div>
	<!-- ++++++++++++++++++++++++++++++++++++++++++++++== -->
</div>
<br>
<br>


</body>
</html>
