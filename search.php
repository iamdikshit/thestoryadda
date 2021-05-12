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

<?php
function create_slug($string){
   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   return $slug;
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Search</title>
  
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



<!--------------------------- Favicon -------------------------------->
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

<!-------------------------------- Favicon end ------------------------------>

</head>




<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" >
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
<br><br><br>

 <?php
                if(isset($_GET['search']))
                { 

  ?>
  <?php
                    $search = mysqli_escape_string($con, $_GET['search']);
                    if($search == "")

                    {
                      header('loaction:index.php');
  ?>
                      
<?php
                    }
                    else
                    {
 ?>
 <?php
                      $query5 = "SELECT * FROM post WHERE tags LIKE '%$search%' ";
                      $result5 = mysqli_query($con, $query5) or die(mysqli_error($con));  
                     
                      $count5 = mysqli_num_rows($result5); 

?>

                      <div class="container">
                        <h4 style="color: black;"><?php echo $count5; ?> Results found for <?php echo $search; ?></h4>
                        <br>
                     
 <?php

                    // +++++++++++++++++++++++++++++++++++ start of while loop +++++++++
                   $i = 1;
                    
                      while ( $row5 = mysqli_fetch_array($result5)) 
                      {
                          $url = $row5['title'];
    ?>
                      <div class="container">
                       
                       
                       <!--<div class="number align-self-start">01</div>-->
                        <a href="posts/<?php echo(create_slug($url)) ;?>"><p><span  style = "color:black; font-weight:bold;"><?php echo $i."-" ?></span><?php echo $row5['title'];?> </p></a>
                     
                   </div>



      <?php
                  $i = $i + 1;
          }
         ?>
                  </div>
                        
<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++ end of while +++++++++++++++ -->
              <?php

                }
                ?>
          <?php
           }
          ?>
</body>
</html>