<?php

//set endpoint headers
header('Access-Control-Allow-Orgin:*');
header('Content-Type:application/json');

header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
//initialize Api
include_once('../core/initialize.php');

//create instance of user
$Customer = new Customer($db);
$Customer->id = isset($_GET['id'])? $_GET['id'] : die();

if($Customer->delete()){
    echo json_encode(array('message'=>'customer deleted.'));
}

else{
    echo json_encode(array('message'=>'Customer not deleted.'));
}
