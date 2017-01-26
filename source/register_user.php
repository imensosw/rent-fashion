<?php
if(isset($_GET['usern']) && !empty($_GET['usern']))
{
	include('../includes/config.php');
	include('../includes/functions.php');
    $usern = mysql_real_escape_string(protect($_GET['usern']));
	$password = mysql_real_escape_string(protect($_GET['password']));
	$cpassword = mysql_real_escape_string(protect($_GET['cpassword']));
	$email = mysql_real_escape_string(protect($_GET['email']));
	$email_exists = mysql_query("SELECT * FROM purchasify_users WHERE email = '$email'");
	$emailchecker = mysql_fetch_array($email_exists);
	$usern_exists = mysql_query("SELECT * FROM purchasify_users WHERE usern = '$usern'");
	$usernchecker = mysql_fetch_array($usern_exists);
    
    if(empty($usern) or empty($password) or empty($cpassword) or empty($email)) 
    { 
    	echo "Error! All fields are required."; 
    }
	elseif(!isValidUsername($usern)) 
	{ 
		echo "Error! Please enter valid username."; 
    }
	elseif(!isValidEmail($email)) 
	{ 
		echo "Error! Please enter valid e-mail address."; 
	}
	elseif($usernchecker > 1) 
	{ 
		echo "Error! Username already taken.";
    }
	elseif($emailchecker > 1) 
	{ 
		echo "Error! Email already exists.";
	}
	elseif($password !== $cpassword) 
	{ 
		echo "Your passwords does not match."; 
	}
	else 
	{
		$password = md5($password);
		$insert = mysql_query("INSERT purchasify_users (usern,passwd,email,quotas) VALUES ('$usern','$password','$email','$web[reg_quota]')");

		$_SESSION['install_usern'] = $usern;
		$_SESSION['install_passwd'] = mysql_real_escape_string($_GET['password']);
        echo "success";
	}
}
?>