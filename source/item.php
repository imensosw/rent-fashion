<?php
$id = mysql_real_escape_string($_GET['id']);
$licanse = mysql_real_escape_string($_GET['licanse']);
$method = mysql_real_escape_string($_GET['method']);
//$custom_url = mysql_real_escape_string($_GET['custom_url']);
$sql = mysql_query("SELECT * FROM purchasify_items WHERE id='$id'");
//$sql = mysql_query("SELECT * FROM purchasify_items WHERE custom_url='$custom_url' OR id='$id'");
if(mysql_num_rows($sql)==0)
{
	$redirect = $web['url']."not_found";
	header("Location: $redirect");
}
$row = mysql_fetch_array($sql);
$custom_url = protect($row['name']);
//echo protect($row['id']);
//echo protect($row['author']);
//echo $_SESSION['ps_usern'];
//echo $_SESSION['ps_usern_id'];
//echo protect($row['preview']);
//die();
function formatBytes($bytes, $precision = 2)
{
    if ($bytes > pow(1024,3)) return round($bytes / pow(1024,3), $precision)." GB";
    else if ($bytes > pow(1024,2)) return round($bytes / pow(1024,2), $precision)." MB";
    else if ($bytes > 1024) return round($bytes / 1024, $precision)." KB";
    else return ($bytes)." B";
}
$query_brand = mysql_query("SELECT * FROM purchasify_brands ORDER BY id ASC");
$count=0;
$brand_array=array();
while($row_brand = mysql_fetch_assoc($query_brand))
{
  foreach($row_brand as $key => $value)
  {
	$brand_array[$count][$key] = $value;
  }
  $count++;
}
$query_size = mysql_query("SELECT * FROM purchasify_sizes ORDER BY id ASC");
$count=0;
$size_array=array();
while($row_size = mysql_fetch_assoc($query_size))
{
  foreach($row_size as $key => $value)
  {
	$size_array[$count][$key] = $value;
  }
  $count++;
}
//print_r($size_array);
//die();
$extnafaila = end(explode('.',$row['main_file']));
$extnafaila = strtoupper($extnafaila);
$filesize = formatBytes(filesize($row['main_file']));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- twitter -->
<!--
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@nytimes">
<meta name="twitter:creator" content="@SarahMaslinNir">
<meta name="twitter:title" content="Parade of Fans for Houston’s Funeral">
<meta name="twitter:description" content="NEWARK - The guest list and parade of limousines with celebrities emerging from them seemed more suited to a red carpet event in Hollywood or New York than than a gritty stretch of Sussex Avenue near the former site of the James M. Baxter Terrace public housing project here.">
<meta name="twitter:image" content="<?php //echo $web['url']; ?><?php //echo protect($row['preview']); ?>">-->
<!-- twitter -->

<title><?php echo $web['title']; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="description" content="<?php echo $web['description']; ?>">

<meta name="author" content="Spreadrr Design">

<link rel="stylesheet" type="text/css" href="<?php echo $web['url']; ?>static/gen/modal/css/master.css">
</head>

<body>

<?php

//echo $_SERVER['DOCUMENT_ROOT'];
include($_SERVER['DOCUMENT_ROOT']."/hautehire/source/header.php"); ?>
  <div class="col-md-12">

   <div class="bread_crumb">
<section id="payment_content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="payment_process_wrp clearfix mar_t2 com_pad <?php if(!$_SESSION['ps_usern']){ echo "hidden ";}?>wow fadeInUp" data-wow-duration="2s">
				<?php
				if(!$_SESSION['ps_usern'])
				{
				  ?>
					<!-- login start -->
<div class="col-md-4 col-md-offset-4">
   <div id="login" style="padding-top: 8%;" class="content auth">
       <h4 class="text-center mar_b1">Log in to <?php echo $web['title']; ?></h4>
		<div class="login-container">
	          <?php
	            if(isset($_POST['phps_login']))
	            {
	              $phps_product = mysql_real_escape_string($_POST['phps_product']);
	              $phps_usern = mysql_real_escape_string($_POST['phps_usern']);
	              $phps_passwd = mysql_real_escape_string($_POST['phps_passwd']);
	              $phps_passwd = md5($phps_passwd);
	              $query = mysql_query("SELECT * FROM purchasify_users WHERE usern='$phps_usern' and passwd='$phps_passwd'");
	              if(mysql_num_rows($query))
	              {
	                $fetch = mysql_fetch_array($query);
	                $_SESSION['ps_usern'] = $fetch['usern'];
	                $_SESSION['ps_usern_id'] = $fetch['id'];
	                if(!empty($phps_product))
	                {
	                  header("Location: $web[url]p/$phps_product");
	                }
	                else
	                {
	                  header("Location: $web[url]dashboard");
	                }
	              }
	              else
	              {
	                echo error('<p align="center">Oops! You have entered wrong username or password</p>');
	              }
	            }
	          ?>
	    </div>
	    <form action="" method="post" accept-charset="utf-8" class="ui form login-container">

	        <div class="fixed">
	            <input name="phps_product" value="<?php if(!empty($id)){echo $id;} ?>" type="hidden">
	        </div>

	        <div class="field">
	          <input name="phps_usern" type="text" value="" placeholder="Username" autocomplete="off">
	        </div>

	        <div class="field">
	          <input name="phps_passwd" type="password" value="" placeholder="Password" autocomplete="off">
	        </div>

	        <div style="display:none!important;" class="reset field">
	          <a href="#" class="reset" target="_self">Forgot password?</a>
	        </div>

	        <div class="field mar_t1">
	          <button type="submit" name="phps_login" class="ui green button fluid submit model_btn">Log in</button>
	        </div>

			<h4 class="ui horizontal divider text-center">OR</h4>

			<div class="field text-center">
	          <span> Not a Member </span>

	              <!--<a href="<?php //echo $web['url']; ?>account/register" id="register_form" class="auth-switch" data-location="signup">sign up<i class="fa fa-arrow-right"></i></a>-->

	              <!-- <a href="<?php //echo $web['url']; ?>account/register" id="register_form" class="auth-switch" data-location="signup">sign up<i class="fa fa-arrow-right"></i></a>-->

	              <a href="#" class="auth-switch" data-dismiss="modal" data-toggle="modal" data-target="#signin_model">sign up <i class="fa fa-long-arrow-right"></i></a>
	        </div>
	    </form>
   </div>
</div>

                    <!-- login end -->
<!--
					<div class="payment_process">
						<h3 class="main_head">payment process</h3>
						<div class="step_bar_wrp">
							<ul class="progress_bar">
								<li class="step">Choose product</li>
								<li class="step">Log in</li>
								<li class="step">Place order</li>
							</ul>
						</div>
					</div>
					-->

					<?php
					}
					if(!$_SESSION['ps_usern'])
					{
					  ?>
					    <!--<div class="billing_form_wrp">
							<div class="inform_wrp">
								<div class="billing_inform_text">
									You need to be logged in if you want to purchase this product.
								</div>
							</div>
						</div>-->
					<?php
					}
					else
					{
						if($_SESSION['ps_usern']==$row['author'])
						{ ?>
					<div class="billing_form_wrp">
							<div class="inform_wrp">
								<div class="billing_inform_text">
									Sorry but currently you can't purchase your own product.
								</div>
							</div>
						</div>
					     <?php
					    }
					    else
					    {
					      $sql4 = mysql_query("SELECT * FROM purchasify_purchases WHERE item_id='$id' AND usern='" . mysql_real_escape_string($_SESSION['ps_usern']) . "'");
		                 if(mysql_num_rows($sql4)==1)
		                 {
					    ?>
					    <div class="billing_form_wrp">
							<div class="inform_wrp">
								<div class="billing_inform_text">
									Be careful! You've already purchased this product.
									<a style="text-decoration:underline!important;color:#333!important;font-weight:bold;" href="<?php echo $web['url']; ?>account/purchases">View purchases</a>
								</div>
							</div>
						</div>
						<?php
					}
					//echo $_SESSION['ps_usern_id'];
					$query1 = mysql_query("SELECT * FROM purchasify_users WHERE id='".$_SESSION['ps_usern_id']."'");
					$fetch1=mysql_fetch_assoc($query1);
					//print_r($fetch1);
					if(!empty($fetch1))
					{ ?>
				<!-- login genral and shipping address -->
    <div class="col-md-6 col-md-offset-3">
    	 <div id="login"  class="content auth">
    <h3 class="text-center mar_b1">USER PERSONAL INFO AND SHIPPING INFO</h3>
	<div class="login-container" id="message_s">
	</div>
    <form action="" method="post" accept-charset="utf-8" class="ui form login-container" id="user_update">
        <div class="row mar_0 field">
            <div class="col-md-3"> <label> User Name : </label> </div>
            <div class="col-md-9 pad_0">
               <input name="phps_usern" type="text" value="<?php echo $fetch1['usern']; ?>" placeholder="Username" autocomplete="off" readonly>
            </div>   
        </div>           
        <div class="row mar_0 field">
          <div class="col-md-3"> <label> First Name : </label> </div>
		  <div class="col-md-9 pad_0">
          	<input name="phps_usern" type="text" value="<?php echo $fetch1['fname']; ?>" placeholder="Username" autocomplete="off" id="fname">
          </div>	
        </div>
        <div class="row mar_0 field">
          <div class="col-md-3"> <label> Last Name : </label> </div> 
          <div class="col-md-9 pad_0">
          	<input name="phps_usern" type="text" value="<?php echo $fetch1['lname']; ?>" placeholder="Username" autocomplete="off" id="lname">
          </div>	
        </div>
        <div class="row mar_0 field">
          <div class="col-md-3"> <label> Email Address : </label> </div>
          <div class="col-md-9 pad_0">
            <input name="phps_usern" type="text" value="<?php echo $fetch1['email']; ?>" placeholder="Username" autocomplete="off" id="email">
           </div> 
        </div>
        <div class="row mar_0 field">
          <div class="col-md-3"> <label> Profile Name : </label> </div>
          <div class="col-md-9 pad_0">
            <input name="phps_usern" type="text" value="<?php echo $fetch1['pname']; ?>" placeholder="Username" autocomplete="off" id="pname">
           </div> 
        </div>
        <div class="row mar_0 field">
          <div class="col-md-3"> <label> Paypal Email Address : </label> </div>
          <div class="col-md-9 pad_0">
            <input name="phps_usern" type="text" value="<?php echo $fetch1['user_paypal']; ?>" placeholder="Username" autocomplete="off" id="user_paypal">
           </div> 
        </div>
        <div class="row mar_0 field">
          <div class="col-md-3"> <label> User Address : </label> </div>
          <div class="col-md-9 pad_0">
            <input name="phps_usern" type="text" value="<?php echo $fetch1['user_address']; ?>" placeholder="Username" autocomplete="off" id="user_address">
          </div>
        </div>
        <div class="row mar_0 field">
          <div class="col-md-3"> <label> Currency : </label> </div>
          <div class="col-md-9 pad_0">
            <input name="phps_usern" type="text" value="<?php echo $fetch1['user_currency']; ?>" placeholder="Username" autocomplete="off" readonly>
          </div>
        </div>
        <div class="row mar_0 field">
          <div class="col-md-3"> <label> User Shipping Address: </label> </div>
          <div class="col-md-9 pad_0">
            <input name="phps_usern" type="text" value="<?php echo $fetch1['user_address_shipping']; ?>" placeholder="Username" autocomplete="off" id="user_address_shipping">
          </div>
        </div>
        <div class="row mar_0 field">
        <div class="col-md-3"><label></label> </div>
        <div class="field mar_t1">
	        <button type="submit" name="update_user" class="ui green button fluid submit model_btn">Update</button>
	    </div>
	    </div>
    </form>
</div>
    </div>
                      <!-- login genral and shipping address -->
				   <?php
					}
					?>

					 <div class="payment_form text-center <?php if(empty($_SESSION['ps_usern'])){ echo "hidden";}?>">
						<div class="rent_product">
							<span class="name"><?php echo protect($row['name']); ?></span>
							<span class="price"><?php if($row['item_currency'] == USD) { ?><?php echo decode_currency($row['item_currency']); echo protect($row['price_extended']); ?><?php } ?><?php if($row['item_currency'] == EUR) { ?><?php echo protect($row['price_extended']); echo decode_currency($row['item_currency']); ?><?php } ?><?php if($row['item_currency'] == GBP) { ?><?php echo decode_currency($row['item_currency']); echo protect($row['price_extended']); ?><?php } ?></span>
						</div>
						<h5 class="total_payment">Total: <span><?php
						if($row['item_currency'] == USD) { ?><?php echo decode_currency($row['item_currency']); echo protect($row['price_extended']); ?><?php } ?><?php if($row['item_currency'] == EUR) { ?><?php echo protect($row['price_extended']); echo decode_currency($row['item_currency']); ?><?php } ?><?php if($row['item_currency'] == GBP) { ?><?php echo decode_currency($row['item_currency']); echo protect($row['price_extended']); ?><?php } ?></span></h5>
						<div class="paypal_wrp mar_t2">
							<?php
					if($id == !NULL) {
							define('EMAIL_ADD', $web['contact_email']); // For system notification.
							define('PAYPAL_EMAIL_ADD', protect($row['paypal_address']));

							// Setup class
							$p = new paypal_class( );					// initiate an instance of the class.
							$email = protect($_REQUEST['email']);
							$p -> admin_mail = EMAIL_ADD;
								$this_script = $web['url']."";
								  $item_name = protect($row['name'])."";
								  $user_email = protect(idinfo($_SESSION['ps_usern'],"email"));
								  $usern = mysql_real_escape_string(protect($_SESSION['ps_usern']));
								$p->add_field('business', PAYPAL_EMAIL_ADD); //don't need add this item. if your set the $p -> paypal_mail.
								$p->add_field('return', $this_script.'payment/&action=success');
								$p->add_field('cancel_return', $this_script.'cancelled');
								$p->add_field('notify_url', $this_script.'payment/&action=ipn');
								$p->add_field('item_name', protect($item_name));
								$p->add_field('item_number', protect($custom_url));
								$p->add_field('amount', protect($row['price_extended']));
								$p->add_field('currency_code', protect($row['item_currency']));
								$p->add_field('usern', protect($usern));
								$p->add_field('user_email', protect($user_email));
								$p->add_field('cmd', '_xclick');
								$p->add_field('rm', '2');	// Return method = POST

								// 0 � all shopping cart payments use the GET method
								// 1 � the buyer's browser is redirected to the return URL by using the GET method, but no payment variables are included
								// 2 � the buyer's browser is redirected to the return URL by using the POST method, and all payment variables are included The default is 0.

								 $p->submit_formnull_post(); // submit the fields to paypal

							define('EMAIL_ADD', $web['contact_email']); // For system notification.
							define('PAYPAL_EMAIL_ADD', protect($row['paypal_address']));

							// Setup class
							$p = new paypal_class( );					// initiate an instance of the class.
							$email = $_REQUEST['email'];
							$p -> admin_mail = EMAIL_ADD;
								$this_script = $web['url']."";
								  $item_name = protect($row['name'])."";
								  $user_email = protect(idinfo($_SESSION['ps_usern'],"email"));
								  $usern = mysql_real_escape_string($_SESSION['ps_usern']);
								$p->add_field('business', PAYPAL_EMAIL_ADD); //don't need add this item. if your set the $p -> paypal_mail.
								$p->add_field('return', $this_script.'payment/&action=success');
								$p->add_field('cancel_return', $this_script.'cancelled');
								$p->add_field('notify_url', $this_script.'payment/&action=ipn');
								$p->add_field('item_name', protect($item_name));
								$p->add_field('item_number', protect($custom_url));
								$p->add_field('amount', protect($row['price_extended']));
								$p->add_field('currency_code', protect($row['item_currency']));
								$p->add_field('usern', protect($usern));
								$p->add_field('user_email', protect($user_email));
								$p->add_field('cmd', '_xclick');
								$p->add_field('rm', '2');	// Return method = POST

								// 0 � all shopping cart payments use the GET method
								// 1 � the buyer's browser is redirected to the return URL by using the GET method, but no payment variables are included
								// 2 � the buyer's browser is redirected to the return URL by using the POST method, and all payment variables are included The default is 0.

								 $p->submit_paypal_post(); // submit the fields to paypal
					}
					else
					{
						echo error("Unknown product id.");
					}
					?>
						</div>
						<div class="pay_to_other mar_t1">
							<ul>
								<li><a href=""><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href=""><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href=""><i class="fa fa-cc-visa"></i></a></li>
							</ul>
						</div>
				    </div>
				    <?php
				    }
				    }
				    ?>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
</div>

 <div class="clearfix"></div>
<section>
<div id="single_product" class="container hide_p_f <?php if(!empty($_SESSION['ps_usern'])){ echo "hidden";}?>">
 <div class="row">
  <div class="col-md-12">
   <div class="bread_crumb col-md-4">
		<ul class="breadcrumb">
			<li><a href="">Home</a></li>
			<li><a href="">shoes</a></li>
			<li><a href="">sneaker</a></li>
		</ul>
   </div>
   <div class="col-md-8">
   		<div class="single_product_search">
						<form method="POST" action="<?php echo $web['url']; ?>search">
							<div class="form_wrp single_product_search_wrp">
								<span class="select_caret brand_select">
									<select id="" class="" name="phps_brand_query" <?php if(isset($_POST['phps_brand_query'])) { echo 'value="'.mysql_real_escape_string($_POST['phps_brand_query']).'"'; } ?>>
										<option disabled selected value>All designers</option>
										 <?php
$query = mysql_query("SELECT * FROM purchasify_brands ORDER BY id ASC");
$count=0;
$brand_array=array();
while($row_brand = mysql_fetch_assoc($query))
{
  foreach($row_brand as $key => $value)
  {
	$brand_array[$count][$key] = $value;
  }
  $count++;
  echo "<option value=".$row_brand['id'].">".$row_brand['name']."</option>";
}

?>
</select>
								</span>
								<span class="select_caret">
									<select id="" class="" name="phps_size_query">
										<option disabled selected value>All size</option>
										<?php
$query = mysql_query("SELECT * FROM purchasify_sizes ORDER BY id ASC");
while($row_size = mysql_fetch_array($query))
{
  echo "<option value=".$row_size['id'].">".$row_size['name']."</option>";
}
?>
									</select>
								</span>
								<span class="date_picker">
									<input type="text" id="datepicker3" data-date-format="d-m-Y" name="phps_date_query" placeholder="Delivery + Return Dates" class="datepicker" />
								</span>
								<span class="search_all_input"><input type="submit" value="SEARCH" name="phps_search"></span>
							</div>
						</form>
					</div>
   </div>

  </div>



  <div class="col-md-8 mar_t2 ">

   <div class="row">

    <div class="col-md-3 col-sm-3 col-xs-3">

	 <div id="img-view-pager" class="img_pager ">

	  <div class="img_shower active">

	   <a class="flex" id="active_img" href="#img1" data-toggle="tab">

	    <img class="img-responsive" src="<?php echo $web['url']; ?><?php echo protect($row['preview']); ?>" alt="<?php echo protect($row['name']); ?>">

	   </a>

	  </div>

	  <div class="img_shower">

	   <a class="flex" id="active_img" href="#img2" data-toggle="tab">

	    <img class="img-responsive" src="<?php echo $web['url']; ?><?php echo protect($row['main_file']); ?>" alt="<?php echo protect($row['name']); ?>">

	   </a>

	  </div>

	  <div class="img_shower">

	   <a class="flex" id="active_img" href="#img3" data-toggle="tab">

	    <img class="img-responsive" src="<?php echo $web['url']; ?><?php echo protect($row['thumbnail']); ?>" alt="<?php echo protect($row['name']); ?>">

	   </a>

	  </div>

			</div>

		</div>

					<div class="col-md-9 col-sm-9 col-xs-9">

						<div id="img_view" class="img_view">

							<div class="tab-content">

								<div class="view_img tab-pane active" id="img1" >

									<div class="large" style="background-image: url('<?php echo $web['url']; ?><?php echo protect($row['preview']); ?>');"></div>

									<img class="zoom_img" src="<?php echo $web['url']; ?><?php echo protect($row['preview']); ?>" alt="<?php echo protect($row['name']); ?>" class="img-responsive">

								</div>

								<div class="view_img tab-pane " id="img2">

									<div class="large" style="background-image: url('<?php echo $web['url']; ?><?php echo protect($row['main_file']); ?>');"></div>

									<img class="zoom_img"  src="<?php echo $web['url']; ?><?php echo protect($row['main_file']); ?>" alt="<?php echo protect($row['name']); ?>" class="img-responsive">

									</div>

								<div class="view_img tab-pane " id="img3">

									<div class="large" style="background-image: url('<?php echo $web['url']; ?><?php echo protect($row['thumbnail']); ?>');"></div>

									<img class="zoom_img"  src="<?php echo $web['url']; ?><?php echo protect($row['thumbnail']); ?>" alt="<?php echo protect($row['name']); ?>" class="img-responsive">

								</div>

							</div>

						</div>

					</div>

				</div>

				<div class="dress_style_advice">

					<h4>you need to style advice

						<a href="">talk to more services</a>

					</h4>

				</div>

			</div>

			<div class="col-md-4 mar_t2">

				<div class="product_detail">

					<div class="dress_detail">

						<h3 class="designer d_big"><?php

                        foreach ($brand_array as $key => $brand)

						{

							if($brand['id']==protect($row['brand']))

							{

								echo protect($brand['name']);

							}

						}

						//echo protect($row['brand']); ?></h3>

						<h4 class="product_name"><?php echo protect($row['name']); ?></h4>

					</div>

					<div class="product_price">

						<span class="price_big"><span class="dollar">$</span><?php echo protect($row['price_extended']); ?></span>RRP $<?php echo protect($row['price_regular']); ?>

					</div>

					<p class="product_discrtion">Make 4 interest free payments of $19.75 fortnightly and receive your order now</p>
					<!-- <form action=""> -->
						<div class="col-xs-6 pad_0">
						    <?php
							    if(protect($row['size']))
							    {
							    	foreach ($size_array as $key => $size)
						            {
							           if($size['id']==protect($row['size']))
							           {
								          echo "size ".protect($size['name']);
							           }
						            }
							     	//echo "size ".protect($row['size']);
							    }
							    else
							    {
							    ?>
                                <span class="select_input">
								<select id="" class="">

									<option disabled selected value>All designers</option>

									<?php

				                        foreach ($brand_array as $key => $brand)

										{

										  echo "<option value=".$brand['id'].">".$brand['name']."</option>";

										}

						                ?>

								</select></span>
                                <?php } ?>


						</div>

						<div class="col-xs-6 pad_0 text-center">

							<span><a href="#size" class="size_chart_link"><div class="dropdown">
    <span class="dropbtn">Size Guide</span>
    <div class="dropdown-content">
      <table align="center" width="100%">
        <thead>
          <tr>
            <th align="center">AU</th>
            <th align="center">INTL</th>
            <th align="center">US</th>
            <th align="center">EU</th>
            <th align="center">OTHER </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td align="center">4</td>
            <td align="center">XXS</td>
            <td align="center">0</td>
            <td align="center">32</td>
            <td align="center">-</td>
          </tr>
          <tr>
            <td align="center">6</td>
            <td align="center">XS</td>
            <td align="center">2</td>
            <td align="center">34</td>
            <td align="center">-</td>
          </tr>
          <tr>
            <td align="center">8</td>
            <td align="center">S</td>
            <td align="center">4</td>
            <td align="center">36</td>
            <td align="center">0</td>
          </tr>
          <tr>
            <td align="center">10</td>
            <td align="center">M</td>
            <td align="center">6</td>
            <td align="center">38</td>
            <td align="center">1</td>
          </tr>
          <tr>
            <td align="center">12</td>
            <td align="center">L</td>
            <td align="center">8</td>
            <td align="center">40</td>
            <td align="center">2</td>
          </tr>
          <tr>
            <td align="center">14</td>
            <td align="center">XL</td>
            <td align="center">10</td>
            <td align="center">42</td>
            <td align="center">3</td>
          </tr>
          <tr>
            <td align="center">16</td>
            <td align="center">XXL</td>
            <td align="center">12</td>
            <td align="center">44</td>
            <td align="center">-</td>
          </tr>
          <tr>
            <td align="center">18</td>
            <td align="center">XXXL</td>
            <td align="center">14</td>
            <td align="center">46</td>
            <td align="center">-</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div></a></span>

						</div>
						<div class="col-xs-12 pad_0 mar_t1">
							<div class="col-xs-6 pad_0 text-center">
								<span class="">
									<input type="text" id="datepicker4" class="single_product_date datepicker" data-date-format="d-m-Y" name="phps_date_query"  placeholder="Delivery + Return Dates" />
								</span>
							</div>
							<div class="col-xs-6 pad_0 text-center">

								<span class="select_input">
									<select id="" class="single_product_select">
										<option disabled selected value>Delivery & Return Type</option>
										<option value="Send to me by post">Send to me by post</option>
										<option value="I will pick up & return">I will pick up & return</option>
									</select></span>

								</div>
						</div>

						<div class="col-xs-12 pad_0"><span class="rent"><?php

						if($row['price_extended'] > 0.00 || !$_SESSION['ps_usern'])

						{

						?>

						<a id="open_payments">Hire Now</a>

						<?php

						}

						?>

					</a></span></div>

					<!-- </form> -->

					<div class="share_social">

						<p>

						<span class="capital">share</span>
						<!-- facebook share -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1767917903532738";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> 
<!--<img src = "index.jpg" width="100px" height="30px" class = "share_button" value1="<?php //echo "$row1['post_nj_job_title']*$row1['post_nj_no_post']*$last_dates*$row1['post_nj_orga_name']" ?>">-->

<i class="fa fa-facebook share_button" value1="<?php echo "p/".protect($row['custom_url']); echo "hirtv1".protect($row['preview']); ?>"></i>
<!-- facebook share -->
<!-- twitter share 
https://twitter.com/intent/tweet?text=Hello%20world
http://twitter.com/share?url=[url]&via=trucsweb&image-src=[img]&text=[title2.9k]-->

<a class="twitter-share-button1"
  href="http://twitter.com/share?text=this is very good product&url=<?php echo $web['url']; ?>p/<?php echo protect($row['custom_url']); ?>"
  data-size="large"><i class="fa fa-twitter"></i></a>
  <!--<a class="twitter-share-button1"
  href="https://twitter.com/share"
  data-size="large"
  data-text="custom share text"
  data-url="https://dev.twitter.com/web/tweet-button"
  data-hashtags="example,demo"
  data-via="twitterdev"
  data-related="twitterapi,twitter">
<i class="fa fa-twitter"></i>
</a>-->
<!-- twitter share -->
<!--
<a href=""><i class="fa fa-instagram"></i></a>
<a href=""><i class="fa fa-linkedin"></i></a>
-->
						</p>
					</div>

					<div class="view_more_wrp">

						<p>

							<!-- <span class="capital">view more</span>

							<a href="#">double trouble</a>

							<a href="#">tops</a>

							<a href="#">party time</a> -->

						</p>

					</div>

				</div>

			</div>

		</div>

	</div>

<!-- Item slider -->
<div id="footer_product" class="container <?php if(!empty($_SESSION['ps_usern'])){ echo "hidden";}?>">
<!-- <header id="myCarousel" class="carousel slide"> -->
    <header>
	<div class="row">
	    <div class="col-lg-12">
	        <h3 class="product_slider_head">For better choice</h3>
	    </div>
	</div>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<div class="slide_controls mar_b1">
            <a class="" href="#myCarousel" role="button" data-slide="prev">
            <span  aria-hidden="true" class="slide_prev">
            <img  class="img-responsive" src="<?php echo $web['url']; ?>static/img/icon/previous.svg" alt="">
            </span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="" href="#myCarousel" role="button" data-slide="next">
            <span  aria-hidden="true" class="slide_next"><img class="img-responsive" src="<?php echo $web['url']; ?>static/img/icon/skip.svg" alt="">
            </span>
            <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="carousel-inner" role="listbox">
<?php
$sql = mysql_query("SELECT * FROM purchasify_items");
$i=0;
while($row = mysql_fetch_array($sql))
{
    if($i==0)
    {
    ?>
       <div class="item active">
	   <div class="row">
    <?php
    }
    if($i%4==0 && $i!=0)
    {
    ?>
        </div>
        </div>
        <div class="item">
		<div class="row">
    <?php
    }
    ?>
    <div class="col-md-3 col-sm-6">
		<div class="panel  text-center">
			<div class="product_slider_img flex">
				<img class="img-responsive" src="<?php echo $web['url']; ?><?php echo protect($row['preview']); ?>" alt="<?php echo protect($row['name']); ?>"/>
			</div>
		    <div class="panel-body">
				<div class="prodct_detail text-center">
				    <h2 class="designer">
				    <?php
                        foreach ($brand_array as $key => $brand)
						{
							if($brand['id']==protect($row['brand']))
							{
								echo protect($brand['name']);
							}
						}
				    ?></h2>
				    <h3 class="name"><?php echo protect($row['name']); ?></h3>
				    <span class="rent_btns">Hire</span>
			    </div>
		    </div>
	    </div>
	</div>
    <?php
    $i++;
}
?>
</div>
</div>
</header>
</div>
<!-- Item slider end-->
</section>
<?php
include($_SERVER['DOCUMENT_ROOT']."/hautehire/source/footer.php");//include('footer.php');?>
<script>
//twitter
/*window.twttr = (function(d, s, id) 
{
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) 
  {
    t._e.push(f);
  };
  return t;
}(document, "script", "twitter-wjs"));*/
//twitter
</script>
<script>

$(document).ready(function()
{
	$("#user_update").submit(function(){
        //alert();
      //alert($("#rusertype").val());
        fname= $("#fname").val(),
        lname= $("#lname").val(),
        email= $("#email").val(),
        pname= $("#pname").val(),
        user_paypal=$("#user_paypal").val(),
        user_address=$("#user_address").val(),     
        user_address_shipping=$("#user_address_shipping").val(),
        //alert(regurl);
        
        $.ajax({
        type: "POST",
        url: "http://dev.imenso.co/hautehire/source/registerDataupdate.php",
        data : {fname:fname,update_user:"yes",lname:lname,email:email,pname:pname,user_paypal:user_paypal,user_address:user_address,user_address_shipping:user_address_shipping},
        success : function(response)
        {
          //alert();
          if(response.VerficationStatus=="AR")
          {   
            //$("#message_s").html('<p class="success">Error! All fields are required.</p>');
            $("#message_s").html('<p class="success">Error! Email , Profile Name , Paypal Email , User Shipping Address are required.</p>');
          }
          else if(response.VerficationStatus=="VE")
          {   
              $("#message_s").html('<p class="success">Error! Please enter valid e-mail address.</p>');
          }
          else if(response.VerficationStatus=="VE1")
          {   
              $("#message_s").html('<p class="success">Error! Please enter valid paypal e-mail address.</p>');
          }
          else if(response.VerficationStatus=="EE")
          {   
              $("#message_s").html('<p class="success">Error! Email already exists.</p>');
          }
          else if(response.VerficationStatus=="EE1")
          {   
              $("#message_s").html('<p class="success">Error! Paypal email already exists.</p>');
          }
          else if(response.VerficationStatus=="RS")
          {   
            $("#message_s").html('<p class="success">Update successfully.</p>');
          }
        },dataType: "json"  
    });
    return false;   
      });
	//facebook
	/*$('.share_button').click(function(e)
	{
		var info=$(this).attr("value1");
		arr =info.split('hirtv1');
		//alert(info);
		e.preventDefault();
		FB.ui(
		{
		method: 'feed',
		name: 'hello',
		link: 'http://dev.imenso.co/hautehire/'+arr[0],
		picture: 'http://dev.imenso.co/hautehire/'+arr[1],
		caption: 'hi',
		description: 'test1',
		message: 'test1'
		});
	});*/
	//facebook
	$('#open_payments').on('click', function()
	{
		$('.payment_process_wrp').removeClass('hidden');
	    $('#single_product').addClass('hidden');
     	$('#footer_product').addClass('hidden');
    });
	$('.img_shower').on('click', function()
	{
		$('.img_shower').removeClass('active');
		$(this).addClass('active');
	});
});

</script>



</body>

<script>
/*!
	magnifire
*/
(function ($) {
	var defaults = {
		url: false,
		callback: false,
		target: false,
		duration: 120,
		on: 'mouseover', // other options: grab, click, toggle
		touch: true, // enables a touch fallback
		onZoomIn: false,
		onZoomOut: false,
		magnify: 1
	};

	// Core Zoom Logic, independent of event listeners.
	$.zoom = function(target, source, img, magnify) {
		var targetHeight,
			targetWidth,
			sourceHeight,
			sourceWidth,
			xRatio,
			yRatio,
			offset,
			$target = $(target),
			position = $target.css('position'),
			$source = $(source);

		// The parent element needs positioning so that the zoomed element can be correctly positioned within.
		target.style.position = /(absolute|fixed)/.test(position) ? position : 'relative';
		target.style.overflow = 'hidden';
		img.style.width = img.style.height = '';

		$(img)
			.addClass('zoomImg')
			.css({
				position: 'absolute',
				top: 0,
				left: 0,
				opacity: 0,
				width: img.width * magnify,
				height: img.height * magnify,
				border: 'none',
				maxWidth: 'none',
				maxHeight: 'none'
			})
			.appendTo(target);

		return {
			init: function() {
				targetWidth = $target.outerWidth();
				targetHeight = $target.outerHeight();

				if (source === target) {
					sourceWidth = targetWidth;
					sourceHeight = targetHeight;
				} else {
					sourceWidth = $source.outerWidth();
					sourceHeight = $source.outerHeight();
				}

				xRatio = (img.width - targetWidth) / sourceWidth;
				yRatio = (img.height - targetHeight) / sourceHeight;

				offset = $source.offset();
			},
			move: function (e) {
				var left = (e.pageX - offset.left),
					top = (e.pageY - offset.top);

				top = Math.max(Math.min(top, sourceHeight), 0);
				left = Math.max(Math.min(left, sourceWidth), 0);

				img.style.left = (left * -xRatio) + 'px';
				img.style.top = (top * -yRatio) + 'px';
			}
		};
	};

	$.fn.zoom = function (options) {
		return this.each(function () {
			var
			settings = $.extend({}, defaults, options || {}),
			//target will display the zoomed image
			target = settings.target && $(settings.target)[0] || this,
			//source will provide zoom location info (thumbnail)
			source = this,
			$source = $(source),
			img = document.createElement('img'),
			$img = $(img),
			mousemove = 'mousemove.zoom',
			clicked = false,
			touched = false;

			// If a url wasn't specified, look for an image element.
			if (!settings.url) {
				var srcElement = source.querySelector('img');
				if (srcElement) {
					settings.url = srcElement.getAttribute('data-src') || srcElement.currentSrc || srcElement.src;
				}
				if (!settings.url) {
					return;
				}
			}

			$source.one('view_img.destroy', function(position, overflow){
				$source.off(".view_img");
				target.style.position = position;
				target.style.overflow = overflow;
				img.onload = null;
				$img.remove();
			}.bind(this, target.style.position, target.style.overflow));

			img.onload = function () {
				var zoom = $.zoom(target, source, img, settings.magnify);

				function start(e) {
					zoom.init();
					zoom.move(e);

					// Skip the fade-in for IE8 and lower since it chokes on fading-in
					// and changing position based on mousemovement at the same time.
					$img.stop()
					.fadeTo($.support.opacity ? settings.duration : 0, 1, $.isFunction(settings.onZoomIn) ? settings.onZoomIn.call(img) : false);
				}

				function stop() {
					$img.stop()
					.fadeTo(settings.duration, 0, $.isFunction(settings.onZoomOut) ? settings.onZoomOut.call(img) : false);
				}

				// Mouse events
				 if (settings.on === 'mouseover') {
					zoom.init(); // Preemptively call init because IE7 will fire the mousemove handler before the hover handler.

					$source
						.on('mouseenter.view_img', start)
						.on('mouseleave.view_img', stop)
						.on(mousemove, zoom.move);
				}

				// Touch fallback
				if (settings.touch) {
					$source
						.on('touchstart.view_img', function (e) {
							e.preventDefault();
							if (touched) {
								touched = false;
								stop();
							} else {
								touched = true;
								start( e.originalEvent.touches[0] || e.originalEvent.changedTouches[0] );
							}
						})
						.on('touchmove.view_img', function (e) {
							e.preventDefault();
							zoom.move( e.originalEvent.touches[0] || e.originalEvent.changedTouches[0] );
						})
						.on('touchend.view_img', function (e) {
							e.preventDefault();
							if (touched) {
								touched = false;
								stop();
							}
						});
				}

				if ($.isFunction(settings.callback)) {
					settings.callback.call(img);
				}
			};

			img.src = settings.url;
		});
	};

	$.fn.zoom.defaults = defaults;
}(window.jQuery));
$(document).ready(function()
{
  $('#img1,#img2,#img3').zoom();
});
</script>
<script>
    new WOW().init();
</script>

</html>

<!--

<div class="container">

		<div class="row">

			<div class="col-md-8">

				<div class="row">

					<div class="col-md-3 col-sm-3 col-xs-3">

						<div id="img-view-pager" class="img_pager">

							<div class="img_shower"><a  href="#img1" data-toggle="tab"><img class="img-responsive" src="images/dress/1.png" alt=""></a></div>

							<div class="img_shower"><a  href="#img2" data-toggle="tab"><img class="img-responsive" src="images/dress/2.png" alt=""></a></div>

							<div class="img_shower"><a  href="#img3" data-toggle="tab"><img class="img-responsive" src="images/dress/3.png" alt=""></a></div>

						</div>

					</div>

					<div class="col-md-9 col-sm-9 col-xs-9">

						<div id="img_view" class="img_view">

							<div class="tab-content">

								<div class="view_img tab-pane  active" id="img1"><img src="images/dress/1.png" alt="" class="img-responsive"></div>

								<div class="view_img tab-pane " id="img2"><img src="images/dress/2.png" alt="" class="img-responsive"></div>

								<div class="view_img tab-pane " id="img3"><img src="images/dress/3.png" alt="" class="img-responsive"></div>

							</div>

						</div>

					</div>

				</div>

			</div>

			<div class="col-md-4"></div>

		</div>

	</div>

-->
