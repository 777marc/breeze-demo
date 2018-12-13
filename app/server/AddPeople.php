<?php

require("DataContext.php");

$data = json_decode($_POST["arr"]);

//echo $_POST["arr"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo $conn->connect_error;
}
//else {
//    echo $data[1]->first_name;
//}

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

    echo($query . $values);

    $conn->query($query . $values);

$conn->close();
