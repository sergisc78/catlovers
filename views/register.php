<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>

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

    <link rel="stylesheet" href="../css/styles.css">

    <!--MATERIALIZE
    <link rel="stylesheet" href="../css/materialize/css/materialize.min.css"> -->

    <!--FONT AWESOME-->

    <link rel="stylesheet" href="../assets/fontAwesome/fontawesome/css/all.min.css">

    <!-- JQUERY -->

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- CSS -->

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <!-- Semantic UI theme -->

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />

    <script src="../js/alertify.js"></script>


</head>

<body>

    <!-- NAV -->

    <nav class="nav" style="background-image: linear-gradient(to right,#4A569D,#DC2424);min-height: 130px;">
        <div class="container ">
            <div class="nav-wrapper ">
                <a id="logo" href="#" class="brand-logo">Catlovers</a><i class="fas fa-cat fa-5x"></i>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a id="options" href="../views/index.html" class="home">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- FORM REGISTER -->

    <h3 class="title-form center">Create an account</h3>
    <div class="row">
        <form id="form" action="regisAccepted.php" method="post" class="col s12">
            <div class="row">
                <div class="input-field col s6"><br><br>
                    <input id="username" type="text" class="validate" name="username" style="font-size: 25px;font-family: 'Roboto', sans-serif;">
                    <label id="label" for="input_text">Username ( 20 characters max )</label>
                    <div id="result-username" style="font-size: 20px;font-family: 'Roboto', sans-serif;"></div>
                </div>
                <div class="input-field col s6"><br><br>
                    <input id="email" type="email" class="validate" name="email" style="font-size: 25px;font-family: 'Roboto', sans-serif;">
                    <label id="label" for="input_text">Email ( Right format, please )</label>
                    <span id="result-email" style="font-size: 20px;font-family: 'Roboto', sans-serif;"></span>
                </div><br>
                <div class=" input-field col s6"><br><br>
                    <input id="password" type="password" class="validate" name="password">
                    <label id="label" for="input_text">Password ( 8 characters min )</label>
                </div>
                <div class=" input-field col s6"><br><br>
                    <input id="cPassword" type="password" class="validate" name="cpassword">
                    <label id="label" for="input_text">Confirm password</label>
                </div><br>
            </div>


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

        /* JQUERY USERNAME AND EMAIL VALIDATION */

        $(document).ready(function() {


            /* USERNAME */

            $('#username').on('blur', function(e) {

                $('#result-username').html('<img src="../assets/images/loader.gif"/>').fadeOut(1000);

                var username = $(this).val();
                var dataString = 'username=' + username;

                $.ajax({
                    type: "POST",
                    url: "usernamevalidate.php",
                    data: dataString,
                    success: function(data) {
                        if (data == 0) {
                            $('#result-username').fadeIn(1000).html(data);
                            $("#username").val("");
                        } else {
                            $('#result-username').fadeIn(1000).html(data);
                        }

                    }
                });

                /* EMAIL */
                
                $('#email').on('blur', function() {

                    $('#result-email').html('<img src="../assets/images/loader.gif"/>').fadeOut(1000);

                    var email = $(this).val();
                    var dataString = 'email=' + email;

                    $.ajax({
                        type: "POST",
                        url: "emailValidate.php",
                        data: dataString,
                        success: function(data) {
                            $('#result-email').fadeIn(1000).html(data);

                        }
                    });

                });

            });
        });
    </script>

</body>

</html>