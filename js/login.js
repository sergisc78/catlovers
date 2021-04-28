window.onload = function () {
  document.getElementById("send").addEventListener("click", function (e) {
      
    /* VARIABLES */

    var username = document.getElementById("username").value,
      password = document.getElementById("password").value;

    /* ERROR CONTROLS */

    if (username == "" || password == "") {
      alertify.alert("Watch out !", "You can´t leave an empty field !");
      e.preventDefault();
    }
  });
};
