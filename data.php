<?php
$q = $_REQUEST["q"];
$value = [];

$conn = new mysqli("localhost", "root", "", "test");
$datas = $conn->query("SELECT * FROM test WHERE id='$q'");

foreach ($datas as $data) {
    $person = [];
    $person["id"] = $data["id"];
    $person["name"] = $data["name"];
    $person["age"] = $data["age"];
    $person["gender"] = $data["gender"];
    $person["id_health"] = $data["id_health"];
    array_push($value, $person);
}

echo json_encode($value);
