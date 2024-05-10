<?php

header('Access-Control-Allow-Orgin:*');
header('Content-Type:application/json');

include_once('../core/initialize.php');

$customer = new Customer($db);

$result = $customer->read();

$num = $result->rowCount();

if ($num > 0) {
    $customer_list = array();
    $customer_list['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $user_item = array(
            'customerId' => $customerId,
            'FirstName' => $FirstName,
            'LastName' => $LastName,
            'Email' => $Email,
            'phone' => $phone,
            'password' => $password
        );

        array_push($customer_list['data'], $user_item);
    }
    echo json_encode($customer_list);
} else {
    echo json_encode(array('message' => 'No Users found.'));
}
?>