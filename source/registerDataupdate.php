<?php
//Include database configuration file
ob_start();
session_start();
include('../includes/functions.php');
include('../includes/config.php');
if(isset($_POST["update_user"]) && !empty($_POST["update_user"]))
{
  //print_r($_POST);
  //die();
    $fname = mysql_real_escape_string(protect($_POST['fname']));
    $lname = mysql_real_escape_string(protect($_POST['lname']));
    $email = mysql_real_escape_string(protect($_POST['email']));
    $pname = mysql_real_escape_string(protect($_POST['pname']));
    $user_paypal = mysql_real_escape_string(protect($_POST['user_paypal']));
    $user_address = mysql_real_escape_string(protect($_POST['user_address']));
    $user_address_shipping = mysql_real_escape_string(protect($_POST['user_address_shipping']));
    //print_r($_POST);
    $email_exists = mysql_query("SELECT * FROM purchasify_users WHERE email = '$email' and usern!='" . mysql_real_escape_string($_SESSION['ps_usern']) . "'");
    $emailchecker = mysql_fetch_array($email_exists);

    $email_paypal_exists = mysql_query("SELECT * FROM purchasify_users WHERE user_paypal = '$user_paypal' and usern!='" . mysql_real_escape_string($_SESSION['ps_usern']) . "'");
    $emailpaypalchecker = mysql_fetch_array($email_paypal_exists);
    if(empty($email) or empty($pname) or empty($user_paypal) or empty($user_address_shipping)) 
    { 
      echo "{\"VerficationStatus\":\"AR\"}";
    }
    elseif(!isValidEmail($email)) 
    { 
      echo "{\"VerficationStatus\":\"VE\"}"; 
    }
    elseif(!isValidEmail($user_paypal)) 
    { 
      echo "{\"VerficationStatus\":\"VE1\"}";
    }
    elseif($emailchecker > 1) 
    {
     echo "{\"VerficationStatus\":\"EE\"}"; 
    }
    elseif($emailpaypalchecker > 1) 
    {
     echo "{\"VerficationStatus\":\"EE1\"}"; 
    }
    else 
    {
      $update = mysql_query("UPDATE purchasify_users SET fname='$fname',lname='$lname',email='$email',pname='$pname',user_paypal='$user_paypal',user_address='$user_address',user_address_shipping='$user_address_shipping' WHERE usern='" . mysql_real_escape_string($_SESSION['ps_usern']) . "'");
      if($update)
      {
        $update = mysql_query("UPDATE purchasify_items SET author_profile='$pname' WHERE author='" . mysql_real_escape_string($_SESSION['ps_usern'])  . "'");
        if($update)
        {
          //$update = mysql_query("UPDATE purchasify_purchases SET buyer_email='$cur_email' WHERE buyer_email='$user_email' AND usern='" . mysql_real_escape_string($_SESSION['ps_usern']) . "'");
          echo "{\"VerficationStatus\":\"RS\"}";
        }
      }
    }
}
?>