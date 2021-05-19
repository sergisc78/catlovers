<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add special case</title>

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
    <link rel="stylesheet" href="../../../css/materialize/css/materialize.min.css">-->

    <!--FONT AWESOME-->

    <link rel="stylesheet" href="../../../assets/fontAwesome/fontawesome/css/all.min.css">

    <!-- JQUERY -->

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- CSS -->

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <!-- Semantic UI theme -->

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />

    <!-- JS SCRIPT -->

    <script src="../../../js/adultCat.js"></script>


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


    <!-- FORM ADD ADULT CAT -->

    <h3 class="title-form center">Add a special case</h3>
    <div class="row">
        <form id="form" action="../special/insertSpecial.php" method="post" class="col s12" enctype="multipart/form-data">
            <div class="row">
                <br>
                <div class="file-field col s6"><br><br>
                    <div class="file-field input-field">
                        <div class="btn-large">
                            <span>Add a special´s image</span>
                            <input type="file" name="image_kitten">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" name="image_special">
                        </div>
                    </div>
                </div>
                <div class="input-field col s6"><br><br>
                    <input id="name_kitten" type="text" class="validate" name="name_special" style="font-size: 25px;font-family: 'Roboto', sans-serif;">
                    <label id="label" for="input_text">Name</label>
                    <div id="result-catname" style="font-size: 20px;font-family: 'Roboto', sans-serif;"></div>
                </div>
                <div class="input-field col s6"><br><br>
                    <input id="age" type="text" class="validate" name="age_special" style="font-size: 25px;font-family: 'Roboto', sans-serif;">
                    <label id="label" for="input_text">Age</label>
                </div><br>
                <div class="input-field col s6"><br><br>
                    <input id="sex" type="text" class="validate" name="sex_special" style="font-size: 25px;font-family: 'Roboto', sans-serif;">
                    <label id="label" for="input_text">Sex</label>
                </div>
                <div class="input-field col s6"><br><br>
                    <textarea id="textarea1" name="descr_special" class="materialize-textarea" style="font-size: 25px;font-family: 'Roboto', sans-serif;"></textarea>
                    <label for="textarea1" style="font-family: 'Montserrat', sans-serif;font-size: 25px;color: black;">Description</label>
                </div>
                <div class="input-field col s6"><br><br>
                    <input id="virus" type="text" class="validate" name="virus" style="font-size: 25px;font-family: 'Roboto', sans-serif;">
                    <label id="label" for="input_text">FIV / FeLV / FHV / FCV</label>
                </div>

            </div><br>

            <button id="send" class="waves-effect waves-light btn-large center-align" type="submit" name="submit">Send</button>

        </form>
    </div>


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

        $('#textarea1').val('');
        M.textareaAutoResize($('#textarea1'));


        /* JQUERY CATNAME VALIDATION */

        $(document).ready(function() {

            $('#name_special').on('blur', function(e) {

                $('#result-catname').html('<img src="../../../assets/images/loader.gif"/>').fadeOut(1000);

                var name = $(this).val();
                var dataString = 'name_special=' + name;

                $.ajax({
                    type: "POST",
                    url: "../../../views/admin/special/validateSpecialName.php",
                    data: dataString,
                    success: function(data) {

                        if (data == 0) {
                            $('#result-catname').fadeIn(1000).html(data);
                        } else {
                            $('#result-catname').fadeIn(1000).html(data);
                        }

                    }
                });
            });
        });
    </script>

</body>

</html>