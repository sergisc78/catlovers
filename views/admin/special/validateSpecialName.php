<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate kitten name</title>
    <!-- MATERIALIZE -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- MATERIALIZE ICONS -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <?php

    /* CONFIG FILE */

    include('../../../config/config.php');

    sleep(1);




    /* IF NAME IS AVAILABLE OR NOT */

    if (isset($_POST)) {

        $name_kitten = $_POST['name_kitten'];
        $sql_kitten = 'SELECT * FROM kitten WHERE name_kitten=?';
        $result = $connection->prepare($sql_kitten);

        $result->bindParam(1, $name_kitten);


        $result->execute();
        $count = $result->rowCount();


        if ($count > 0) {
            echo '<div class="alert alert-danger">This name exist</div>';
        } else {
            echo '<div class="alert alert-success">Name available</div>';
        }
    }


    ?>
</body>

</html>