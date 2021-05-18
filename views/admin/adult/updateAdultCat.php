<?php

include('../../../config/config.php');

$id = $_POST['id'];
$age = $_POST['age'];
$descr = $_POST['descr'];
$virus = $_POST['virus'];


//UPDATE CAT BY ID

$sql_update = "UPDATE adultcat SET age_adult='$age',descr_adult='$descr', virus='$virus' WHERE id_adult='$id' ";

$result = $connection->prepare($sql_update);
$result->execute();

if ($result) {
    echo 1;
} else {
    echo 0;
}
