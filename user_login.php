<?php

require("includes/common.php");


  
        //to prevent from mysqli injection  
       
  $email = mysqli_real_escape_string($con, $_POST['email']);
  
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $password = MD5($password);
  //  $password = md5($_POST['password']);
 
  // $cpassword = $_POST['confirmpassword'];
 
    
        $sql = "SELECT * FROM user WHERE email = '$email' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            // session_start();
            $_SESSION['email'] = $email;
            $_SESSION['id'] = mysqli_insert_id($con);
            
            echo"<script>alert('logged in successfully')</script>";
            echo("<script>location.href=''</script>");
        } 
        
    //      elseif($password!= $cpassword){
    //         echo"<script>alert('password not found,enter correct password')</script>";
    //         echo("<script>location.href='login.php'</script>"); 
    // }
         else{  
            echo"<script>alert('email not found')</script>";
            echo("<script>location.href='signup'</script>"); 
        }     
?>