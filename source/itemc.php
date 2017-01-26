<?php

$id = mysql_real_escape_string($_GET['id']);

$licanse = mysql_real_escape_string($_GET['licanse']);

$method = mysql_real_escape_string($_GET['method']);

$custom_url = mysql_real_escape_string($_GET['custom_url']);

$sql = mysql_query("SELECT * FROM purchasify_items WHERE custom_url='$custom_url' OR id='$id'");

if(mysql_num_rows($sql)==0) 

{ 

	$redirect = $web['url']."not_found"; 

	header("Location: $redirect"); 

}

$row = mysql_fetch_array($sql);
echo protect($row['id']);
echo protect($row['author']);
echo $_SESSION['ps_usern'];
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

//print_r($brand_array);

$extnafaila = end(explode('.',$row['main_file']));

$extnafaila = strtoupper($extnafaila);

$filesize = formatBytes(filesize($row['main_file']));

?>

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

//echo $_SERVER['DOCUMENT_ROOT'];
include($_SERVER['DOCUMENT_ROOT']."/hautehire/source/header.php"); ?>
  <div class="col-md-12">

   <div class="bread_crumb">
<section id="payment_content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="payment_process_wrp clearfix mar_t2 com_pad <?php if(empty($_SESSION['ps_usern'])){ echo "hidden";}?>">
				<?php if(!$_SESSION['ps_usern']) { ?>
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
					<?php 
					}					?>
					<?php if(!$_SESSION['ps_usern'])  
					{ 
					  ?>
					    <div class="billing_form_wrp">
							<div class="inform_wrp">
								<div class="billing_inform_text">
									You need to be logged in if you want to purchase this product. 		  
								</div>
							</div>
						</div>	  		
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
					    ?>
					 <div class="payment_form text-center <?php if(empty($_SESSION['ps_usern'])){ echo "hidden";}?>">
						<div class="rent_product">
							<span class="name"><?php echo protect($row['name']); ?></span>
							<span class="price"><?php if($row['item_currency'] == USD) { ?><?php echo decode_currency($row['item_currency']); echo protect($row['price_extended']); ?><?php } ?><?php if($row['item_currency'] == EUR) { ?><?php echo protect($row['price_extended']); echo decode_currency($row['item_currency']); ?><?php } ?><?php if($row['item_currency'] == GBP) { ?><?php echo decode_currency($row['item_currency']); echo protect($row['price_extended']); ?><?php } ?></span>
						</div>
						<h5 class="total_payment">Total: <span><?php if($row['item_currency'] == USD) { ?><?php echo decode_currency($row['item_currency']); echo protect($row['price_extended']); ?><?php } ?><?php if($row['item_currency'] == EUR) { ?><?php echo protect($row['price_extended']); echo decode_currency($row['item_currency']); ?><?php } ?><?php if($row['item_currency'] == GBP) { ?><?php echo decode_currency($row['item_currency']); echo protect($row['price_extended']); ?><?php } ?></span></h5>
						<div class="paypal_wrp mar_t2">
							<?php
					if($custom_url == !NULL) {
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
					} else {
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

<section id="single_product" class="<?php if(!empty($_SESSION['ps_usern'])){ echo "hidden";}?>">



<div class="container">

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

						<span class="price_big">$<?php echo protect($row['price_extended']); ?></span>MRP $<?php echo protect($row['price_regular']); ?> 

					</div>

					<p class="product_discrtion">Make 4 interest free payments of $19.75 fortnightly and receive your order now</p>

					<!-- <form action=""> -->

						<div class="col-xs-6 pad_0">

							<span class="select_input">										

								<select id="" class="">

									<option disabled selected value>All designers</option>

									<?php

				                        foreach ($brand_array as $key => $brand)

										{

										  echo "<option value=".$brand['id'].">".$brand['name']."</option>";	 

										}

						                ?>

								</select>			

							</span>

						</div>

						<div class="col-xs-6 pad_0 text-center">

							<span><a href="#size" class="size_chart_link">size Guide</a></span>

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

						<a id="open_payments">Rent Now</a>

						<?php 

						} 

						?>

					</a></span></div>

					<!-- </form> -->

					<div class="share_social">

						<p>

							<span class="capital">share</span>

							<a href=""><i class="fa fa-facebook"></i></a>

							<a href=""><i class="fa fa-twitter"></i></a>

							<a href=""><i class="fa fa-instagram"></i></a>

							<a href=""><i class="fa fa-linkedin"></i></a>

						</p>

					</div>

					<div class="view_more_wrp">

						<p>

							<span class="capital">view more</span>

							<a href="#">double trouble</a>

							<a href="#">tops</a>

							<a href="#">party time</a>

						</p>

					</div>

				</div>

			</div>

		</div>

	</div>

	<!-- Item slider-->

	<div class="container">

		<header id="myCarousel" class="carousel slide">

			<div class="row"><div class="col-lg-12"><h3 class="product_slider_head">For better choice</h3></div></div>

			<div id="myCarousel" class="carousel slide" data-ride="carousel">

				<div class="slide_controls mar_b1">

					<a class="" href="#myCarousel" role="button" data-slide="prev">

						<span  aria-hidden="true" class="slide_prev"><img  class="img-responsive" src="<?php echo $web['url']; ?>static/img/icon/previous.svg" alt=""></span>

						<span class="sr-only">Previous</span>

					</a>

					<a class="" href="#myCarousel" role="button" data-slide="next">

						<span  aria-hidden="true" class="slide_next"><img class="img-responsive" src="<?php echo $web['url']; ?>static/img/icon/skip.svg" alt="">

						</span>

						<span class="sr-only">Next</span>

					</a>

				</div>

				<div class="carousel-inner" role="listbox">

					<div class="item active">

						<div class="row">

							<div class="col-md-3 col-sm-6">



								<div class="panel  text-center">

									<div class="product_slider_img flex">

										<img class="img-responsive" src="<?php echo $web['url']; ?><?php echo protect($row['preview']); ?>" alt="<?php echo protect($row['name']); ?>"/>

									</div>

									<div class="panel-body">

										<div class="prodct_detail text-center">

											<h2 class="designer">Stella McCartney</h2>

											<h3 class="name">Oversized Cat Eye Sunglasses in Shiny Black</h3>

											<span class="rent_btns">Rent</span>

										</div>

									</div>

								</div>

							</div>

							<div class="col-md-3 col-sm-6">

								<div class="panel text-center">

									<div class="product_slider_img flex">

										<img class="img-responsive" src="<?php echo $web['url']; ?><?php echo protect($row['preview']); ?>" alt="<?php echo protect($row['name']); ?>" />

									</div>

									<div class="panel-body">

										<div class="prodct_detail text-center">

											<h2 class="designer">Stella McCartney</h2>

											<h3 class="name">Oversized Cat Eye Sunglasses in Shiny Black</h3>

											<span class="rent_btns">Rent</span>

										</div>

									</div>

								</div>

							</div>

							<div class="col-md-3 col-sm-6">

								<div class="panel  text-center">

									<div class="product_slider_img flex">



										<img class="img-responsive" src="<?php echo $web['url']; ?><?php echo protect($row['preview']); ?>" alt="<?php echo protect($row['name']); ?>" />

									</div>

									<div class="panel-body">

										<div class="prodct_detail text-center">

											<h2 class="designer">Stella McCartney</h2>

											<h3 class="name">Oversized Cat Eye Sunglasses in Shiny Black</h3>

											<span class="rent_btns">Rent</span>

										</div>

									</div>

								</div>

							</div>

							<div class="col-md-3 col-sm-6">

								<div class="panel text-center">

									<div class="product_slider_img flex">

										<img class="img-responsive" src="<?php echo $web['url']; ?><?php echo protect($row['preview']); ?>" alt="<?php echo protect($row['name']); ?>" />

									</div>

									<div class="panel-body">

										<div class="prodct_detail text-center">

											<h2 class="designer">Stella McCartney</h2>

											<h3 class="name">Oversized Cat Eye Sunglasses in Shiny Black</h3>

											<span class="rent_btns">Rent</span>

										</div>

									</div>

								</div>

							</div>

						</div>

					</div>



					<div class="item">

						<div class="row">

							<div class="col-md-3 col-sm-6">

								<div class="panel  text-center">

									<div class="product_slider_img flex">

										<img class="img-responsive" src="<?php echo $web['url']; ?><?php echo protect($row['preview']); ?>" alt="<?php echo protect($row['name']); ?>" />

									</div>

									<div class="panel-body">

										<div class="prodct_detail text-center">

											<h2 class="designer">Stella McCartney</h2>

											<h3 class="name">Oversized Cat Eye Sunglasses in Shiny Black</h3>

											<span class="rent_btns">Rent</span>

										</div>

									</div>

								</div>

							</div>

							<div class="col-md-3 col-sm-6">

								<div class="panel  text-center">

									<div class="product_slider_img flex">

										<img class="img-responsive" src="<?php echo $web['url']; ?><?php echo protect($row['preview']); ?>" alt="<?php echo protect($row['name']); ?>" />

									</div>

									<div class="panel-body">

										<div class="prodct_detail text-center">

											<h2 class="designer">Stella McCartney</h2>

											<h3 class="name">Oversized Cat Eye Sunglasses in Shiny Black</h3>

											<span class="rent_btns">Rent</span>

										</div>

									</div>

								</div>

							</div>

							<div class="col-md-3 col-sm-6">

								<div class="panel  text-center">

									<div class="product_slider_img flex">

										<img class="img-responsive" src="<?php echo $web['url']; ?><?php echo protect($row['preview']); ?>" alt="<?php echo protect($row['name']); ?>" />

									</div>

									<div class="panel-body">

										<div class="prodct_detail text-center">

											<h2 class="designer">Stella McCartney</h2>

											<h3 class="name">Oversized Cat Eye Sunglasses in Shiny Black</h3>

											<span class="rent_btns">Rent</span>

										</div>

									</div>

								</div>

							</div>

							<div class="col-md-3 col-sm-6">

								<div class="panel  text-center">

									<div class="product_slider_img flex">

										<img class="img-responsive" src="<?php echo $web['url']; ?><?php echo protect($row['preview']); ?>" alt="<?php echo protect($row['name']); ?>" />

									</div>

									<div class="panel-body">

										<div class="prodct_detail text-center">

											<h2 class="designer">Stella McCartney</h2>

											<h3 class="name">Oversized Cat Eye Sunglasses in Shiny Black</h3>

											<span class="rent_btns">Rent</span>

										</div>

									</div>

								</div>

							</div>

						</div>

					</div>





				</div>



			</div>

		</header>



	</div> 

	<!-- Item slider end-->

		

</section>



<?php 

include($_SERVER['DOCUMENT_ROOT']."/hautehire/source/footer.php");//include('footer.php');?>
<script>

	$(document).ready(function(){

		$('#open_payments').on('click', function(){

			$('.payment_process_wrp').removeClass('hidden');

            $('#single_product').addClass('hidden');

		});



		$('.img_shower').on('click', function(){

			$('.img_shower').removeClass('active');

			$(this).addClass('active');

		});	

	});

</script>		



</body>  

<script>

	$(document).ready(function(){



	var native_width = 0;

	var native_height = 0;



	//Now the mousemove function

	$(".view_img ").mousemove(function(e){

		//When the user hovers on the image, the script will first calculate

		//the native dimensions if they don't exist. Only after the native dimensions

		//are available, the script will show the zoomed version.

		if(!native_width && !native_height)

		{

			//This will create a new image object with the same image as that in .small

			//We cannot directly get the dimensions from .small because of the 

			//width specified to 200px in the html. To get the actual dimensions we have

			//created this image object.

			var image_object = new Image();

			image_object.src = $(".zoom_img").attr("src");

			

			//This code is wrapped in the .load function which is important.

			//width and height of the object would return 0 if accessed before 

			//the image gets loaded.

			native_width = image_object.width;

			native_height = image_object.height;

		}

		else

		{

			//x/y coordinates of the mouse

			//This is the position of .magnify with respect to the document.

			var magnify_offset = $(this).offset();

			//We will deduct the positions of .magnify from the mouse positions with

			//respect to the document to get the mouse positions with respect to the 

			//container(.magnify)

			var mx = e.pageX - magnify_offset.left;

			var my = e.pageY - magnify_offset.top;

			

			//Finally the code to fade out the glass if the mouse is outside the container

			if(mx < $(this).width() && my < $(this).height() && mx > 0 && my > 0)

			{

				$(".large").fadeIn(100);

			}

			else

			{

				$(".large").fadeOut(100);

			}

			if($(".large").is(":visible"))

			{

				//The background position of .large will be changed according to the position

				//of the mouse over the .small image. So we will get the ratio of the pixel

				//under the mouse pointer with respect to the image and use that to position the 

				//large image inside the magnifying glass

				var rx = Math.round(mx/$(".zoom_img").width()*native_width - $(".large").width()/2)*-1;

				var ry = Math.round(my/$(".zoom_img").height()*native_height - $(".large").height()/2)*-1;

				var bgp = rx + "px " + ry + "px";

				

				//Time to move the magnifying glass with the mouse

				var px = mx - $(".large").width()/2;

				var py = my - $(".large").height()/2;

				//Now the glass moves with the mouse

				//The logic is to deduct half of the glass's width and height from the 

				//mouse coordinates to place it with its center at the mouse coordinates

				

				//If you hover on the image now, you should see the magnifying glass in action

				$(".large").css({left: px, top: py, backgroundPosition: bgp});

			}

		}

	})

})

</script>

<style>

	/*Some CSS*/





/*Lets create the magnifying glass*/





/*To solve overlap bug at the edges during magnification*/



</style>

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