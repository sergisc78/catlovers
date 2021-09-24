<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View adult Cats</title>

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

    <link rel="stylesheet" href="../../css/styles.css">

    <link rel="stylesheet" href="../../css/styles2.css">

    <!--MATERIALIZE
    <link rel="stylesheet" href="../css/materialize/css/materialize.min.css"> -->

    <!--FONT AWESOME-->

    <link rel="stylesheet" href="../../assets/fontAwesome/fontawesome/css/all.min.css">

    <!-- JQUERY -->

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- CSS -->

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <!-- Semantic UI theme -->

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />




</head>

<body>

    <!-- NAV -->

    <nav class="nav" style="background-image: linear-gradient(to right,#4A569D,#DC2424);min-height: 130px;">
        <div class="container ">
            <div class="nav-wrapper ">
                <a id="logo" href="#" class="brand-logo">Catlovers</a><i class="fas fa-cat fa-5x"></i>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a id="options" href="../../views/users/userMenuCats.php" title="back to options" class="home">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- PHP -->

    <?php

    include('../../config/config.php');


    $sql_adult = "SELECT * FROM adultcat";

    $result = $connection->prepare($sql_adult);

    $result->execute();


    /* -------------------------------------------- PAGINATION CODE ------------------------------------------- */

    $size_page = 3; /* PAGINATION VARIABLE */

    $adultCats = $result->rowCount();

    $pages = ceil($adultCats / $size_page); /*  PAGINATION VARIABLE */

    /* TO SHOW 3 CATS PER PAGE */

    if (!$_GET) { // ALWAYS REDIRECT TO PAGE=1

        header("Location:viewAdultCats.php?page=1");
    }

    if ($_GET['page'] > $size_page || $_GET['page'] <= 0 ) { // IF PAGE DOESN´T EXIST, REDIRECT TO PAGE=1

        header("Location:viewAdultCats.php?page=1");
    }

    $beginToCount = ($_GET['page'] - 1) * $size_page;

    $sql_cats = "SELECT * FROM adultcat LIMIT $beginToCount,$size_page";

    $resultLimit = $connection->prepare($sql_cats);

    $resultLimit->execute();

    $adultCountCats = $resultLimit->rowCount();


    /* ----------------------------------------- END PAGINATION CODE ---------------------------------------------- */


    //IF THERE IS ANY CAT

    if ($adultCats != 0) {

    ?>

        <?php
        foreach ($resultLimit as $results) {
            $image = $results['image_adult'];
        ?>

            <div class="row" style="margin-left: 350px; margin-top:20px;display:inline-block;font-size:25px">
                <div class="col s8 m12">
                    <div class="card">
                        <div class="card-image">
                            <img src="../../assets/images/adult/<?php echo $image ?>" width="20%">

                        </div>
                        <div class="card-content center">
                            <p style=" font-family: 'Montserrat', sans-serif;">Name : <?php echo $results['name_adult'] ?></p>
                            <p style=" font-family: 'Montserrat', sans-serif;">Age : <?php echo $results['age_adult'] ?></p>
                            <p style=" font-family: 'Montserrat', sans-serif;">Sex: <?php echo $results['sex_adult'] ?></p>
                            <p style=" font-family: 'Montserrat', sans-serif;">Virus: <?php echo $results['virus'] ?></p>
                            <p style=" font-family: 'Montserrat', sans-serif;">Description : <?php echo $results['descr_adult'] ?> </p>
                        </div>
                        <div class="button">
                        <a class="btn-large" name="adopt" href="adoptAdult.php?id=<?php echo $results['id_adult'] ?> & name=<?php echo $results['name_adult'] ?>" style="display:block;margin-left:auto;margin-right:auto;background-image: linear-gradient(to right,#4A569D,#DC2424);font-size:25px">Would you like to adopt me ?</a>

                        </div><br>
                       
                    </div>
                </div>
            </div>

            <!--<a name="adopt" href="adoptAdultCat.php?id=<?php echo $results['id_adult'] ?> & name=<?php echo $results['name_adult'] ?>" style="display:block;margin-left:auto;margin-right:auto;background-image: linear-gradient(to right,#4A569D,#DC2424);font-size:25px">Would you like to adopt me ?</a>-->

            <?php
            // $sql_limit = "SELECT * FROM adultcat LIMIT $beginToCount,$size_page";
            ?>
    <?php

        }
    } else {
        echo "<p style=text-align:center>There´s no cats to show</p>";
    }

    ?>


    <!-- PAGINATION MATERIALIZE -->

    <ul class="pagination center">
        <!--<li class="waves-effect <?php echo $_GET['page'] <= $pages ? 'disabled' : '' ?> "><a href="viewAdultCats.php?page=<?php echo $_GET['page'] - 1 ?>"><i class="material-icons">chevron_left</i></a></li>-->

        <!-- FOR PAGINATION -->

        <?php

        for ($i = 0; $i < $pages; $i++) :

        ?>

            <li class="<?php echo $_GET['page'] == $i + 1 ? 'active' : '' ?>"><a href="viewAdultCats.php?page=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>

            <!-- ENDFOR -->
        <?php endfor ?>
        <!--<li class="<?php echo $_GET['page'] >= $pages ? 'disabled' : '' ?> "><a href="viewAdultCats.php?page=<?php echo $_GET['page'] + 1 ?>"><i class="material-icons">chevron_right</i></a></li>-->
    </ul>



    <!-- FOOTER -->

    <footer class="page-footer" style="background-image: linear-gradient(to right,#4A569D,#DC2424);">
        <div class="footer-copyright">
            <div class="container center">
                Copyright © 2021 Sergi Sánchez
            </div>
        </div>
    </footer>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- <script src="css/materialize/js/materialize.min.js"></script> -->

    <!-- JAVASCRIPT ALERTIFY -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>

</body>

</html>