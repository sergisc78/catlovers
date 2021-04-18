function message(e) {
  var username = document.getElementById('username').value;
  if (username > 20 || username == "") {
    alertify.error("hello, babbiii");
    e.preventDefault();
  } else {
    alertify.alert("Error","fucker");
  }
}

