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

$query = "INSERT INTO groups (group_id, group_name)";
$values = "VALUES ";

for($i = 0; $i < count($data); $i++){

    $groupId = $data[$i]->group_id;
    $groupName = $data[$i]->group_name;

    $values .= "('$groupId','$groupName'),";
}

$values = substr($values, 0, strlen($values) - 1);

echo($query . $values);

$conn->query($query . $values);

$conn->close();
