<?php include("header/header-user_access.php"); 
//echo "fgh";
//die();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>My Purchases - <?php echo $web['title']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php echo $web['description']; ?>">
		<meta name="author" content="Spreadrr Design">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


		<!-- Stylesheets -->
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/elements.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/semantic.min.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/packed_global.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/packed_user.css"><link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/modal/css/style.css">
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
			 <div class="left aligned column">	 		 <a href="<?php echo $web['url']; ?>" class="dash_logo"><img src="../../hautehire/static/img/logo.png" alt="logo_header" class="img-responsive"/></a>	 	 </div>
		<div class="right aligned column connect-panel">
			<a class="menu-link dashboard" href="<?php echo $web['url']; ?>dashboard" data-pushstate="true" title="Go to my dashboard">Dashboard</a>
		 <div class="ui top right pointing dropdown text header-dropdown-right" tabindex="0">
			<span class="header-merchant-logo header-dropdown-url" style="background-image: url('<?php if(idinfo($_SESSION['ps_usern'],'avatar') !== NULL) { ?><?php echo protect(idinfo($_SESSION['ps_usern'],'avatar')); ?><?php } ?><?php if(idinfo($_SESSION['ps_usern'],'avatar') == NULL) { ?><?php echo $web['url']; ?>static/img/profile-placeholder.png<?php } ?>')"></span> <i class="fa fa-angle-down"></i>

		  <div class="menu header-notification-dropdown" tabindex="-1">
			<div class="item">
			  <!--<a id="profile_link" href="<?php //echo $web['url']; ?>user/<?php //echo protect($_SESSION['ps_usern']); ?>" title="My profile">My profile</a>-->
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
			  <a href="<?php echo $web['url']; ?>account/purchases" data-pushstate="true" title="View my purchases" class="active">Purchases</a>
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
						//$category_id = mysql_real_escape_string($_POST['category_id']);
						$category_id = 0;
						$thumbnail = mysql_real_escape_string($_FILES['thumbnail_file']['name']);
						$preview = mysql_real_escape_string($_FILES['preview_file']['name']);
						$main = mysql_real_escape_string($_FILES['main_file']['name']);
						$check_dir = $web['main_folder_name'];
						$url_exists = mysql_query("SELECT * FROM purchasify_items WHERE custom_url='$custom_url'");
						$urlchecker = mysql_fetch_array($url_exists);
						if(!is_dir($check_dir)) { mkdir($check_dir); $contents = '<?php header("Location: ../"); ?>'; file_put_contents($check_dir."index.php",$contents); }

						if(empty($name) or empty($custom_url) or empty($description) or empty($price_extended)) { echo error('<p align="center">You must fill in <strong>all required fields</strong> before to continue.</p>'); }
						elseif(!is_numeric($price_extended)) { echo '<div class="alert color red-color"><p align="center">Price must be with numeric for example: 15.00 or 15</p></div>'; }
						elseif($urlchecker > 1) { echo error("Error! Custom URL already exists."); }
						else {
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
								echo '<p align="center"><a href="'.$web[url].'item/'.$row[custom_url].'"><span style="color:white">Item was added successfully. Preview here: '. protect($row['name']) .'</span></a></p>';
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
	   
       <div id="content" style="float: right; width: 80%;">
		<div class="ui grid purchase-list">
			<div class="row">
				<div class="column">
					<h1 class="ui header thin">Your purchases</h1>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<div id="purchases_list">
						<?php
						$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
						$limit = 50000;
						$startpoint = (int)(($page * $limit) - $limit);
						$statement = "`purchasify_purchases`";
						$sql = mysql_query("SELECT * FROM {$statement} WHERE usern='" . mysql_real_escape_string($_SESSION['ps_usern']) . "' ORDER BY id DESC LIMIT {$startpoint} , {$limit}");
						if(mysql_num_rows($sql)>0) {
						while($row = mysql_fetch_array($sql)) {
						?>

					<?php if($row['membership'] == on) { ?>
						<div class="ui segment download-page-content">
						  <div class="ui middle aligned grid download-product-block">
							<div class="row">
							  <div class="six wide column">
								<div class="ui list product-meta">
								  <div class="item">
									<div class="content">
									  <div class="header">
										<a target="_blank" style="text-decoration:none!important;color:#e74c3c!important;" href="<?php echo $web['url']; ?>p/<?php echo protect($row['item_id']); ?>"><?php echo protect($row['name']); ?></a>
									  </div>
									  Redeem code: <?php echo protect($row['code']); ?>
									</div>
								  </div>
								</div>
							  </div>
							  <div class="six wide right aligned column">
								<div class="ui green buttons">
								  <a title="Download <?php echo protect($row['name']); ?>" class="ui button download-product" href="<?php echo $web['url']; ?>upgrade/redeem">
									Redeem
								  </a>
								  <a target="_blank" title="Generate invoice for this purchase" href="<?php echo $web['url']; ?>r/new"><div class="no-mobile ui floating top right pointing dropdown icon button" tabindex="0">
									<i class="fa fa-file-text-o"></i>
								  </div></a>
								</div>
							  </div>
							</div>
						  </div>
						</div>
					<?php } else { ?>
						<div class="ui segment download-page-content">
						  <div class="ui middle aligned grid download-product-block">
							<div class="row">
							  <div class="six wide column">
								<div class="ui list product-meta">
								  <div class="item">
									<div class="content">
									  <div class="header">
										<a target="_blank" style="text-decoration:none!important;color:#333!important;" href="<?php echo $web['url']; ?>p/<?php echo protect($row['item_id']); ?>"><?php echo protect($row['name']); ?></a>
									  </div>
									  Purchase code: <?php echo protect($row['code']); ?>
									</div>
								  </div>
								</div>
							  </div>
							  <div class="six wide right aligned column">
								<div class="ui green buttons">
								  <a title="Download <?php echo protect($row['name']); ?>" class="ui button download-product" href="<?php echo $web['url']; ?>download/<?php echo protect($row['item_id']); ?>">
									Download
								  </a>
								  <a target="_blank" title="Generate invoice for this purchase" href="<?php echo $web['url']; ?>r/new"><div class="no-mobile ui floating top right pointing dropdown icon button" tabindex="0">
									<i class="fa fa-file-text-o"></i>
								  </div></a>
								</div>
							  </div>
							</div>
						  </div>
						</div>
					<?php } ?>

						<?php
						}
						} else { ?>
						<div class="ui segment download-page-content">
						  <div class="ui middle aligned grid download-product-block">
							<div class="row">
							  <div class="column">
								<div class="ui list product-meta">
								  <div class="item">
									<center><div class="content">
									  <div class="header">
										<span style="text-decoration:none!important;color:#333!important;">No purchases yet.</a>
									  </div>
									  After purchasing any product on our store, find all details here.
									</div></center>
								  </div>
								</div>
							  </div>
							</div>
						  </div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	  </div>
	</div>
	</div>
	</div>
	</div>
	<!-- BODY END -->
	<!-- FOOTER CODE -->
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/scripts.min.js"></script>
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/packed_global.js?51b2b110"></script>
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/packed_user.js"></script>
	<!-- FOOTER CODE -->

</body>
</html>
