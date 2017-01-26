<?php
//Include database configuration file
include('includes/config.php');

if(isset($_POST["country_id"]) && !empty($_POST["country_id"]))
{
    //Get all state data
    $query = mysql_query("SELECT * FROM purchasify_states WHERE country_id = ".$_POST['country_id']." ORDER BY name ASC");
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

if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    //Get all city data
    $query = mysql_query("SELECT * FROM purchasify_cities WHERE state_id = ".$_POST['state_id']." ORDER BY name ASC");
    
    //Count total number of rows
    $rowCount = mysql_num_rows($query);
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Select city</option>';
        while($row = mysql_fetch_assoc($query)){ 
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}
?>