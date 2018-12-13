<?php

require("DataContext.php");

$data = json_decode($_POST["arr"]);

$conn = new mysqli($servername, $username, $password, $dbname);

$query = "INSERT INTO groups (group_id, group_name)";
$values = "VALUES ";

for($i = 0; $i < count($data); $i++){

    $groupId = $data[$i]->group_id;
    $groupName = $data[$i]->group_name;

    $values .= "('$groupId','$groupName'),";
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
