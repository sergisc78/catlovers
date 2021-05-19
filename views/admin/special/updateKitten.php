<?php

include('../../../config/config.php');

$id = $_POST['id'];
$age = $_POST['age'];
$descr = $_POST['descr'];
$virus = $_POST['virus'];


//UPDATE CAT BY ID

$sql_update = "UPDATE kitten SET age_kitten='$age',descr_kitten='$descr', virus='$virus' WHERE id_kitten='$id' ";

$result = $connection->prepare($sql_update);
$result->execute();

if ($result) {
    echo 1;
} else {
    echo 0;
}
