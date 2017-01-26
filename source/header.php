<header>
<div class="loader" id="loader">
	<div class="loader_main"></div>
</div>
<!-- <div id="top">
		<div class="container">
			<div class="top_text">60% off with THe flat  best flat discount ever</div>
		</div>
	</div>
	-->	
 	<div class="container">

 		<div class="row logo_header">

 			<div class="col-md-6 col-md-offset-3 text-center">

 				<a href="<?php echo $web['url']; ?>" class="logo"><img src="http://dev.imenso.co/hautehire/static/img/logo.png" alt="logo_header"></a>

 			</div>

			<div class="col-md-3"><!--hearder top right  -->

				<div class="top_rt_hdr">

					<div class="my_ac_menu clearfix">

						<ul class="pull-right">

						  <?php if(!$_SESSION['ps_usern']) 

						  { 

						  	?>

							<li><a href="javascript:;" data-toggle="modal" data-target="#login_model" >Login</a></li>
							<li><span>l</span></li>
							<li class="drop_down_btn"><a href="javascript:;" data-toggle="modal" data-target="#signin_model">List an Item</a>
							</li>
							<?php 

							} 

							?>

							<?php if(idinfo($_SESSION['ps_usern'],"role") == 1) { ?>

	    <?php if($_SESSION['ps_usern']) { ?>

          <li><a class="ui tiny flat green button" href="<?php echo $web['url']; ?>dashboard">Dashboard</a></li>

	    <?php } ?>

	  <?php } ?>

	  <?php if(idinfo($_SESSION['ps_usern'],"role") == 0) { ?>

	    <?php if($_SESSION['ps_usern']) { ?>

          <li><a class="ui tiny flat green button" href="<?php echo $web['url']; ?>dashboard">Dashboard</a></li>

	    <?php } ?>

	  <?php } ?>

						</ul>

					</div>

					<div class="search_br">

						<!--<form action="" method="get">

							<span ><input class="search_input" type="text" placeholder="search..."></span>

							<span class="search_btn"><input type="submit" value="" ></span>

						</form>-->

					</div>

				</div>

			</div>	

 		</div>

 		<nav class="navbar main_nav mar_0">	

	 		<button data-toggle="collapse" class="navbar-toggle" data-target="#navbar">

				 <span color class="icon-bar"><i class="fa fa-bars"></i></span>

			     <span class="icon-bar"></span>

			     <span class="icon-bar"></span>

			     <span class="icon-bar"></span>

			</button>

			<div  class="collapse navbar-collapse hvr-underline-reveal  " id="navbar">

				<ul class=" nav navbar-nav menu_wrap">

			        <li class="main_menu"><a href="javascript:;">Brands</a>
						<div class="dropdown_menu">
							<div class="row">
								<div class="col-md-12">
									<div class="submenu">
										<h2 class="sub_menu_hed">shope by brand</h2>
<?php
$i=0;
$query_brand = mysql_query("SELECT * FROM purchasify_brands ORDER BY id ASC");
while($row_brand = mysql_fetch_assoc($query_brand))
{ 
	if($i==109)
    {
      break;
    }
    if($i==0)
    { 
        ?>
        <div class="col-sm-2">
		<ul class="submenu_list">
        <?php 
    } 
    if($i%18==0 && $i!=0)
    { 
    	?>
        </ul>
        </div> <!-- 1 --> 
        <div class="col-sm-2">
	    <ul class="submenu_list">
        <?php 
    } //echo $i; 
      ?>
	<li class="item"><a href="<?php echo $web['url']; ?>search?id=<?php echo $row_brand['id']; ?>"><?php echo $row_brand['name']; ?></a></li>
	<?php 
	$i++;
	}
	?>
	</ul>
	</div>						         

<!--							         <div class="col-sm-2">
							         	<ul class="submenu_list">
											<?php
											$query_brand = mysql_query("SELECT * FROM purchasify_brands ORDER BY id ASC");
											$bc=0;
											while($row_brand = mysql_fetch_assoc($query_brand))
											{  
											   if($bc==20)
											   {
											   	break;
											   }
											   ?>
												<li class="item"><a href="<?php echo $web['url']; ?>search/<?php echo $row_brand['id']; ?>"><?php echo $row_brand['name']; ?></a></li>
											<?php 
											$bc++;
											}
											?>
	                                    </ul>
							         </div>

							         <div class="col-sm-2">
							         	<ul class="submenu_list">
											<?php
											$query_brand = mysql_query("SELECT * FROM purchasify_brands ORDER BY id ASC");
											$bc=0;
											while($row_brand = mysql_fetch_assoc($query_brand))
											{  
											   if($bc==20)
											   {
											   	break;
											   }
											   ?>
												<li class="item"><a href="<?php echo $web['url']; ?>search/<?php echo $row_brand['id']; ?>"><?php echo $row_brand['name']; ?></a></li>
											<?php 
											$bc++;
											}
											?>
	                                    </ul>
							         </div>

							         <div class="col-sm-2">
							         	<ul class="submenu_list">
											<?php
											$query_brand = mysql_query("SELECT * FROM purchasify_brands ORDER BY id ASC");
											$bc=0;
											while($row_brand = mysql_fetch_assoc($query_brand))
											{  
											   if($bc==20)
											   {
											   	break;
											   }
											   ?>
												<li class="item"><a href="<?php echo $web['url']; ?>search/<?php echo $row_brand['id']; ?>"><?php echo $row_brand['name']; ?></a></li>
											<?php 
											$bc++;
											}
											?>
	                                    </ul>
							         </div>
							         <div class="col-sm-2">
							         	<ul class="submenu_list">
											<?php
											$query_brand = mysql_query("SELECT * FROM purchasify_brands ORDER BY id ASC");
											$bc=0;
											while($row_brand = mysql_fetch_assoc($query_brand))
											{  
											   if($bc==20)
											   {
											   	break;
											   }
											   ?>
												<li class="item"><a href="<?php echo $web['url']; ?>search/<?php echo $row_brand['id']; ?>"><?php echo $row_brand['name']; ?></a></li>
											<?php 
											$bc++;
											}
											?>
	                                    </ul>
							         </div>
							         <div class="col-sm-2">
							         	<ul class="submenu_list">
											<?php
											$query_brand = mysql_query("SELECT * FROM purchasify_brands ORDER BY id ASC");
											$bc=0;
											while($row_brand = mysql_fetch_assoc($query_brand))
											{  
											   if($bc==20)
											   {
											   	break;
											   }
											   ?>
												<li class="item"><a href="<?php echo $web['url']; ?>search/<?php echo $row_brand['id']; ?>"><?php echo $row_brand['name']; ?></a></li>
											<?php 
											$bc++;
											}
											?>
	                                    </ul>
							         </div>-->

	                                </div>
	                            </div>
							<!--	<div class="col-md-6">
									<div class="submenu">
										<h2 class="sub_menu_hed text-center">shope by category</h2>
										<div class="submenu_center">
											<div class="row">
												<div class="col-md-4">
													<a href="javescript:;"><img src="http://dev.imenso.co/hautehire/uploads/20026/Desert.jpg" alt="" class="img-responsive"></a>
													<h4></h4>
												</div>
												<div class="col-md-4">
													<a href="javescript:;"><img src="http://dev.imenso.co/hautehire/uploads/20026/Desert.jpg" alt="" class="img-responsive"></a>
													<h4></h4>
												</div>

												<div class="col-md-4">
													<a href=""><img src="<?php echo $web['url']; ?>static/img/4.png" alt="" class="img-responsive"></a>
													<h4></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-md-3">
									<a href="javescript:;"><img src="images/3.png" alt="" class="img-responsive"></a>
									<h4></h4>
								</div> -->

							</div>
						</div>
			         </li>

			         <li class="main_menu"><a href="javascript:;">List</a>

						<div class="dropdown_menu">

							<div class="row">

								<div class="col-md-3">

									<div class="submenu">

										<h2 class="sub_menu_hed">shope by category</h2>

										<ul class="submenu_list">

											<li class="item"><a href="javascript:;">shoes</a></li>

											<li class="item"><a href="javascript:;">cloths</a></li>

											<li class="item"><a href="javascript:;">All category</a></li>

											<li class="item"><a href="javascript:;">accessories</a></li>

											<li class="item"><a href="javascript:;">offers</a></li>

										</ul>		

									</div>

								</div>

								<div class="col-md-6">

									<div class="submenu">

										<h2 class="sub_menu_hed text-center">Hire</h2>

										<div class="submenu_center">

											<div class="row">

												<div class="col-md-4">

													<a href="javescript:;"><img src="http://dev.imenso.co/hautehire/uploads/20030/Lighthouse.jpg" alt="" class="img-responsive"></a>

													<h4></h4>

												</div>

												<div class="col-md-4">

													<a href="javescript:;"><img src="http://dev.imenso.co/hautehire/uploads/20030/Lighthouse.jpg" alt="" class="img-responsive"></a>

													<h4></h4>

												</div>

												<div class="col-md-4">

	<a href="javescript:;"><img src="<?php echo $web['url']; ?>static/img/4.png" alt="" class="img-responsive"></a>

													<h4></h4>

												</div>

											</div>

										</div>

									</div>

								</div>

								<div class="col-md-3">

									<a href="javescript:;"><img src="images/3.png" alt="" class="img-responsive"></a>

									<h4></h4>

								</div>

							</div>

						</div>

			         </li>

			         <li class="main_menu"><a href="javascript:;">about us</a></li>

			         <li class="main_menu"><a href="javascript:;">careers</a></li>

			         <li class="main_menu"><a href="javascript:;">Help & FAQ</a></li>  

			         <li class="main_menu"><a href="javascript:;">Investors</a></li>

			         <li class="main_menu"><a href="javascript:;">Invite Friends</a></li>

			         <li class="main_menu"><a href="javascript:;">Media</a></li>

       			</ul>

           </div>	

   		</nav>

 	</div>

</header>

