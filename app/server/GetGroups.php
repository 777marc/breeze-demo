<?php

require("DataContext.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo $conn->connect_error;
}

$query = "select people.person_id, people.first_name, people.last_name, people.email_address, people.state, groups.group_name from people inner join groups on(people.group_id = groups.group_id and people.state = 'active');";

$sth = $conn->query($query);

$rows = array();

while($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}

echo json_encode($rows);