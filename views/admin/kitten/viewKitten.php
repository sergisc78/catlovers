<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitten: <?php echo $_GET['name']; ?></title>

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

    <!--MATERIALIZE -->
    <link rel="stylesheet" href="../../../css/materialize/css/materialize.min.css">

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
                    <li><a id="options" href="../../../views/admin/kitten/viewAllKitten.php" title="back to options" class="home">Back</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- PHP -->

    <?php

    include('../../../config/config.php');


    // VARIABLES OF VIEWALLKITTEN.PHP

    $id = $_GET['id'];
    $image_kitten = $_GET['image'];
    $name_kitten = $_GET['name'];
    $age_kitten = $_GET['age'];
    $sex_kitten = $_GET['sex'];
    $descr_kitten = $_GET['descr'];
    $virus = $_GET['virus'];


    //SHOW SELECTED KITTEN

    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="row" style="margin-left: 350px; margin-top:20px;display:inline-block;font-size:25px">
            <div class="col s8 m12">
                <div class="card">
                    <div class="card-image">
                        <img src="../../../assets/images/kitten/<?php echo $_GET['image']; ?>" width="20%">

                    </div>
                    <div class="card-content center">

                        <p hidden style=" font-family: 'Montserrat', sans-serif;">Id <input type="text" name="id_kitten" id="id_kitten" value="<?php echo $id ?>" style=" font-family: 'Montserrat', sans-serif; "></p><br>

                        <p style=" font-family: 'Montserrat', sans-serif;">Name <input type="text" readonly name="name" id="name" value="<?php echo $name_kitten ?>" style=" font-family: 'Montserrat', sans-serif; font-size:25px"></p><br>

                        <p style=" font-family: 'Montserrat', sans-serif;">Age <input type="text" name="age" id="age" value="<?php echo $age_kitten ?>" style=" font-family: 'Montserrat', sans-serif;font-size:25px"></p><br>

                        <p style=" font-family: 'Montserrat', sans-serif;">Sex <input type="text" readonly name="sex" id="name" value="<?php echo $sex_kitten ?>" style=" font-family: 'Montserrat', sans-serif;font-size:25px"></p><br>

                        <p style=" font-family: 'Montserrat', sans-serif;">Virus <input type="text" name="virus" id="virus" value=" <?php echo $virus ?>" style=" font-family: 'Montserrat', sans-serif;font-size:25px"></p><br>

                        <p style=" font-family: 'Montserrat', sans-serif;">Description <input type="text" name="descr" id="descr" value="<?php echo $descr_kitten ?>" style=" font-family: 'Montserrat', sans-serif; font-size:25px"></p><br>

                    </div>
                    <div class="button">
                        <button class="btn-large" id="update" type="submit" data-id="<?php echo $id ?>" name="updateButton" style="display:block;margin-left: auto;margin-right: auto;background-image: linear-gradient(to right,#4A569D,#DC2424);font-size:25px">Save updating ?</button>
                    </div><br>
                </div>
            </div>
        </div>

    </form>



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


        /* UPDATE INFO BY AJAX */

        $(document).ready(function() {

            $(document).on('click', '#update', function(e) {

                e.preventDefault();

                if (confirm("Are you sure you want to update this cat from database?")) {

                    //VARIABLES

                    var id = $('#id_kitten').val(),
                        age = $('#age').val(),
                        virus = $('#virus').val(),
                        descr = $('#descr').val();

                    // AJAX

                    $.ajax({
                        type: "POST",
                        url: "updateKitten.php",
                        data: {
                            id: id,
                            age: age,
                            virus: virus,
                            descr: descr
                        },

                        success: function(data) {
                            if (data == 1) {
                                alert('Cat´s info updated');
                                window.location.href = "../kitten/viewAllKitten.php";
                            } else {
                                alert("Something went wrong !");
                            }
                        }

                    });

                }
            });

        });
    </script>

</body>

</html>