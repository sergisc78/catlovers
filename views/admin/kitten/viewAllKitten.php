<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View kittens</title>

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

    <link rel="stylesheet" href="../../../css/styles2.css">

    <!--MATERIALIZE
    <link rel="stylesheet" href="../../../css/materialize/css/materialize.min.css">-->

    <!--FONT AWESOME-->

    <link rel="stylesheet" href="../../../assets/fontAwesome/fontawesome/css/all.min.css">

    <!-- JQUERY -->

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- <script src="../../../js/jquery-3.3.1.js"></script>-->

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
                    <li><a id="options" href="../../../views/admin/adminMenuCats.php" class="home">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- PHP -->

    <?php

    include('../../../config/config.php');

    $sql_adult = "SELECT * FROM kitten";

    $result = $connection->prepare($sql_adult);

    $result->execute();

    /* -------------------------------------------- PAGINATION CODE ------------------------------------------- */

    $size_page = 5; /* PAGINATION VARIABLE */

    $adultCats = $result->rowCount();

    $pages = ceil($adultCats / $size_page); /*  PAGINATION VARIABLE */

    /* TO SHOW 3 CATS PER PAGE */

    if (!$_GET) { // ALWAYS REDIRECT TO PAGE=1

        header("Location:viewAllKitten.php?page=1");
    }

    if ($_GET['page'] > $size_page || $_GET['page'] <= 0) { // IF PAGE DOESN´T EXIST, REDIRECT TO PAGE=1

        header("Location:viewAllKitten.php?page=1");
    }

    $beginToCount = ($_GET['page'] - 1) * $size_page;

    $sql_cats = "SELECT * FROM kitten LIMIT $beginToCount,$size_page";

    $resultLimit = $connection->prepare($sql_cats);

    $resultLimit->execute();

    $kittenCountCats = $resultLimit->fetchAll();


    /* ----------------------------------------- END PAGINATION CODE ---------------------------------------------- */



    if ($result != 0) {


    ?>

        <table class=" highlight centered responsive-table col s3">
            <h3 class="center" style="font-family: 'Montserrat', sans-serif;">Kittens</h3><br>

            <thead>
                <tr>

                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Virus</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

                <?php

                foreach ($kittenCountCats as $results) {

                ?> <tr>
                        <td><?php echo $results['id_kitten'] ?></td>
                        <td><?php echo $results['name_kitten'] ?></td>
                        <td><?php echo $results['age_kitten'] ?></td>
                        <td><?php echo $results['sex_kitten'] ?></td>
                        <td><?php echo $results['virus'] ?></td>

                        <!-- VIEW / UPDATE HREF -->

                        <td> <a href="viewKitten.php?id=<?php echo $results['id_kitten'] ?> &image=<?php echo $results['image_kitten'] ?> & name=<?php echo $results['name_kitten'] ?> & age=<?php echo $results['age_kitten'] ?> &sex= <?php echo $results['sex_kitten'] ?> & virus=<?php echo $results['virus'] ?> & descr=<?php echo $results['descr_kitten'] ?>"><span class="material-icons" title="View / Edit kitten" name="viewAdult">visibility</span></a>

                            <!-- DELETE HREF-->
                            <a href="deleteCat.php?id=<?php echo $results['id_kitten'] ?>"></span>&nbsp;&nbsp;&nbsp;<span class="material-icons delete" data-id="<?php echo $results['id_kitten'] ?>" title="Delete cat">delete</span></a>
                        </td>

                    </tr>



                <?php
                }
                ?>

            </tbody>

        </table>
    <?php

    }

    ?>


    <!-- PAGINATION MATERIALIZE -->

    <ul class="pagination center">
        <!--<li class="waves-effect <?php echo $_GET['page'] <= $pages ? 'disabled' : '' ?> "><a href="viewAdultCats.php?page=<?php echo $_GET['page'] - 1 ?>"><i class="material-icons">chevron_left</i></a></li>-->

        <!-- FOR PAGINATION -->

        <?php

        for ($i = 0; $i < $pages; $i++) :

        ?>

            <li class="<?php echo $_GET['page'] == $i + 1 ? 'active' : '' ?>"><a href="viewAllKitten.php?page=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>

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

    <!-- Compiled and minified JavaScript 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>-->

    <script src="../../../css/materialize/js/materialize.min.js"></script>

    <!-- JAVASCRIPT ALERTIFY -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });


        // /* DELETE INFO BY AJAX */


        $(document).ready(function() {

            $(document).on('click', '.delete', function(e) {

                e.preventDefault();

                if (confirm("¿Are you sure you want to delete this cat from database?")) {

                    // VARIABLE ID

                    var id = $(this).attr('data-id');

                    // AJAX

                    $.ajax({
                        type: "GET",
                        url: "deleteCat.php?id=" + id,

                        success: function(data) {
                            alert(data);
                            window.location.reload();
                        }

                    });

                }
            });

        });
    </script>

</body>

</html>