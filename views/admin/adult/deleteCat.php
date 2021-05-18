<?php

include('../../../config/config.php');


$id=$_GET['id'];

//DELETE CAT BY ID

$sql_delete = "DELETE FROM adultcat WHERE id_adult=$id";
$result = $connection->prepare($sql_delete);
$result->execute();

if ($result) {
    echo "Cat deleted succesfully";
} else {
    echo "Error !";
}
