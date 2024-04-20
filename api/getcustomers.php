<?php

//set endpoint headers
header('Access-Control-Allow-Orgin:*');
header('Content-Type:application/json');

//initialize Api
include_once('../core/initialize.php');

//create instance of user
$customer = new Customer($db);

//call a function from user instance
$result = $customer->read();

$num = $result->rowCount();

if($num > 0){
    $customer_list = array();
    $customer_list['data'] = array();

//while more rows exist, get the new row
while($row = $result->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    $user_item = array(
        'customerId'  =>$Customer->id,
        'FirstName'  => $Customer->FirstName,
        'LastName'  => $Customer->LastName,
        'Email'     => $Customer->Email,
        'phone'     => $Customer->phone,
        'password'  => $Customer->password
    );

    //add current user into list
    array_push($user_list['data'], $user_item);
    }
    echo json_encode($user_list);
}
else{
  echo json_encode(array('message'=>'No Users found.'));
}