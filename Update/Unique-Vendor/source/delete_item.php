<?php include("header/header-admin_access.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Delete item - <?php echo $web['title']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php echo $web['description']; ?>">
		<meta name="author" content="Spreadrr Design">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


		<!-- Stylesheets -->
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/elements.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/semantic.min.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/packed_global.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/packed_user.css">
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
		  <a style="color:#333!important;font-family:'Montserrat', sans-serif;font-weight:bold;font-size: 1.556em;" href="<?php echo $web['url']; ?>"><?php echo $web['home_title']; ?></a>
		</div>
		<?php if(idinfo($_SESSION['ps_usern'],"role") == 1) { ?>
		<div class="right aligned column connect-panel">
			<a class="ui tiny flat green button" href="<?php echo $web['url']; ?>dashboard">Dashboard</a>
		</div>
		<?php } else { ?>
		<div class="right aligned column connect-panel">
			<a class="ui tiny flat green button" href="<?php echo $web['url']; ?>account/profile">My Account</a>
		</div>
		<?php } ?>
	   </div>
	  </div>
	</div>
	<!-- HEADER END -->
	<!-- BODY START -->
	<div class="body">
	<div class="body-content">
      <div id="container" class="main-content-wrap">
<div class="user-area-wrap wide">
  <div class="notification-container" id="container_for_notification">
    <div id="notification_box" class="ui message message-notification">
        <i id="not_icon" class="warning icon"></i>
        <div id="not_message"></div>
        <div class="message-notification-icons">
            <i id="not_confirm" class="checkmark icon" title="Confirm"></i>
            <i id="not_close" class="close icon" title="Close"></i>
        </div>
    </div>
</div>
  <div class="ui stackable grid">
    <div class="column left-navigation" id="container_for_navigation"></div>
    <div class="column main-content" id="content_container">
<div id="content">
    <br><br><br><br><br><br><br><br><br><br><div class="ui grid purchase-list">
        <div class="row purchases-default" style="display: none;">
            <div class="center aligned column">
                <div class="ui segment">
                    <div class="ui active inline loader" style="display: none;"></div>
                    <div class="no-purchases">
                        You don't have any purchases yet
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div id="purchases_list">
					<div class="ui segment download-page-content">
					  <div class="ui middle aligned grid download-product-block">
						<div class="row">
						  <div class="column">
							<div class="ui list product-meta">
							  <div class="item">
								<center><div class="content">
								  <div class="header">
									<?php
			$custom_url = protect($_GET['custom_url']);
			$quotas = idinfo($_SESSION['ps_usern'],'quotas');
			$sql = mysql_query("SELECT * FROM purchasify_items WHERE custom_url='" . mysql_real_escape_string($custom_url) . "'");
			if(mysql_num_rows($sql)==0) { $redirect = $web['url']."not_found"; header("Location:$redirect"); }
			$row = mysql_fetch_array($sql);
			?>
			<?php
			if($_GET['confirmed'] == "yes") {
				@unlink("$row[preview]");
				@unlink("$row[thumbnail]");
				@unlink("$row[main_file]");
				$delete = mysql_query("DELETE FROM purchasify_items WHERE custom_url='" . mysql_real_escape_string($custom_url) . "'");
				echo '<p align="center">Product ('.($row[name]).') was deleted.</p>';
				echo '<br>';
				echo '<center><a style="text-decortion:none!important;color:#fff!important;" href="'.$web['url'].'dashboard" class="ui button red">Return to dashboard</a></center>';
			} else {
				echo '<p align="center">Are you sure you want to delete this product ('.($row['name']).')?</p>';
				echo '<br>';
				echo '<center><a style="text-decortion:none!important;color:#fff!important;" class="ui tiny flat red button" href="'.$web['url'].'confirm_delete/'.$row['custom_url'].'">Yes</a>&nbsp;&nbsp;<a style="text-decortion:none!important;color:#fff!important;" class="ui tiny flat green button" href="'.$web['url'].'dashboard">No</a></center>';
			}
			?>
								  </div>
								</div></center>
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