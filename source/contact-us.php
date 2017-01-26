<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $web['title']; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo $web['description']; ?>">
<meta name="author" content="Spreadrr Design">
<link rel="stylesheet" type="text/css" href="<?php echo $web['url']; ?>static/gen/modal/css/master.css">
</head>
<body>
<?php 
include($_SERVER['DOCUMENT_ROOT']."/hautehire/source/header.php"); ?>
<section id="contact_us">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="contact_us_wrp clearfix wow fadeIpUp" data-wow-duration="2s">
					<div class="contact_us clearfix com_pad">
						<div class="main_head_wrp">
							<h3 class="main_head">Contact-us</h3>
						</div>
						<div class="contact_us_content">
							<div class="contact_text">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been  the.</p>
							</div>

							<div class="col-md-12 pad_0">
								<div class="contact_form_wrp clearfix">
									<div class="col-md-12">
										<h3 class=" contact_form_head">get in touch</h3>	
									</div>
									<form action="" class="contanct_form clearfix">
										<div class="col-md-6">
											<div class="form-group"><input type="text" placeholder="Name" ></div>
										</div>
										<div class="col-md-6">
											<div class="form-group"><input type="text" placeholder="Email" ></div>
										</div>	
										<div class="col-md-6">
											<div class="form-group"><input type="text" placeholder="Phone" ></div>
											<div class="form-group"><input type="submit" class="model_btn" value="submit"></div>	
										</div>
										<div class="col-md-6">
											<div class="form-group"><textarea name="" id="" cols="30" rows="3" placeholder="Message..."></textarea></div>
										</div>
										<div class="col-md-6">

										</div>
									</form>
								</div>
							</div>

							<div class="col-md-12 pad_0">
								<div class="contact_details">
									<div class="address">
										<p><img src="images/icon/map.svg" alt=""></p>
										<span>221 B baker street, London</span>
									</div>
									<div class="contanct">
										<p><img src="images/icon/phone-contact.svg" alt=""></p><span>+6212345678</span>
									</div>
									<div class="email">

										<p><img src="images/icon/envelope.svg" alt=""></p><a href=""><strong>hautehire@mymail.com</strong></a>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<ul class="social_links">
									<li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
									<li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
									<li><a href="javascript:;"><i class="fa fa-instagram"></i></a></li>
									<li><a href="javascript:;"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="javascript:;"><i class="fa fa-snapchat"></i></a></li>
								</ul>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
include($_SERVER['DOCUMENT_ROOT']."/hautehire/source/footer.php");//include('footer.php');?>
</body>  
</html>
