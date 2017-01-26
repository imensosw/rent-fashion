<?php 
include("header/header-user_access.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Add new product - <?php echo $web['title']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php echo $web['description']; ?>">
		<meta name="author" content="Spreadrr Design">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
		<!-- Stylesheets -->
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/elements.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/semantic.min.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/packed_global.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/packed_user.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/modal/css/style.css">
		<!-- multiselect city -->

                <link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/bootstrap-select.css">
		<!-- End Stylesheets -->

		<!-- Favicons -->
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $web['url']; ?>static/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $web['url']; ?>static/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $web['url']; ?>static/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $web['url']; ?>static/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $web['url']; ?>static/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $web['url']; ?>static/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $web['url']; ?>static/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $web['url']; ?>static/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $web['url']; ?>static/favicons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-32x32.png" sizes="32x32">
		<meta name="msapplication-TileColor" content="#2b5797">
		<meta name="msapplication-TileImage" content="<?php echo $web['url']; ?>static/favicons/mstile-144x144.png">
		<!-- End Favicons -->

</head>
<body>
	<!-- HEADER START -->
	<div class="sellfy-header-wrap">
	  <div class="ui two column grid full-width sellfy-header">
	   <div class="row">
			 <div class="left aligned column">
	 		  <a href="<?php echo $web['url']; ?>" class="dash_logo"><img src="../hautehire/static/img/logo.png" alt="logo_header" class="img-responsive"/></a>
	 		</div>
				<div class="right aligned column connect-panel">
			<a class="menu-link dashboard active" href="<?php echo $web['url']; ?>dashboard" data-pushstate="true" title="Go to my dashboard">Dashboard</a>
		 
		    <div class="ui top right pointing dropdown text header-dropdown-right" tabindex="0">
			<span class="header-merchant-logo header-dropdown-url" style="background-image: url('<?php if(idinfo($_SESSION['ps_usern'],'avatar') !== NULL) { ?><?php echo idinfo($_SESSION['ps_usern'],'avatar'); ?><?php } ?><?php if(idinfo($_SESSION['ps_usern'],'avatar') == NULL) { ?><?php echo $web['url']; ?>static/img/profile-placeholder.png<?php } ?>')"></span> <i class="fa fa-angle-down"></i>

		  <div class="menu header-notification-dropdown" tabindex="-1">
			<div class="item">
			  <!--<a id="profile_link" href="<?php //echo $web['url']; ?>user/<?php //echo $_SESSION['ps_usern']; ?>" title="My profile">My profile</a>-->
			  <a id="profile_link" href="<?php echo $web['url']; ?>account/profile" title="My profile">My profile</a>
			</div>

			<div class="ui divider"></div>

			<div class="item">
			  <a href="<?php echo $web['url']; ?>upload" data-pushstate="true" title="Upload a product">Upload</a>
			</div>

			<div class="item">
			  <a href="<?php echo $web['url']; ?>products" data-pushstate="true" title="View my products">Products</a>
			</div>

			<div class="item">
			  <a href="<?php echo $web['url']; ?>account/purchases" data-pushstate="true" title="View my purchases">Purchases</a>
			</div>
            <!--
			<div class="item">
			  <a href="<?php //echo $web['url']; ?>account/offers" data-pushstate="true" title="View offers">Offers</a>
			</div>
            -->
			<?php if(idinfo($_SESSION['ps_usern'],"role") == 1) { ?>
			<div class="ui divider"></div>

			<div class="item">
			  <a href="<?php echo $web['url']; ?>admin/settings" data-pushstate="true" title="Edit my settings">Settings</a>
			</div>

			<div class="item">
			  <a href="https://docs.spreadrr.com/" target="_blank" title="Contact Spreadrr">Help &amp; Support</a>
			</div>
			<?php } ?>

			<div class="ui divider"></div>

			<div class="item">
			  <a href="<?php echo $web['url']; ?>logout" title="Log out">Log out</a>
			</div>
		  </div>
		 </div>
		</div>
	   </div>
	  </div>
	</div>
	<!-- HEADER END -->
	<!-- BODY START -->
	<div class="body">
	<div class="body-content">
	<div id="container" class="main-content-wrap">
	<div class="user-area-wrap">
	<?php
			if(isset($_POST['phps_upload'])) {

				$name = mysql_real_escape_string($_POST['name']);
				$author = mysql_real_escape_string($_SESSION['ps_usern']);
						$description = mysql_real_escape_string($_POST['description1']);
						$price_regular = mysql_real_escape_string($_POST['price_regular']);
						$price_extended = mysql_real_escape_string($_POST['price_extended']);
						$item_currency = mysql_real_escape_string(idinfo($_SESSION['ps_usern'],'user_currency'));
						$author_profile = mysql_real_escape_string(idinfo($_SESSION['ps_usern'],'pname'));
						$author_avatar = mysql_real_escape_string(idinfo($_SESSION['ps_usern'],'avatar'));
						$paypal_address = mysql_real_escape_string(idinfo($_SESSION['ps_usern'],'user_paypal'));
						$status = 0;//r
						$quotas = mysql_real_escape_string(idinfo($_SESSION['ps_usern'],'quotas') - 1);
						$demo_url = mysql_real_escape_string($_POST['demo_url']);
						$screenshots_url = mysql_real_escape_string($_POST['screenshots_url']);
						$featured = mysql_real_escape_string($_POST['featured']);
						$membership = mysql_real_escape_string($_POST['membership']);
						$brand = mysql_real_escape_string($_POST['brand']);
						$size = mysql_real_escape_string($_POST['size']);
						$country = mysql_real_escape_string($_POST['country']);
						$state = mysql_real_escape_string($_POST['state']);
						$city_array = $_POST['city'];
						if(!empty($city_array))
						{
						  $city_str = implode("/",$city_array);
						}
						else
						{
                          $city_str = "";
						}

						$city = mysql_real_escape_string($city_str);

						$address = mysql_real_escape_string($_POST['address']);

						$sales = 0;//r
						$download = 0;//r
						$comments = 0;//r$thumbnail $preview $main $category_id $status

						$video_url = mysql_real_escape_string($_POST['video_url']);
						$custom_url = mysql_real_escape_string($_POST['custom_url']);
						$category_id = mysql_real_escape_string($_POST['category_id']);
						$category_id = 0;
						$thumbnail = mysql_real_escape_string($_FILES['thumbnail_file']['name']);
						$preview = mysql_real_escape_string($_FILES['preview_file']['name']);
						$main = mysql_real_escape_string($_FILES['main_file']['name']);
						$check_dir = $web['main_folder_name'];
/*$url_exists = mysql_query("SELECT * FROM purchasify_items WHERE custom_url='$custom_url'");
$urlchecker = mysql_fetch_array($url_exists);*/
if(!is_dir($check_dir)) 
{ 
	mkdir($check_dir); $contents = '<?php header("Location: ../"); ?>'; file_put_contents($check_dir."index.php",$contents);
}
//if(empty($name) or empty($custom_url) or empty($description) or empty($price_extended))
if(empty($name) or empty($description) or empty($price_extended)) 
{ 
	echo error('<p align="center">You must fill in <strong>all required fields</strong> before to continue.</p>'); 
}
elseif(!is_numeric($price_extended)) 
{ 
	echo '<div class="alert color red-color"><p align="center">Price must be with numeric for example: 15.00 or 15</p></div>'; 
}
/*elseif($urlchecker > 1) 
{ 
	echo error("Error! Custom URL already exists."); 
}*/
else 
{
	$insert = mysql_query("INSERT purchasify_items (item_currency,author_profile,author_avatar,paypal_address,status,name,author,description,price_regular,price_extended,demo_url,screenshots_url,featured,membership,brand,size,country,state,cities,address,sales,downloads,comments,video_url,custom_url,category_id,thumbnail,preview,main_file) VALUES ('$item_currency','$author_profile','$author_avatar','$paypal_address','$status','$name','$author','$description','$price_regular','$price_extended','$demo_url','$screenshots_url','$featured','$membership','$brand','$size','$country','$state','$city','$address','$sales','$download','$comments','$video_url','$custom_url','$category_id','$thumbnail','$preview','$main')") or die(mysql_error());
	$update = mysql_query("UPDATE purchasify_users SET quotas='$quotas' WHERE usern='" . mysql_real_escape_string($_SESSION['ps_usern']) . "'");
							$row = mysql_fetch_array(mysql_query("SELECT * FROM purchasify_items ORDER BY id DESC LIMIT 1"));
							$folder_name = $row['id'] * 2;
							$folder_name_2 = $folder_name * 5;
							$check_dir1 = 'uploads/'.$folder_name;
							$check_dir2 = $check_dir.'/'.$folder_name_2;
							if(!is_dir($check_dir1)) { mkdir($check_dir1); }
							if(!is_dir($check_dir2)) { mkdir($check_dir2); }
							$thumbnail_path = $check_dir1."/".mysql_real_escape_string(basename($_FILES['thumbnail_file']['name']));
							$preview_path = $check_dir1."/".mysql_real_escape_string(basename($_FILES['preview_file']['name']));
							$main_path = $check_dir2."/".mysql_real_escape_string(basename($_FILES['main_file']['name']));
							$error = 0;
							$upload_path = './';
							if(@move_uploaded_file($_FILES['thumbnail_file']['tmp_name'], $upload_path.$thumbnail_path)) { $error = 0; } else { $error = 1; }
							if(@move_uploaded_file($_FILES['preview_file']['tmp_name'], $upload_path.$preview_path)) { $error = 0; } else { $error = 1; }
							if(@move_uploaded_file($_FILES['main_file']['tmp_name'], $upload_path.$main_path)) { $error = 0; } else { $error = 1; }
							if($error == 0) {
								$update = mysql_query("UPDATE purchasify_items SET thumbnail='$thumbnail_path',preview='$preview_path',main_file='$main_path' WHERE id='" . mysql_real_escape_string($row['id']) . "'");
								$link = '<a href="'.$web['url'].'item/'.protect($row['custom_url']).'">'. protect($row['name']) .'</a>';
								echo '<div class="alert color blue">';
								//echo '<p align="center"><a href="'.$web[url].'item/'.$row[custom_url].'"><span style="color:white">Item was added successfully. Preview here: '. protect($row['name']) .'</span></a></p>';
								echo '<p align="center"><a href="'.$web[url].'preview/'.$row[id].'"><span style="color:white">Item was added successfully. Preview here: '. protect($row['name']) .'</span></a></p>';
								echo '</div>';
							} else {
								echo '<div class="alert color red-color">';
								echo '<p align="center">Uploading error! <strong>Please try again.</strong></p>';
								echo '</div>';
							}
						}
			}
			?>
	  <div class="ui stackable grid">
	   <div class="column left-navigation" id="container_for_navigation">
		<div class="ui fluid vertical menu">
		  <a class="green item" href="<?php echo $web['url']; ?>dashboard" data-pushstate="true">Dashboard</a>

		  <div class="header item">
			Products
		  </div>

		  <div class="item submenu-wrap">
			<div class="menu submenu">

				<a class="green item active" href="<?php echo $web['url']; ?>upload" data-pushstate="true">
				  Add new product
				</a>

				<a class="green item " href="<?php echo $web['url']; ?>products" data-pushstate="true">
				  My products
				</a>

				<?php if(idinfo($_SESSION['ps_usern'],"role") == 1) { ?>
				<a class="green item " href="<?php echo $web['url']; ?>products/all" data-pushstate="true">
				  All products
				</a>
				<?php } ?>

			</div>
		  </div>

		  <div class="header item">
			My Account
		  </div>

		  <div class="item submenu-wrap">
			<div class="menu submenu">

				<a class="green item " href="<?php echo $web['url']; ?>account/profile" data-pushstate="true">
				  Edit Profile
				</a>

				<a class="green item " href="<?php echo $web['url']; ?>account/payment" data-pushstate="true">
				  Payment Options
				</a>

				<a class="green item " href="<?php echo $web['url']; ?>account/password" data-pushstate="true">
				  Change password
				</a>

				<a class="green item " href="<?php echo $web['url']; ?>account/purchases" data-pushstate="true">
				  Purchases
				</a>
<!--
				<a class="green item " href="<?php //echo $web['url']; ?>account/offers" data-pushstate="true">
				  Offers
				</a>
-->
			</div>
		  </div>

		  <?php if(idinfo($_SESSION['ps_usern'],"role") == 1) { ?>
		  <div class="header item">
			Settings
		  </div>

		  <div class="item submenu-wrap">
			<div class="menu submenu">
				<a class="green item " href="<?php echo $web['url']; ?>admin/settings" data-pushstate="true">System</a>
				<a class="green item " href="<?php echo $web['url']; ?>admin/options" data-pushstate="true">Additional</a>
				<a class="green item " href="<?php echo $web['url']; ?>admin/payments" data-pushstate="true">Payment</a>
			</div>
		  </div>
		  <?php } ?>

		  <a class="green item " href="<?php echo $web['url']; ?>logout" data-pushstate="true">Log out</a>
		</div>
	   </div>
	   <div class="column main-content" id="content_container">
		<div id="content">
		  <div id="container_for_title"></div>
		  <div id="container_for_page_body">
		<div id="container_for_title">
		  <div class="head-description">
			<div class="ui grid full-width">
			  <div class="equal height two column row">
				<div class="column">
				  <h2 class="ui header">

					  Add new

					  product
				  </h2>
				</div>

			  </div>

			  <div class="row">
				<div class="column">
				  Upload your product file. You can upload any file format up to <?php echo ini_get('upload_max_filesize'); ?>.
				</div>
			  </div>

			</div>
		  </div>
		</div>

		<?php
		/*if(idinfo($_SESSION['ps_usern'],'user_paypal') == NULL)
		{
			?>
		  <div class="ui ignored warning message visible">
			You need to edit your payment options before adding a product. <a style="color:#333!important;font-weight:bold;text-decoration:underline;" href="<?php echo $web['url']; ?>account/payment">Let's go!</a>
		  </div>
		<?php
		} */
		?>
	<?php
	//if(idinfo($_SESSION['ps_usern'],"quotas") == 0)
	//{
	?>
		 <!-- <div class="ui ignored warning message visible">
			You can't upload a product because you've reached your quota. <a style="color:#333!important;font-weight:bold;text-decoration:underline;" href="<?php //echo $web['url']; ?>upgrade">Upgrade now</a> or <a style="color:#333!important;font-weight:bold;text-decoration:underline;" href="<?php //echo $web['url']; ?>upgrade/redeem">Redeem code</a>
		  </div>-->
	<?php
	//}
	//else
	//{ ?>
	<?php
	    /*if(idinfo($_SESSION['ps_usern'],'pname') == NULL)
		{
			?>
		  <div class="ui ignored warning message visible">
			You need to edit your profile name before adding a product. <a style="color:#333!important;font-weight:bold;text-decoration:underline;" href="<?php echo $web['url']; ?>account/profile">Let's go!</a>
		  </div>
		<?php
		}
		else
		{ */
			?>

		<div id="container_for_page_body">
			<form action="" class="product-edit-form" accept-charset="utf-8" method="POST" enctype="multipart/form-data">
				<div id="new_product_container" class="boxtop new-product-container">
					<div id="product-basic" class="product-tab">

						<div class="product-drag-drop" id="droptext" style="display: none;">
							<a class="ui button green product-upload-file">
								Select product file
							</a>
						</div>

						<div class="ui grid form full-width product-upload-form-wrap  editing">
						  <!-- PRODUCT MAIN FILE -->
							<div class="two column row marginless">
							  <div class="column">
								<label class="product-add-picture" id="add_product_picture">Add product file</label>
							  </div>
							  <div class="right aligned column">
								<label id="recommended_picture_size">(Recommended filetype .ZIP)</label>
							  </div>
							</div>
							<div class="row">
								<div class="column product-images">
									<div style="width:100%" class="product-images-thumbnail placeholder drop-area no-images">
										<br><i class="fa fa-cloud-upload fa-5x"></i><br>
										<input name="main_file" class="ui basic button" type="file"/>
									</div>
								</div>
							</div>

							<!-- INFORMATION -->
							<div class="row">
								<div class="column">

									<div class="ui divider striped product-image-divider"></div>

									<div class="field">
										<label for="name">Product name</label>
										<input type="text" placeholder="Product name..." value="" name="name" id="name" required>
									</div>
									<!-- <center><a href="https://docs.spreadrr.com/11-why-i-can-t-use-discount-field-on-upload" target="_blank"> Why DISCOUNT field is disabled?</a></center> -->
									<center>To make a free product please put <strong>0.00</strong> in the field <strong>PRICE</strong></center>
									<span>&nbsp;</span>
									<!-- <div class="two fields">
									<div class="field">
									  <div class="ui input join" disabled>
                                        <div class="ui dropdown selection product-currency" tabindex="0">
                                            <center><div class="text"><s>DISCOUNT</s></div></center>
                                        </div>
                                        <input class="join" type="text" placeholder="0.00" value="" name="price_regular" id="price_regular" disabled>
                                      </div>
									</div> -->
									<div class="field">
									  <div class="ui input join">
                                        <div class="ui dropdown selection product-currency" tabindex="0">
                                            <center><div class="text">RRP</div></center>
                                        </div>
                                        <input class="join" type="text" placeholder="1.00" value="" name="price_regular" id="price_extended" required>
                                      </div>
									</div>
									<div class="field">
									  <div class="ui input join">
                                        <div class="ui dropdown selection product-currency" tabindex="0">
                                            <center><div class="text">Hire</div></center>
                                        </div>
                                        <input class="join" type="text" placeholder="1.00" value="" name="price_extended" id="price_extended" required>
                                      </div>
									</div>
									<!-- </div> -->
									<br>
									<div class="field">
										<label for="description1">Product description</label>
										<textarea placeholder="Description..." name="description1" id="description1"></textarea>
									</div>
<?php
if(idinfo($_SESSION['ps_usern'],"role") == 0)
{
?>
									<!--<div class="ui grid">
									  <div class="two column row fields">
										<div class="equal height two column row fields product-upload-price-field">
											<label for="demo_url">Demo URL (optional)</label>
											<input type="text" placeholder="https://demo.yoursite.com/" value="" name="demo_url" id="demo_url">
										</div>
										<div class="equal height two column row fields product-upload-price-field">
											<label for="screenshots_url">Screenshots URL (optional)</label>
											<input type="text" placeholder="https://yoursite.com/screenshots" value="" name="screenshots_url" id="screenshots_url">
										</div>
									  </div>
									</div>
									<div class="ui grid">
									  <div class="two column row fields">
										<div class="equal height two column row fields product-upload-price-field">
											<label for="video_url">YouTube Video ID (optional)</label>
											<input type="text" placeholder="e.g: Lg-WPNpBhp4" value="" name="video_url" id="video_url">
										</div>
										<div class="equal height two column row fields product-upload-price-field">
											<label for="custom_url">Custom URL (5 characters max)</label>
											<input type="text" placeholder="ol8Hw" maxlength="5" value="" name="custom_url" id="custom_url" required>
										</div>
									  </div>
									</div>-->
									<?php } ?>
									<?php if(idinfo($_SESSION['ps_usern'],"role") == 1) { ?>
									<!--<div class="ui grid">
									  <div class="two column row fields">
										<div class="equal height two column row fields product-upload-price-field">
											<label for="video_url">YouTube Video ID (optional)</label>
											<input type="text" placeholder="e.g: Lg-WPNpBhp4" value="" name="video_url" id="video_url">
										</div>
										<div class="equal height two column row fields product-upload-price-field">
											<label for="custom_url">Custom URL (5 characters max)</label>
											<input type="text" placeholder="ol8Hw" maxlength="5" value="" name="custom_url" id="custom_url" required>
										</div>
									  </div>
									</div>
									<div class="ui grid">
									  <div class="two column row fields">
									    <div class="equal height two column row fields product-upload-price-field">
											<label for="demo_url">Demo URL (optional)</label>
											<input type="text" placeholder="https://demo.yoursite.com/" name="demo_url" id="demo_url">
										</div>
									    <div class="equal height two column row fields product-upload-price-field">
											<label for="screenshots_url">Screenshots URL (optional)</label>
											<input type="text" placeholder="https://yoursite.com/screenshots" name="screenshots_url" id="screenshots_url">
										</div>
									  </div>
									</div>

									<div class="ui grid">
									  <div class="two column row fields">
										<div class="equal height two column row fields public-switch-row">
											<div class="ui toggle checkbox store-page-checkbox checked">
												<input type="checkbox" name="featured" id="featured">
												<label id="store_page" for="featured" class="public_label">Visible on homepage ?</label>
											</div>
										</div>
										<div class="equal height two column row fields public-switch-row">
											<div class="ui toggle checkbox store-page-checkbox checked">
												<input type="checkbox" name="membership" id="membership">
												<label id="membership_page" for="membership" class="public_label">Membership plan product ?</label>
											</div>
										</div>
									  </div>
									</div>-->
									<?php } ?>
									<div class="ui grid">
									  <div class="two column row fields">
										<div class="equal height two column row fields public-switch-row">
											<div class="ui toggle checkbox store-page-checkbox checked">
												<input type="checkbox" name="featured" id="featured">
												<label id="store_page" for="featured" class="public_label">Visible on homepage ?</label>
											</div>
										</div>
										<div class="equal height two column row fields public-switch-row">
											<div class="ui toggle checkbox store-page-checkbox checked">
												<input type="checkbox" name="membership" id="membership">
												<label id="membership_page" for="membership" class="public_label">Membership plan product ?</label>
											</div>
										</div>
									  </div>
									</div>
									<div class="ui grid">
									  <div class="two column row fields">
									    <div class="equal height two column row fields product-upload-price-field">
											<label for="demo_url">Brand</label>
											<select name="brand">
											   <option value="">Select All</option>
											   <?php
											   $query = mysql_query("SELECT * FROM purchasify_brands ORDER BY id ASC");
while($row_brand = mysql_fetch_array($query))
{
  echo "<option value=".$row_brand['id'].">".$row_brand['name']."</option>";
}

											   ?>
											</select>
										</div>
									    <div class="equal height two column row fields product-upload-price-field">
											<label for="screenshots_url">Size</label>
											<select name="size">
											   <option value="">Select All</option>
											    <?php
											   $query = mysql_query("SELECT * FROM purchasify_sizes ORDER BY id ASC");
while($row_brand = mysql_fetch_array($query))
{
  echo "<option value=".$row_brand['id'].">".$row_brand['name']."</option>";
}

											   ?>
											</select>

										</div>
									  </div>
									</div>
									<div class="ui grid">
									  <div class="two column row fields">
									    <div class="equal height two column row fields product-upload-price-field">
											<label for="demo_url">Country</label>
											<?php

											$query = mysql_query("SELECT * FROM purchasify_countries ORDER BY name ASC");

    //Count total number of rows
    $rowCount = mysql_num_rows($query) or die(mysql_error());
    ?>
    <select name="country" id="country">
        <option value="">Select Country</option>
        <?php
        if($rowCount > 0){
            while($row = mysql_fetch_array($query))
            {
                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
            }
        }else{
            echo '<option value="">Country not available</option>';
        }
        ?>
    </select>
</div>
<div class="equal height two column row fields product-upload-price-field">
	<label for="screenshots_url">State</label>
	<select name="state" id="state">
	  <option value="">Select country first</option>
    </select>

</div>
</div>
</div>
<div class="ui grid">
<div class="two column row fields">
<div class="equal height two column row fields product-upload-price-field" id="city_ul">

	<label for="demo_url">City</label>
	<select name="city[]" id="city" multiple="multiple" class="selectpicker selectpicker1">
	  <option value="">Select State first</option>
    </select>



										</div>
									    <div class="equal height two column row fields product-upload-price-field">
											<label for="screenshots_url">Address</label>
											<input type="text" name="address" placeholder="Enter Address" />
										</div>
									  </div>
									</div>
								</div>
							</div>

							<div class="ui divider striped product-image-divider"></div>

							<!-- PRODUCT IMAGES -->
							<div class="two column row marginless">
							  <div class="column">
								<label class="product-add-picture" id="add_product_picture">Add product preview</label>
							  </div>
							  <div class="right aligned column">
								<label id="recommended_picture_size">(JPEG recommended)</label>
							  </div>
							</div>
							<div class="row">
								<div class="column product-images">
									<div style="width:100%" class="product-images-thumbnail placeholder drop-area no-images">
										<br><i class="fa fa-cloud-upload fa-5x"></i><br>
										<input class="ui basic button" name="preview_file" type="file"/>
									</div>
								</div>
							</div>
							<div class="two column row marginless">
							  <div class="column">
								<label class="product-add-picture" id="add_product_picture">Add product thumbnail</label>
							  </div>
							  <div class="right aligned column">
								<label id="recommended_picture_size">(80x80 &amp; JPEG recommended)</label>
							  </div>
							</div>
							<div class="row">
								<div class="column product-images">
									<div style="width:100%" class="product-images-thumbnail placeholder drop-area no-images">
										<br><i class="fa fa-cloud-upload fa-5x"></i><br>
										<input class="ui basic button" name="thumbnail_file" type="file"/>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
				</div>
				<div class="setting-button-holder  editing">
					<div class="ui three column grid">
						<div class="row equal height">

							<div class="centered center aligned two wide column">
								<input type="submit" name="phps_upload" value="Create product" class="ui button green submit_product">
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php //} ?>
	<?php //} ?>
		<div id="product_share_modal_holder"></div>
		</div>
		  <div id="container_for_pagintion"></div>
		</div>
	   </div>
	  </div>
	</div>
	</div>
	</div>
	</div>
	<!-- BODY END -->
	<!-- FOOTER START -->
	<div class="centered footer">
	  <a class="icon-sellfy-logo"  href="<?php echo $web['url']; ?>"></a>
	  <p>
		<span class="item">
		  <?php echo $web['footer_text']; ?>
		</span>
	  </p>
	  <p class="footer-copyright">
		<span class="item">
		  &copy; <?php
		  date_default_timezone_set('Asia/Kolkata');
		  echo date("Y"); ?> <?php echo $web['sitename']; ?>, All rights reserved | Made with <i style="color:#ea6052;" class="fa fa-heart"></i> by <strong>The Spreadrr Team</strong>
		</span>
		<form method="post">

	</div>
	<!-- FOOTER END -->

	<!-- FOOTER CODE -->
	<script type="text/javascript">
	tinymce.init({
		selector: "textarea",
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
	</script>
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/scripts.min.js"></script>
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/packed_global.js?51b2b110"></script>
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/packed_user.js?0a5e83c1"></script>

	 <!-- multiselect city -->
     <script src="<?php echo $web['url']; ?>static/gen/bootstrap-select.js"></script>

	<script type="text/javascript">
$(document).ready(function()
{
    $('#country').on('change',function()
    {
        var countryID = $(this).val();
        //alert(countryID);

        if(countryID)
        {

         var xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function()
         {
             if (this.readyState == 4 && this.status == 200)
             {
                 document.getElementById("state").innerHTML = this.responseText;
             }
         };
         xhttp.open("GET", "http://dev.imenso.co/hautehire/source/ajaxData.php?country_id="+countryID, true);
         xhttp.send();
        }
        else
        {
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>');
        }
    });
    $('#state').on('change',function()
    {
        var stateID = $(this).val();
        //alert(stateID);

        if(stateID)
        {

         var xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function()
         {
             if (this.readyState == 4 && this.status == 200)
             {
                 var rtext = this.responseText;
                 duce = $.parseJSON(rtext);
                 jQuery(".dropdown-menu").children("ul").html(duce[0]);
                 document.getElementById("city").innerHTML = duce[1];

                 //$('#city_ul').load(location.href + " #city_ul");
		//$('#city_ul').find('.dropdown-menu').remove();
                jQuery('.selectpicker').selectpicker('refresh');

                 //$('.selectpicker').selectpicker('refresh');

             }
         };

         xhttp.open("GET", "http://dev.imenso.co/hautehire/source/ajaxData.php?state_id="+stateID, true);
         xhttp.send();
         //$("#city").load(location.href + " #city");
        }
        else
        {
            $('#city').html('<option value="">Select state first</option>');
        }

    });
});
</script>
	<!-- FOOTER CODE -->

	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  -->
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
       

</body>
</html>
