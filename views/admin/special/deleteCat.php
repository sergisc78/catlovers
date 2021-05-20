<?php

include('../../../config/config.php');


$id=$_GET['id'];

//DELETE CAT BY ID

$sql_delete = "DELETE FROM special WHERE id_special=$id";
$result = $connection->prepare($sql_delete);
$result->execute();

if ($result) {
    echo "Special case deleted succesfully";
} else {
    echo "Error !";
}
