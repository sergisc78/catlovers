<?php

include('../../../config/config.php');


$id=$_GET['id'];

//DELETE CAT BY ID

$sql_delete = "DELETE FROM usercat WHERE id_user=$id";
$result = $connection->prepare($sql_delete);
$result->execute();

if ($result) {
    echo "User deleted successfully";
} else {
    echo "Error !";
}
