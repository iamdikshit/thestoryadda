<?php
require("includes/common.php");

?>
<?php 
        if(isset($_GET['post_url']))
        {
        $post_url =  mysqli_real_escape_string($con,$_GET['post_url']);
        
        $query = "SELECT * FROM post WHERE post_url ='" . $post_url . "'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $id = $row['id'];
        
        $title = $row['title'];
        $tags = $row['tags'];
        $brief = $row['brief'];
        
        $query1 = "SELECT * FROM seo_tags WHERE post_id ='" . $id . "'";
        $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
        $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
        $count1 = mysqli_num_rows($result1); 
        
        
         $query2 = "SELECT * FROM headlines WHERE post_id ='" . $id . "'";
        $result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
        $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
         
        if($count1>=1)
        {
        
                if($row1['title_tag']=='' && $row1['meta_tag']=='')
                {
                        $title_tag = "Stories";
                        $meta_tag =  "Stories";
                }
                elseif($row1['meta_tag']=='' && !empty($row1['title_tag'])){
                    
                    $title_tag = $row1['title_tag'];
                    $meta_tag = "Stories";
                }
                elseif($row1['title_tag']=='' && !empty($row1['meta_tag']))
                {
                     $title_tag ="Stories";
                    $meta_tag = $row1['meta_tag'];
                }
                else
                {
                    $title_tag = $row1['title_tag'];
                    $meta_tag = $row1['meta_tag'];
                }
           
        }
        else
        {
            $title_tag = $title;
            $meta_tag =  $tags;
        }
        
        

        }
        else
        {
            echo("<script>location.href=''</script>");
        }
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
<html prefix = "og: http://ogp.me/ns#">
<head>
    <title><?php echo $title_tag; ?></title>
    


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $brief; ?>" />
    
    <meta name = 'keywords' content = '<?php echo $meta_tag; ?>' />
 
 <meta property="fb:admins" content="110292134058019" /> 
<meta property="og:title" content="<?php echo $title; ?>"/>
<meta property="og:type" content="article" />
<meta property="og:image:secure_url" content="https://thestoryadda.com/headlines_image/<?php echo($row2['headline_image'])?>"/>

 <meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:alt" content="No Image"/>

<meta property="og:image:width" content="600" />
<meta property="og:image:height" content="600" />
<meta property="og:site_name" content="The Story ADDA"/>
<meta property="og:description" content="<?php echo $brief; ?>"/>
	



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


<!-- ++++++++++++++++++++++++++Google AdSense++++++++++++++++++ -->

<script data-ad-client="ca-pub-7925103159748512" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


<!--------------------------- Favicon -------------------------------->
<link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
<link rel="manifest" href="../site.webmanifest">

<!-------------------------------- Favicon end ------------------------------>

<!--<link rel="icon" type="image/png" href="/icon/Logo/favicon.png"/>-->


<style>
  
#related{
    font-size:17px;
  color: black;

}
#related:hover{
font-size:17px;
 color: green;
}

  .parallelogram{
    width: auto;
  background-color: black;
  
  /*margin-right: 100px;*/
  /*position: absolute;*/
  transform: translate(-50%, -50%);
  transform: skew(20deg);

}

#tags{
  padding-top: 0px;
  padding-bottom: 0px;
  padding-left: 5px;
  padding-right: 5px;
  border-radius: 15px;


}

 #top_container{
    margin-top: 100px;
  }

@media  (max-width: 768px) {
  h1,h2{
    font-size: 26px;
  }


  #top_container{
    margin-top: 10px;
  }


#post_img{
width: 100%;
}
}
</style>

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f59af6c5503590012dc87ba&product=inline-share-buttons" async="async"></script>

</head>


<?php
require("includes/post_head.php");
?>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <br>
    
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
    


<div class="container" id="top_container">
  <div class="row">
    
    <div class="col-md-8">
    <div class="container"  >
       <h1 style="color: black;"><?php echo  $row['title']?></h1>
       
        <p> <i class='fas fa-user-circle' style='font-size:20px'></i>
        <i><?php echo " ". $row['author']?></i><br>
        <i><?php echo "Date : ".$row['date']." ".$row['upload_time'] ?></i>
        </p>
        
       
        <!--<p><i><?php echo $row['date']." ".$row['upload_time'] ?></i></p>-->
       

        </div>
        <div class="container" >
         <center> <img class="img-fluid" src="../headlines_image/<?php echo($row2['headline_image'])?>" id = 'post_img' width = 60% style = '  margin-bottom: 5px;margin-top: 10px;' ></center>
         <?php echo html_entity_decode($row['blog'])?>
         
         
        

        </div>
         <div class="sharethis-inline-share-buttons"></div>
        
        
    
    </div>

    <div class="col-md-4">

      <br>
      <br>

      <div class = 'container' >
        <div class="parallelogram"  >
      <h2  style="color: white;margin: 10px; transform:skew(-20deg);">Tags</h2>
      </div>
      <br>
      <?php 
      $myString = $row['tags'];
      $tags = explode(',', $myString);
      ?>
     <?php 
      foreach ($tags as $tag) { ?>
      
     

          <a id = 'tags' href = '../search?search=<?php echo $tag ?>' class = 'btn btn-primary' style="margin: 2px; text-transform: capitalize;" >
            <span style="font-size:10px; "><?php echo $tag; ?></span></a>

         

      <?php 
      } 
      ?>
      </div>
       <hr style="width:100%; height: 2px;text-align:left;margin-left:0; color:black;"> 
      <br>
            <!-- +++++++++++++++++++++++++++++++++++++++ -->
                   
<?php
            $query1 = "SELECT * FROM polls WHERE post_id = '$id' ";
            $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result1); 
   
?>

          
<?php
        if($count==1){

            $query2 = "SELECT * FROM poll_answer WHERE poll_id = '$id' ";
            $result2 = mysqli_query($con, $query2) or die(mysqli_error($con));


?>
    
                
                    <div class="pollbox" id="<?php echo $id ?>">
                        <div class="container">
                          
                            <center><h2   style="color: black;"> <?php echo $row1['poll_title']; ?> </h2></center>
                            
                            <br>
                            <center><p>Description: <?php echo $row1['description']; ?></p></center><br>
                            <center>
                              <div class="container">
                                  <form action="../vote.php" method="POST">
                                <?php 
                                     while($row2 = mysqli_fetch_array($result2)){ 
                                ?>
                                   
                                    
                                    <button type="submit" class="btn btn-primary" id="button" value="<?php echo $row2['id'] ?>" name="id" style="margin: 5px" ><?php echo $row2['title']; ?></button> 
                                   
                              <?php }?>
                                  </form>
                             </div>
                            </center>
                        </div>
                        <br><br>
                    </div>

                 
<?php 
}
?>         
<!-- ++++++++++++++++++++++++++++ End  +++++++++++ -->
            <br>
             <?php if(!empty($row['code'])) 
          {
         ?>
          <div class="container" id="discussionbox">
            <center><h1 style="color: black;">Discussion</h1></center>
             <?php echo html_entity_decode($row['code'])?>
          </div>
        <?php
          }
          ?>

            <!-- ++++++++++++++++++++ related topic +++++++++++ -->
          <?php 

            $myString = $row['tags'];
            $tags = explode(',', $myString);
           // echo $myString;

           $a=array();
           
           foreach ($tags as $tag) {
             $tag = "'%".$tag."%'";

              array_push($a,$tag);
           }
           // print_r($a);
           $word = '';
           for ($i=0; $i < count($a); $i++)  {
             
            if ($i < count($a)-1) {
            $word = $word."tags LIKE ".$a[$i]." OR ";
            }
            else{
              $word = $word."tags LIKE ".$a[$i];
            }
            
              // array_push($a,$tag);
           }
          


          ?>
            <div class="container">
              <div class="parallelogram">
              <h2 style="color: white;margin-left: 20px; transform:skew(-20deg);">Related</h2>
              </div>
                <br>
              <!--<div class="container">-->

                <ul>
                <?php 
                  $query5 = "SELECT * FROM post WHERE $word LIMIT 6";
                  $result5 = mysqli_query($con, $query5) or die(mysqli_error($con));  
                  $count5 = mysqli_num_rows($result5); 
                  
                    if ($count5 <=1) { ?>

                   <p>No related post....</p>
              <?php
                  } 

                  else
                  {

                 $num = 0;
            while ( $row5 = mysqli_fetch_array($result5)) { 
                      
                ?>
                <?php if ($row5['title']!= $row['title'])
                {
                     $num = $num +1;
                  ?>

                      <li>
                           <a href="../posts/<?php echo($row5['post_url'])?>" id = 'related'><?php echo $row5['title'];?></a>
                       </li>
                     
               <?php } ?>  <!-- end if condition -->
              <?php  } ?><!-- end for loop -->
          <?php  } ?>
             </ul>
              <!--</div>-->
            </div>  


<!-----------------related topic End ------------>


</div>
 </div>
 </div>  

<br><br>
<?php
  
        $sql = "SELECT source FROM post WHERE post_url ='" . $post_url . "'";
        $res = mysqli_query($con, $sql) or die(mysqli_error($con));
        $rows = mysqli_fetch_array($res, MYSQLI_ASSOC);
        // $source = $rows['source'];

?>

 <div class="container" id="disclaimer">
  <center><h3>Disclaimer</h3></center>
   <p>The content and views shared by this post is purely unbiased and a editorial point of view, nothing more has been written on this platform other than that of which has been reported by various independent media sources. Anything that has been written can be backed up by various references given below.</p>

   <br><h5>Sources:</h5><br>
   <div class=" col-md-6 col-sm-6 col-xs-6 no-padding pull-right text-left">
   <p>
    <?php 
        $source = isset($rows['source']) ? explode(PHP_EOL, $rows['source']) : '';
     
         $k = 0;
        foreach ($source as $source) {
            $k = $k + 1;
            
            
      
     ?>
      
       <?php 
            if (empty($source)){ 

        ?>
          
         <a   href="<?php echo $source; ?>"><?php echo "Source-".$k ?></a>
     <br>
        
    <?php            
            }
            
            else
            {
       ?>
       
         <a   href="<?php echo $source; ?>"><?php echo "Source-".$k ?></a>
     <br>
       
    <?php
    }
      ?>
    
      <?php
    }
      ?>
   </p>
   </div>
 </div>

<br><br><br>

<?php
require("includes/footer.php");
?>

<script>
    if(document.getElementById('button').clicked == true)
{
   var a = document.getElementsByClassName('container')[4].id;
   document.getElementById(a).style.visibility = "hidden"; 
}
</script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</body>
</html>


     