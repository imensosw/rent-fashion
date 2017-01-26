<?php
//Include database configuration file
include('../includes/config.php');
include('../includes/functions.php');
if(isset($_GET["phps_size_query"]) || isset($_GET["phps_brand_query"]) || isset($_GET["minimum_price"]) || isset($_GET["maximum_price"]))
{
    //Get all state data
    if(!empty($_GET["phps_size_query"]))
    {    
        $where_size_array=explode(",",$_GET["phps_size_query"]);
        for($i=0;$i<count($where_size_array);$i++)
        {
          if($i==0)
          {  
            $where_size_string .= "size LIKE '%$where_size_array[$i]%'";
          }
          else if(!empty($where_size_array[$i]))
          {
            $where_size_string .= " OR size LIKE '%$where_size_array[$i]%'";  
          }  
        }
        $where_size_string = $where_size_string ." OR ";
    }  

    if(!empty($_GET["phps_brand_query"]))
    {
       $where_brand_string = "brand = ".$_GET["phps_brand_query"];
    }
    else
    {
       $where_brand_string = "NULL"; 
    }

    if(!empty($_GET["minimum_price"]) && !empty($_GET["maximum_price"]))
    {
       $where_price_string = " OR price_extended between ".ltrim($_GET["minimum_price"],'$')." and ".ltrim($_GET["maximum_price"],'$');
    }    
    
    //echo "SELECT * FROM purchasify_items WHERE $where_size_string $where_brand_string $where_price_string ORDER BY id DESC";  
    $query = mysql_query("SELECT * FROM purchasify_items WHERE $where_size_string 
      $where_brand_string $where_price_string ORDER BY id DESC");
    //Count total number of rows
    $rowCount = mysql_num_rows($query);
    
    //Display states list
    if($rowCount > 0)
    {
        while($row = mysql_fetch_assoc($query))
        { 
          ?>
          <div class="col-md-4">
            <div class="product_box">
                                <a href="<?php echo $web['url']; ?>i/<?php echo protect($row['id']); ?>" class="prodct_hvr">
                                    <div class="like_div"></div>
                                    <div class="product_img">
                                        <img src="<?php echo $web['url'];echo protect($row['thumbnail']); ?>" class="img-responsive" alt="">
                                        <span class="rent_hvr">Hire</span>
                                    </div>  
                                    <div class="product_btm text-center">
                                        <div class="prodct_detail text-center">
                                            <h2 class="designer">
                                               <?php
                                               $query_brand = mysql_query("SELECT name FROM purchasify_brands WHERE id=".protect($row['brand'])." ORDER BY id DESC");
                                               $row_brand = mysql_fetch_assoc($query_brand);
                                               echo protect($row_brand['name']); ?>
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
     echo 'result not available';
    }
}
?>
