<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- MATERIALIZE -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- MATERIALIZE ICONS -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <?php

    /* CONFIG FILE */

    include('../../config/config.php');

    sleep(1);


    /* IF USERNAME IS AVAILABLE OR NOT */

    if (isset($_POST)) {


        $username = $_POST['username'];
        $sql_user = 'SELECT * FROM usercat WHERE username=?';
        $result2 = $connection->prepare($sql_user);

        $result2->bindParam(1, $username);


        $result2->execute();
        $count2 = $result2->rowCount();


        if ($count2 > 0) {
            echo '<div class="alert alert-danger">Username exist</div>';
        } else {
            echo '<div class="alert alert-success">Username available.</div>';
        }
    }


    ?>
</body>

</html>