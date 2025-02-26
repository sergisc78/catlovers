<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert a special case</title>

    <!-- MATERIALIZE -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- MATERIALIZE ICONS -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- GOOGLE FONTS-->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Montserrat+Alternates:wght@100;300;600&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    <!-- CSS FILE -->

    <link rel="stylesheet" href="../../../css/styles.css">

    <!--MATERIALIZE
<link rel="stylesheet" href="../css/materialize/css/materialize.min.css"> -->

    <!--FONT AWESOME-->

    <link rel="stylesheet" href="../../../assets/fontAwesome/fontawesome/css/all.min.css">

    <!-- JQUERY -->

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />

    <!-- JS SCRIPT 

    <script src="../js/alertify.js"></script>-->

</head>

<body>


    <!-- NAV -->

    <nav class="nav" style="background-image: linear-gradient(to right,#4A569D,#DC2424);min-height: 130px;">
        <div class="container ">
            <div class="nav-wrapper ">
                <a id="logo" href="#" class="brand-logo">Catlovers</a><i class="fas fa-cat fa-5x"></i>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="../../admin/special/addSpecial.php">Back to register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- PHP -->

    <?php

    /* CONFIG FILE*/

    include('../../../config/config.php');

    /* VARIABLES*/

    $name_special = $_POST['name_special'];
    $age_special = $_POST['age_special'];
    $sex_special = $_POST['sex_special'];
    $descr_special = $_POST['descr_special'];
    $virus = $_POST['virus'];


    /* IF CAT EXIST */

    if (isset($_POST['submit'])) {

        /* VARIABLES TO UPLOAD IMAGE*/

        $image_special = $_FILES['image_special']['name'];
        $type = $_FILES['image_special']['type'];
        $size = $_FILES['image_special']['size'];
        $temp = $_FILES['image_special']['tmp_name'];

        $sql_special = 'SELECT * FROM special WHERE name_special=?';
        $result = $connection->prepare($sql_special);

        $result->bindParam(1, $name_special);


        $result->execute();
        $count = $result->rowCount();



        if ($count != 0) {

            echo "<div style='text-align:center;margin-top:140px;font-size:50px;'>
            <span id='message'>This kitten´s name exist in the database !</span> <br>
            <span id='message'>Choose another one !</span> 
            </div>";

            header("refresh:5;url=addKitten.php");


            /* INSERT KITTEN */
        } else {

            /* INSERT IMAGE */

            if (!((strpos($type, "gif") || strpos($type, "jpeg") || strpos($type, "jpg") || strpos($type, "png")) && ($size < 2000000))) {
                echo '<div style:"text-align:center"><b>Error ! extension or size is not right.<br/>
                - Files allowed .gif, .jpg, .png. and 200 kb at most.</b></div>';
            } else {

                // IF IMAGE IS RIGHT

                if (move_uploaded_file($temp, '../../../assets/images/special/' . $image_special)) {

                    // WE CHANGE PERMITS
                    chmod('../../../assets/images/special/' . $image_special, 0777);
                } else { // ERROR
                    echo '<div><b>There is an error uploading image</b></div>';
                }
            }

            $sql_insert = "INSERT INTO special (image_special,name_special,age_special, sex_special, descr_special,virus) VALUES (?,?,?,?,?,?)";

            $result2 = $connection->prepare($sql_insert);

            $result2->bindParam(1, $image_special);
            $result2->bindParam(2, $name_special);
            $result2->bindParam(3, $age_special);
            $result2->bindParam(4, $sex_special);
            $result2->bindParam(5, $descr_special);
            $result2->bindParam(6, $virus);



            $result2->execute();

            echo "<div style='text-align:center;margin-top:140px;font-size:50px;'>
                  <h2 id='message'> Great !</h2>
                  <h2 id='message'> $name_special has been registered successfully in the database !</h2> 
                  </div>";
            header("refresh:8;url=../adminMenuCats.php");
        }
    }


    ?>


    <!-- FOOTER -->

    <footer class="page-footer" style="background-image: linear-gradient(to right,#4A569D,#DC2424); margin-top: 180px;">
        <div class="footer-copyright">
            <div class="container center">
                Copyright © 2021 Sergi Sánchez
            </div>
        </div>
    </footer>


    <!-- Compiled and minified JavaScript 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>-->

    <script src="css/materialize/js/materialize.min.js"></script>

</body>

</html>