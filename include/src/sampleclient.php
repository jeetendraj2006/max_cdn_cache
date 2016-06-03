<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Include Composer Autoloader
$loader = require_once(__DIR__ . "/../vendor/autoload.php");
//require_once('MaxCDN.php');
try{
$api = new MaxCDN('pugmarks',"1579cbcf28cc293cc1b3a233729d951b0570c9d4a","ab22f049a4b79fa85355c0b195d5d4c0");
}catch(Exception $e){
print_r($e);
}


$zoneid = '497727';
$purge_api_call = $api->delete("/zones/pull.json/$zoneid/cache");
$purge_json = json_decode($purge_api_call);
echo '<pre>';
print_r($purge_json);
if(array_key_exists("code",$purge_json)) {
	if($purge_json->code == 200 || $purge_json->code == 201) {
		echo "<strong>Zone ID [$zoneid] Cache purged<strong>"; 
	}
}





