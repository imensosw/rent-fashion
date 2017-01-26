<?php
//include('../includes/config.php');
//include('../includes/functions.php');
//echo $_SERVER['REQUEST_URI'];
//echo "<br>";
$id = substr($_SERVER['REQUEST_URI'],21);
//die();
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
	<section id="product_page">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<?php include($_SERVER['DOCUMENT_ROOT']."/hautehire/source/sidebar.php");
					//include('sidebar.php');?>
				</div>
				<div class="col-md-10 product_list">
					<div class="row" id="product_start">
					<!-- NOT FEATURED ITEMS START -->
						<?php
						$phps_brand_query = '';
						if(isset($id) && !empty($id))
						{
						   $phps_brand_query = mysql_real_escape_string($id);
						}
						if(isset($_POST['phps_brand_query']))
						{
						   $phps_brand_query = mysql_real_escape_string($_POST['phps_brand_query']);
						}
						$phps_size_query = mysql_real_escape_string($_POST['phps_size_query']);
                        $phps_date_query = mysql_real_escape_string($_POST['phps_date_query']);
                        
                        //print_r($brand_array);
                        foreach ($brand_array as $key => $brand)
						{
						    if($brand['id']==$phps_brand_query)
						    {	
							  $brand_name = protect($brand['name']);
						    }	 
					    }						
                        if(isset($_POST['phps_search']) || $phps_brand_query!=0) 
						{
							//echo "ghjg";
							//die();
							echo "<h1 class='t-body -size-xl'>Results for: <strong>$brand_name</strong></h1>";
							//echo "SELECT * FROM purchasify_items WHERE name LIKE '%$phps_query%' ORDER BY id DESC";
							if(!empty($phps_brand_query) && !empty($phps_size_query))
							{	
							  $sql = mysql_query("SELECT * FROM purchasify_items WHERE brand = $phps_brand_query or size = $phps_size_query ORDER BY id DESC");
						    }
						    if(empty($phps_brand_query) && empty($phps_size_query))
							{	
							  $sql = mysql_query("SELECT * FROM purchasify_items ORDER BY id DESC");
						    }
						    if(!empty($phps_brand_query) && empty($phps_size_query))
							{	
							  $sql = mysql_query("SELECT * FROM purchasify_items WHERE brand = $phps_brand_query ORDER BY id DESC");
						    }
						    if(empty($phps_brand_query) && !empty($phps_size_query))
							{	
							  $sql = mysql_query("SELECT * FROM purchasify_items WHERE size = $phps_size_query ORDER BY id DESC");
						    }
							if(mysql_num_rows($sql)>0) 
							{
							   while($row = mysql_fetch_array($sql)) 
							   {
						        ?>
					            <!-- PRODUCT SEARCH START -->

						<div class="col-md-4 col-sm-6">
							<div class="product_box wow fadeInUp" data-wow-duration="2s">
								<a href="<?php echo $web['url']; ?>i/<?php echo protect($row['id']); ?>" class="prodct_hvr">
									<div class="like_div"></div>
									<div class="product_img flex">
										<img src="<?php echo $web['url'];echo protect($row['thumbnail']); ?>" class="img-responsive" alt="">
										<span class="rent_hvr">Hire</span>
									</div>	
									<div class="product_btm text-center">
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
												?>										
											</h2>
											<h3 class="name"><?php echo protect($row['name']); ?></h3>
											<span class="rent_btns">Hire : <span class="dollar">$</span><?php echo protect($row['price_extended']); ?></span>
											
											<span class="price">RRP <span class="dollar">$</span><?php echo protect($row['price_regular']); ?></span>
										</div>
									</div>
								</a>
							</div>
						</div>	
						<?php
						}
						}
						else 
						{
							foreach ($brand_array as $key => $brand)
							{
							    if($brand['id']==$phps_brand_query)
							    {	
								  $brand_name = protect($brand['name']);
							    }	 
						    }		
		                    echo info("No results for <b>" . protect($brand_name) . "</b>.");
	                    }
						 }
						 ?>
						<!-- PRODUCT SEARCH START -->
					</div>
				</div>
			</div>
			
		</div>
	</section>
<?php include($_SERVER['DOCUMENT_ROOT']."/hautehire/source/footer.php");//include('footer.php');?>
<script>
var wrap = $("#siderbar");

wrap.on("scroll", function(e) {
    
  if (this.scrollTop > 147) {
    wrap.addClass("fix-search");
  } else {
    wrap.removeClass("fix-search");
  }
  
});
$(function(){

$("#slider-range").mouseover(function(){
//alert(minimum_price + maximum_price);
//alert();	
minimum_price = $("#slider_range_price_min").text();
maximum_price = $("#slider_range_price_max").text();

phps_brand_query = $('.phps_brand_query').val();
    //alert(phps_brand_query);
    if($(this).is(':checked')) 
    {   
    	phps_size_query="";
    	$('input[name="size"]:checked').each(function() 
    	{
           phps_size_query = phps_size_query + this.value + ",";
        });
    }
    else
    {
    	phps_size_query="";
    	$('input[name="size"]:checked').each(function() 
    	{
           phps_size_query = phps_size_query + this.value + ",";
        });
    }    
        //alert(phps_size_query);
        //alert(phps_size_query);
        var xhttp = new XMLHttpRequest();
	    xhttp.onreadystatechange = function()
	   {
	     if (this.readyState == 4 && this.status == 200) 
	     {
	       $("#product_start").html(this.responseText);
	       //alert(a);
	     }
	   };
	   xhttp.open("GET", "http://dev.imenso.co/hautehire/source/product_search.php?phps_size_query="+phps_size_query+"&phps_brand_query="+phps_brand_query+"&minimum_price="+minimum_price+"&maximum_price="+maximum_price,false);
	   xhttp.send();
 
});
 //alert(minimum_price + maximum_price);

$(".phps_brand_query").on("change",function(){

    minimum_price = $("#slider_range_price_min").text();
    maximum_price = $("#slider_range_price_max").text();
    //alert(minimum_price + maximum_price);
    phps_brand_query = $(this).val();
    //alert(phps_brand_query);
    if($(this).is(':checked')) 
    {   
    	phps_size_query="";
    	$('input[name="size"]:checked').each(function() 
    	{
           phps_size_query = phps_size_query + this.value + ",";
        });
    }
    else
    {
    	phps_size_query="";
    	$('input[name="size"]:checked').each(function() 
    	{
           phps_size_query = phps_size_query + this.value + ",";
        });
    }
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
     if (this.readyState == 4 && this.status == 200) 
     {
       $("#product_start").html(this.responseText);
       //alert(a);
     }
    };
    xhttp.open("GET", "http://dev.imenso.co/hautehire/source/product_search.php?phps_size_query="+phps_size_query+"&phps_brand_query="+phps_brand_query+"&minimum_price="+minimum_price+"&maximum_price="+maximum_price,false);
    xhttp.send();
    //alert(phps_size_query);
});    

$(".check").on("change",function(){

    minimum_price = $("#slider_range_price_min").text();
    maximum_price = $("#slider_range_price_max").text();

    phps_brand_query = $('.phps_brand_query').val();
    //alert(phps_brand_query);
    if($(this).is(':checked')) 
    {   
    	phps_size_query="";
    	$('input[name="size"]:checked').each(function() 
    	{
           phps_size_query = phps_size_query + this.value + ",";
        });
    }
    else
    {
    	phps_size_query="";
    	$('input[name="size"]:checked').each(function() 
    	{
           phps_size_query = phps_size_query + this.value + ",";
        });
    }    
        //alert(phps_size_query);
        //alert(phps_size_query);
        var xhttp = new XMLHttpRequest();
	    xhttp.onreadystatechange = function()
	   {
	     if (this.readyState == 4 && this.status == 200) 
	     {
	       $("#product_start").html(this.responseText);
	       //alert(a);
	     }
	   };
	   xhttp.open("GET", "http://dev.imenso.co/hautehire/source/product_search.php?phps_size_query="+phps_size_query+"&phps_brand_query="+phps_brand_query+"&minimum_price="+minimum_price+"&maximum_price="+maximum_price,false);
	   xhttp.send();	
    //alert();
    });
});
</script>
<style>
	.fix-search {
    position: fixed;
    top: 10px;
}
</style>
</body>  
</html>