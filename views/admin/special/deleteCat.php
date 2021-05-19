<?php

include('../../../config/config.php');


$id=$_GET['id'];

//DELETE CAT BY ID

$sql_delete = "DELETE FROM kitten WHERE id_kitten=$id";
$result = $connection->prepare($sql_delete);
$result->execute();

if ($result) {
    echo "Kitten deleted succesfully";
} else {
    echo "Error !";
}
