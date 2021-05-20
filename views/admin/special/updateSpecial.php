<?php

include('../../../config/config.php');

$id = $_POST['id'];
$age = $_POST['age'];
$descr = $_POST['descr'];
$virus = $_POST['virus'];


//UPDATE CAT BY ID

$sql_update = "UPDATE special SET age_special='$age',descr_special='$descr', virus='$virus' WHERE id_special='$id' ";

$result = $connection->prepare($sql_update);
$result->execute();

if ($result) {
    echo 1;
} else {
    echo 0;
}
