/*function message(e) {
  var username = document.getElementById('username').value;
  if (username.length > 20) {
    alertify.alert("Beware !","Username too long !");
    e.preventDefault();
  } else if ( username == "") {
    alertify.alert("Beware !","Username can´t be empty");
    e.preventDefault();
  }
}*/

window.onload = function () {
  document.getElementById("send").addEventListener("click", function (e) {

    /* VARIABLES */
    
    var username = document.getElementById("username").value,
      password = document.getElementById("password").value,
      cPassword = document.getElementById("cPassword").value;

    /* ERROR CONTROLS*/

    if (username.length > 20) {
      alertify.alert("Beware !", "Username too long ! 20 characters maximum !");
      e.preventDefault();
    } else if (username == "") {
      alertify.alert("Beware !", "Username can´t be empty");
      e.preventDefault();
    } else if (password.length < 8) {
      alertify.alert("Beware !", "Password too much short and weak!");
      e.preventDefault();
    } else if (password != cPassword) {
      alertify.alert(
        "Beware !",
        "Password and confirm password don´t coincide!"
      );
      e.preventDefault();
    } else {
      alertify.alert("Great !", "Good job !");
    }
  });
};
