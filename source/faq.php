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
include($_SERVER['DOCUMENT_ROOT']."/hautehire/source/header.php"); 
?>
<section id="faq">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="faq_wrp clearfix com_pad">
					<div class="main_head_wrp">
						<h3 class="main_head ">FAQ</h3>
					</div>
					<div class="faq_content">
						<?php
							for($i = 1; $i<10; $i++)
							{
						?>   
						<div class="col-md-4 ">
							<div class="faq_div wow fadeInUp" data-wow-duration="2s">
								<span><div class="black_bg_faq"></div><?php echo $i ?></span>
											
								<h5 class="que_head">What is Lorem Ipsum?</h5>
								<p>
									Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
							</div>
						</div>
						<?php
					
						 }?>
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
