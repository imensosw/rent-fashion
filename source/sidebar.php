<aside class="sidebar natural" id="sidebar ">
	<form action="">
		<div class="size_filter_wrp">

			<h4 class="side_br_head">size</h4>

			<ul class="size_filter">

		    <?php
                $phps_date_query = mysql_real_escape_string($_POST['phps_date_query']);
		        
		        $phps_size_query = mysql_real_escape_string($_POST['phps_size_query']);

				$query = mysql_query("SELECT * FROM purchasify_sizes ORDER BY id ASC");

				$li_count=1;

				while($row_size = mysql_fetch_array($query))

				{

				  if($phps_size_query==$row_size['id'])

				  {	

				     echo "<li>

					      <span class='checkbox'>

						    <input id='c_box".$li_count."' type='checkbox' checked class='check' value=".$row_size['id']." name='size'>

						    <label for='c_box".$li_count."'><span class='size_num' value=".$row_size['id'].">".$row_size['name']."</span></label>

					      </span>

				        </li>";

				  }

				  else

				  {

				   	  echo "<li>

					      <span class='checkbox'>

						    <input id='c_box".$li_count."' type='checkbox' class='check' value=".$row_size['id']." name='size'>

						    <label for='c_box".$li_count."'><span class='size_num' value=".$row_size['id'].">".$row_size['name']."</span></label>

					      </span>

				        </li>";

				  }     

				  $li_count++;

				}

				?>

				

			</ul>

		</div>

		<div id="price_filter" class="rental_filter">

			<h4 class="side_br_head">rental price</h4>

			<div id="slider-range" style=""></div>

			<div class="slider_range_price">

				<div class="col-sm-6 pad_0">

					<span id="slider_range_price_min" class="change">$2000</span>

				</div>

				<div class="col-sm-6 pad_0 text-right ">

					<span id="slider_range_price_max" class="change">$8000</span>

				</div>

			</div>

		</div>

		<div  id="date" class="date_filter">

			<h4 class="side_br_head">event date</h4>

			<span class="date_input">

				<input type="text" id="datepicker2" class="datepicker" name="phps_date_query" placeholder="<?php if(empty($phps_date_query)){ echo "All Dates"; }else { echo $phps_date_query; } ?>" />

			</span>

		</div>

		<div class="designer_filter">

			<h4 class="side_br_head">designer</h4>

			<span class="select_input">										

				<select id="" class="phps_brand_query" name="phps_brand_query" id="phps_brand_query">

					<option disabled selected value>All designers</option>

				    <?php

				    $phps_brand_query = mysql_real_escape_string($_POST['phps_brand_query']);

                    $count=0;

                    $brand_array=array();

					$query = mysql_query("SELECT * FROM purchasify_brands ORDER BY id ASC");

					while($row_brand = mysql_fetch_assoc($query))

					{

					  foreach($row_brand as $key => $value)

					  {

						$brand_array[$count][$key] = $value;

					  }		

					  $count++;

					  if($phps_brand_query==$row_brand['id'])

					  {	

					      echo "<option value=".$row_brand['id']." selected>".$row_brand['name']."</option>";

					  }

					  else

					  {

					      echo "<option value=".$row_brand['id'].">".$row_brand['name']."</option>";

					  }   

					}

					//print_r($brand_array);

					?>

				</select>

			</span>

		</div>

	</form>

</aside>

