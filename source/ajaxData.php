<?php
//Include database configuration file
include('../includes/config.php');
if(isset($_GET["country_id"]) && !empty($_GET["country_id"]))
{

    //Get all state data
    $query = mysql_query("SELECT * FROM purchasify_states WHERE country_id = ".$_GET['country_id']." ORDER BY name ASC");
    //Count total number of rows
    $rowCount = mysql_num_rows($query);
    
    //Display states list
    if($rowCount > 0)
    {
      echo '<option value="">Select state</option>';
        while($row = mysql_fetch_assoc($query))
        { 
          echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }
    else
    {
     echo '<option value="">State not available</option>';
    }
}
if(isset($_GET["state_id"]) && !empty($_GET["state_id"]))
{
    //Get all city data
    $query = mysql_query("SELECT * FROM purchasify_cities WHERE state_id = ".$_GET['state_id']." ORDER BY name ASC");
    
    //Count total number of rows
    $rowCount = mysql_num_rows($query);
    
    //Display cities list
    if($rowCount > 0){
        $li = "";
        $op = "";
        $count = 0;
        while($row = mysql_fetch_assoc($query))
        {
            if(isset($_GET["city_selected"]) && !empty($_GET["city_selected"]))
            {
               $city_array = explode("/",$_GET["city_selected"]);
               //print_r($city_array);
               //die();
               if(in_array($row['id'],$city_array))
               {
                   $li .= "<li class='selected' data-original-index='".$row['id']."'>
                             <a class='' tabindex='0' data-tokens='null' role='option' aria-disabled='false' aria-selected='true'>
                               <span class='text'>".$row['name']."</span>
                               <span class='glyphicon glyphicon-ok check-mark'></span>
                             </a>
                          </li>";
                  $op .= '<option value="'.$row['id'].'" selected>'.$row['name'].'</option>'; 
               }
               else
               {
                  $li .= "<li class='' data-original-index='".$row['id']."'>
                             <a class='' tabindex='0' data-tokens='null' role='option' aria-disabled='false' >
                               <span class='text'>".$row['name']."</span>
                               <span class='glyphicon glyphicon-ok check-mark'></span>
                             </a>
                          </li>";
                  $op .= '<option value="'.$row['id'].'">'.$row['name'].'</option>'; 
               }
            }
            else
            {
                $li .= "<li class='' data-original-index='".$row['id']."'>
                <a class='' tabindex='0' data-tokens='null' role='option' aria-disabled='false' >
                    <span class='text'>".$row['name']."</span>
                    <span class='glyphicon glyphicon-ok check-mark'></span>
                </a>
            </li>";
                 $op .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
           }
        $count++;
        }
        
        //$data['li'] = $li;
        //$data['op'] = $op;
        $data = array($li , $op);
        echo json_encode($data);
        exit;
        
    }
    else{
        echo '<option value="">City not available</option>';
    }
}
?>