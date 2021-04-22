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

    /* CONFIG FILE*/

    include('../views/config.php');

    sleep(1);
    if (isset($_POST)) {

        $username = $_POST['username'];
        $sql_user = 'SELECT * FROM usercat WHERE username=?';
        $result = $connection->prepare($sql_user);

        $result->bindParam(1, $username);


        $result->execute();
        $count = $result->rowCount();


        if ($count > 0) {
            echo '<div class="alert alert-danger">Username already exist</div>';
        } else {
            echo '<div class="alert alert-success">Username available</div>';
        }
    } elseif (isset($_POST)) {

        $email = $_POST['email'];
        $sql_email = 'SELECT * FROM usercat WHERE user_mail=?';
        $result = $connection->prepare($sql_email);

        $result->bindParam(1, $email);


        $result->execute();
        $count = $result->rowCount();


        if ($count > 0) {
            echo '<div class="alert alert-danger">Email already exist.</div>';
        } else {
            echo '<div class="alert alert-success">Email available.</div>';
        }
    }


    ?>
</body>

</html>