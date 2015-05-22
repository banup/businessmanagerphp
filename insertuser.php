<?php
include_once './db_functions.php';
//Create Object for DB_Functions clas
$db = new DB_Functions(); 
//Get JSON posted by Android Application
$json = $_POST["businessJSON"];
//Remove Slashes
if (get_magic_quotes_gpc()){
$json = stripslashes($json);
}
//Decode JSON into an Array
$data = json_decode($json);
//Util arrays to create response JSON
$a=array();
$b=array();
//Loop through an Array and insert data read from JSON into MySQL DB
for($i=0; $i<count($data) ; $i++)
{
//Store User into MySQL DB
$res = $db->storeBusiness($data[$i]->businessid,$data[$i]->businessname,$data[$i]->businessaddress,$data[$i]->businesscity,$data[$i]->businessstate,$data[$i]->businesscountry,$data[$i]->businessphone,$data[$i]->businesscontact,$data[$i]->businesscatalog,$data[$i]->surveyorphone);
    //Based on inserttion, create JSON response
    if($res){
        $b["businessid"] = $data[$i]->businessid;
        $b["status"] = 'yes';
        array_push($a,$b);
    }else{
        $b["businessid"] = $data[$i]->businessid;
        $b["status"] = 'no';
        array_push($a,$b);
    }
}
//Post JSON response back to Android Application
echo json_encode($a);
?>

