<?php
//Include database configuration file
ob_start();
session_start();
include('../includes/functions.php');
include('../includes/config.php');
if(isset($_POST["phps_register"]) && !empty($_POST["phps_register"]))
{
    $usern = mysql_real_escape_string(protect($_POST['usern']));
    $passwd = mysql_real_escape_string(protect($_POST['password']));
    $cpasswd = mysql_real_escape_string(protect($_POST['cpassword']));
    $email = mysql_real_escape_string(protect($_POST['email']));
    $reg_quota = mysql_real_escape_string(protect($_POST['regquota']));
    $regurl = mysql_real_escape_string(protect($_POST['regurl']));
    //print_r($_POST);
    $email_exists = mysql_query("SELECT * FROM purchasify_users WHERE email = '$email'");
    $emailchecker = mysql_fetch_array($email_exists);
    $usern_exists = mysql_query("SELECT * FROM purchasify_users WHERE usern = '$usern'");
    $usernchecker = mysql_fetch_array($usern_exists);

    if(empty($usern) or empty($passwd) or empty($cpasswd) or empty($email)) 
    { 
      echo "{\"VerficationStatus\":\"AR\"}";
    }
    elseif(!isValidUsername($usern)) 
    { 
      echo "{\"VerficationStatus\":\"VU\"}"; 
    }
    elseif(!isValidEmail($email)) 
    { 
      echo "{\"VerficationStatus\":\"VE\"}"; 
    }
    elseif($usernchecker > 1) 
    { 
      echo "{\"VerficationStatus\":\"UE\"}";
    }
    elseif($emailchecker > 1) 
    {
     echo "{\"VerficationStatus\":\"EE\"}"; 
    }
    elseif($passwd !== $cpasswd) 
    { 
      echo "{\"VerficationStatus\":\"PN\"}"; 
    }
    elseif(empty($reg_quota)) 
    { 
      echo "{\"VerficationStatus\":\"RQ\"}"; 
    }
    else 
    {
      $passwd = md5($passwd);
      $insert1 = "INSERT purchasify_users (usern,passwd,email,quotas,fname,lname,role,status,pname,facebook_url,website_url,twitter_name,user_desc,avatar,user_currency,user_paypal,user_banner,user_address,user_address_shipping) VALUES ('$usern','$passwd','$email','$reg_quota','','','0','0','','','','','','','','','','','')";
      $insert = mysql_query($insert1) or die(mysql_error());
      if($insert)
      {
          $_SESSION['ps_usern'] = $usern;
          //header("Location: ".$regurl);
          echo "{\"VerficationStatus\":\"RS\"}";
      }  
      $_SESSION['install_usern'] = $usern;
      $_SESSION['install_passwd'] = mysql_real_escape_string($_POST['passwd']);
      //header("Location: $web[url]account/login");
    }
}
?>