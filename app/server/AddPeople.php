<?php

require("DataContext.php");

$data = json_decode($_POST["arr"]);

$conn = new mysqli($servername, $username, $password, $dbname);

$query = "INSERT INTO people (first_name,last_name,email_address,group_id,state)";
$values = "VALUES ";

for($i = 0; $i < count($data); $i++){
    $firstName = $data[$i]->first_name;
    $lastName = $data[$i]->last_name;
    $emailAddress = $data[$i]->email_address;
    $groupId = $data[$i]->group_id;
    $state = $data[$i]->state;
    $values .= "('$firstName','$lastName','$emailAddress','$groupId','$state'),";
}

$values = substr($values, 0, strlen($values) - 1);

try {
    $conn->query($query . $values);
    echo true;
}
catch(Exception $error) {
    echo false;
}

$conn->close();
