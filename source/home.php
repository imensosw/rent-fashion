<?php
$result_users = mysql_query("SELECT count(1) FROM purchasify_users");
$row_users = mysql_fetch_array($result_users);
$total_users = $row_users[0];

$result_items = mysql_query("SELECT count(1) FROM purchasify_items");
$row_items = mysql_fetch_array($result_items);
$total_items = $row_items[0];
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
<!-- header.php start -->

<!-- header.php end-->
<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ">
				<div class="dark_light_wrp clearfix">
					<div class="col-md-6 pad_0 col-sm-6">
						<a href="" class="dark_div flex">
							<div>
								<h4>based in melbourne?</h4>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
							</div>
						</a>
					</div>
					<div class="col-md-6 pad_0 col-sm-6">
						<a href="" class="light_div flex">
							<div>
								<h4>based in califorenia?</h4>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
							</div>
						</a>
					</div>
				</div>	
				<div class="banner flex"  >
					 <div class="layer"></div>
					<div class="bnr_input_div " >
						<form method="POST" action="<?php echo $web['url']; ?>search">
							<div class="form_wrp">
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
									<select id="" class="size_select" name="phps_size_query">
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
									<input type="text" id="datepicker1" data-date-format="d-m-Y" name="phps_date_query" placeholder="Delivery + Return Dates" class="datepicker" />
								</span>
								<span class="search_all_input"><input type="submit" value="SEARCH" name="phps_search"></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="about_rent mar_b2 wow fadeInUp"  data-wow-duration="2s">
		<div class="container">
			<div class="row clearifix">
				<div class="col-md-12">
					<div class="col-md-6 pad_0 col-sm-6">
						<div class="text-center">
							<!--<a href="<?php //echo $web['url']; ?>search" class="about_rent_div flex">
								<h4>HIRE</h4>
							</a>-->
							<form method="POST" action="<?php echo $web['url']; ?>search">
							<span class="about_rent_div flex"><input type="submit" value="HIRE" name="phps_search"></span>
							</form>
						</div>
					</div>
					<div class="col-md-6 pad_0 col-sm-6">
						<div class="text-center">
							<!--<a href="" class="about_rent_div flex dark_rent">
								<h4>LEND</h4>
							</a>-->
							<?php
                                	if(isset($_SESSION['ps_usern']))
                                	{ ?>
                                       <a href="<?php echo $web['url']; ?>upload" class="about_rent_div flex dark_rent">
								         <span>LEND</span>
							           </a>
                                    <?php
                                	}
                                	else
                                	{ 
                                		?>
                                       <a href="javascript:;" data-toggle="modal" data-target="#signin_model" class="about_rent_div flex dark_rent">
								           <span>LEND</span>
							           </a>
                                      <?php
                                	}	
							?>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="product_section">
	<?php
	    //print_r($brand_array);
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
		$limit = 6;
		$startpoint = (int)(($page * $limit) - $limit);
		$statement = "`purchasify_items`";
		$sql_feature_on = mysql_query("SELECT * FROM {$statement} where featured='on' ORDER BY id DESC");
        $sql_feature_off = mysql_query("SELECT * FROM {$statement} where featured='' ORDER BY id DESC");
		if(mysql_num_rows($sql_feature_on)>0 || mysql_num_rows($sql_feature_off)>0) 
		{
		$result_array = array();
		$result_array_on = array();
		$count = 0;	
		while($row = mysql_fetch_assoc($sql_feature_off)) 
		{
			foreach($row as $key => $value)
			{
			  $result_array[$count][$key] = $value;
			}		
			$count++;
	    }
	    $count = 0;
	    while($row1 = mysql_fetch_assoc($sql_feature_on)) 
		{
            foreach($row1 as $key => $value)
			{
				$result_array_on[$count][$key] = $value;
			}			
			$count++;
	    }
	    $product_item=0;
	    for($product=0;$product<count($result_array_on);$product++)
	    {
	      ?>
	    <div class="container mar_b2">
			<div class="row">
				<div class="col-md-3 col-sm-3">
					<div class="small_prodct_wrp">
						<h2 class="text-center small_prodct_wrp_head <?php if(empty(protect($result_array[0+$product_item]['id']))) { echo "hidden"; }?>">designers<br><em>style</em></h2> 
						<article class="product_main wow fadeInUp <?php if(empty(protect($result_array[0+$product_item]['id']))) { echo "hidden"; }?>" data-wow-duration="2.5s">
							<!--<a href="<?php //echo $web['url']; ?>p/<?php //echo protect($result_array[0+$product_item]['custom_url']); ?>" class="product_hvr" title="<?php //echo protect($result_array[0+$product_item]['name']); ?>" target="_top">-->
							<a href="<?php echo $web['url']; ?>i/<?php echo protect($result_array[0+$product_item]['id']); ?>" class="product_hvr" title="<?php echo protect($result_array[0+$product_item]['name']); ?>" target="_top">
								<div class="small_img mar_t1 flex">
									<img src="<?php echo $web['url']; echo protect($result_array[0+$product_item]['thumbnail']); ?>" alt="" class="img-responsive">
									<span class="rent_hvr">Hire</span>
								</div>
								<div class="prodct_detail text-center">
									<h2 class="designer"><?php
									foreach ($brand_array as $key => $brand)
									{
										if($brand['id']==protect($result_array[0+$product_item]['brand']))
										{	
											echo protect($brand['name']);
										}	 
									}
									?></h2>
									<h3 class="name">
									<?php echo protect($result_array[0+$product_item]['name']); ?>
										
									</h3>
									<span class="rent_btns">Hire : <?php //echo protect($result_array[0+$product_item]['id']); ?><span class="dollar">$</span><?php echo protect($result_array[0+$product_item]['price_extended']); ?><br/>
										<h5>RRP : <span class="dollar">$</span><?php echo protect($result_array[0+$product_item]['price_regular']); ?></h5>
									</span>
								</div>
							</a>
						</article>
						
						<article class="product_main wow fadeInUp <?php if(empty(protect($result_array[1+$product_item]['id']))) { echo "hidden"; }?>" data-wow-duration="2.5s" >
							<a href="<?php echo $web['url']; ?>i/<?php echo protect($result_array[1+$product_item]['id']); ?>" class="product_hvr" title="<?php echo protect($result_array[1+$product_item]['name']); ?>" target="_top">
								<div class="small_img mar_t1 flex">
									<img src="<?php echo $web['url']; echo protect($result_array[1+$product_item]['thumbnail']); ?>" alt="" class="img-responsive">
									<span class="rent_hvr">Hire</span>
								</div>
								<div class="prodct_detail text-center">
									<h2 class="designer">
									<?php
									foreach ($brand_array as $key => $brand)
									{
										if($brand['id']==protect($result_array[1+$product_item]['brand']))
										{	
											echo protect($brand['name']);
										 }	 
									}
									?></h2>
									<h3 class="name">
									<?php echo protect($result_array[1+$product_item]['name']); ?>
										
									</h3>
									<span class="rent_btns">Hire : <?php //echo ($result_array[1+$product_item]['id']); ?><span class="dollar"><span class="dollar">$</span></span><?php echo ($result_array[1+$product_item]['price_extended']); ?><br/>
										<h5>RRP : <span class="dollar">$</span><?php echo protect($result_array[1+$product_item]['price_regular']); ?></h5></span>
								</div>
							</a>
						</article>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="big_prodct wow fadeInUp <?php if(empty(protect($result_array_on[0+$product]['id']))) { echo "hidden"; }?>" data-wow-duration="2s">
						<a href="<?php echo $web['url']; ?>i/<?php echo protect($result_array_on[0+$product]['id']); ?>" class="product_big_hvr" title="<?php echo protect($result_array_on[0+$product]['name']); ?>">
							<div class="big_img" style='background-image: url("<?php echo $web['url'];echo protect($result_array_on[0+$product]['preview']); ?>");''></div>
							<div class="big_prodct_detail text-center mar_t2">
								<p><?php
									foreach ($brand_array as $key => $brand)
									{
										if($brand['id']==protect($result_array_on[0+$product]['brand']))
										{	
											echo protect($brand['name']);
										 }	 
									}
									?></p>
								<p>
								<?php echo protect($result_array_on[0+$product]['name']); ?>
								</p>
								<span class="rent_btnl">Hire : <?php //echo protect($result_array_on[0+$product]['id']); ?><span class="dollar">$</span><?php echo protect($result_array_on[0+$product]['price_extended']); ?><br/>
										<h5>RRP : <span class="dollar">$</span><?php echo protect($result_array_on[0+$product]['price_regular']); ?></h5></span>
							</div>
						</a>
					</div>
				</div>
				<div class="col-md-3 col-sm-3">
					<div class="small_prodct_wrp">
						<h2 class="text-center small_prodct_wrp_head <?php if(empty(protect($result_array[2+$product_item]['id']))) { echo "hidden"; }?>">designers<br><em>style</em></h2>
						<article class="product_main wow fadeInUp <?php if(empty(protect($result_array[2+$product_item]['id']))) { echo "hidden"; }?>" data-wow-duration="2.5s">
							<a href="<?php echo $web['url']; ?>i/<?php echo protect($result_array[2+$product_item]['id']); ?>" class="product_hvr" title="<?php echo protect($result_array[2+$product_item]['name']); ?>" target="_top">
								<div class="small_img mar_t1 flex">
									<img src="<?php echo $web['url']; echo protect($result_array[2+$product_item]['thumbnail']); ?>" alt="" class="img-responsive">
									<span class="rent_hvr">Hire</span>
								</div>
								<div class="prodct_detail text-center">
									<h2 class="designer">
									<?php
									foreach ($brand_array as $key => $brand)
									{
										if($brand['id']==protect($result_array[2+$product_item]['brand']))
										{	
											echo protect($brand['name']);
										 }	 
									}
									?></h2>
									<h3 class="name"><?php echo protect($result_array[2+$product_item]['name']); ?></h3>
									<span class="rent_btns">Hire : <?php //echo ($result_array[2+$product_item]['id']); ?><span class="dollar">$</span><?php echo ($result_array[2+$product_item]['price_extended']); ?><br/>
										<h5>RRP : <span class="dollar">$</span><?php echo protect($result_array[2+$product_item]['price_regular']); ?></h5></span>
								</div>
							</a>
						</article>
						<article class="product_main wow fadeInUp <?php if(empty(protect($result_array[3+$product_item]['id']))) { echo "hidden"; }?>" data-wow-duration="2.5s">
							<a href="<?php echo $web['url']; ?>i/<?php echo protect($result_array[3+$product_item]['id']); ?>" class="product_hvr" title="<?php echo protect($result_array[3+$product_item]['name']); ?>" target="_top">
								<div class="small_img mar_t1 flex">
									<img src="<?php echo $web['url']; echo protect($result_array[3+$product_item]['thumbnail']); ?>" alt="" class="img-responsive">
									<span class="rent_hvr">Hire</span>
								</div>
								<div class="prodct_detail text-center">
									<h2 class="designer"><?php
									foreach ($brand_array as $key => $brand)
									{
										if($brand['id']==protect($result_array[3+$product_item]['brand']))
										{	
											echo protect($brand['name']);
										 }	 
									}
									?>
									</h2>
									<h3 class="name"><?php echo protect($result_array[3+$product_item]['name']); ?></h3>
									<span class="rent_btns">Hire : <?php //echo ($result_array[3+$product_item]['id']); ?><span class="dollar">$</span><?php echo ($result_array[3+$product_item]['price_extended']); ?><br/>
										<h5>RRP : <span class="dollar">$</span><?php echo protect($result_array[3+$product_item]['price_regular']); ?></h5></span>
								</div>
							</a>
						</article>
					</div>
				</div>
			</div>
		</div>
	    <?php
	    $product_item+=5;
	     }
		} 
		else 
		{
			echo info('Currently there are no products.');
		}
		//print_r($result_array);

	?>
	</div>
</section>

<?php 
include($_SERVER['DOCUMENT_ROOT']."/hautehire/source/footer.php");//include('footer.php');?>
</body>  
</html>

