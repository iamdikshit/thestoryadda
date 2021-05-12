<?php

require("includes/common.php");

?>
<?php
  // Getting the values from the signup page using $_POST[] and cleaning the data submitted by the user.
  
  $name = mysqli_real_escape_string($con, $_POST['name']);
  
  $email = mysqli_real_escape_string($con, $_POST['email']);
  
  $password = mysqli_real_escape_string($con,$_POST['password']);
  $password = MD5($password);
 
  $password = md5($_POST['password']);
  $contact = mysqli_real_escape_string($con, $_POST['contact']);
   $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
   $regex_num = "/^[789][0-9]{9}$/";
 
  $query = "SELECT * FROM user WHERE email='$email'";
  $result = mysqli_query($con, $query)or die(mysqli_error($con));
  $num = mysqli_num_rows($result);


  if ($num != 0) {

     echo"<script>alert('email already exist')</script>";
     echo("<script>location.href='signup'</script>");
  
  }

   else if (!preg_match($regex_email, $email)) {
     
     echo"<script>alert('email id not valid')</script>";
     echo("<script>location.href='signup'</script>");
  
  }
   
   else if (!preg_match($regex_num, $contact)) {
     
     echo"<script>alert('contact not valid')</script>";
     echo("<script>location.href='signup'</script>");
  
  }  
  
   elseif(strlen($password)<6){
    
     echo"<script>alert('length is too short')</script>";    
     echo("<script>location.href='signup'</script>");

  }

    
  else{
 
    // session_start();
    $query = "INSERT INTO user (name, email, password,contact) VALUES('" . $name . "','" . $email . "','" . $password . "','" . $contact . "')";
     mysqli_query($con, $query) or die(mysqli_error($con));



    $sql = "select * from user where email = '$email' and password = '$password'";  
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  


    $_SESSION['email'] = $email;
    $_SESSION['id'] = mysqli_insert_id($con);
    $_SESSION['user_id']=$row['id'];

    echo("<script>location.href='login'</script>");
  }
?>