window.onload = function () {
    document.getElementById("send").addEventListener("click", function (e) {
        
      /* VARIABLES */
  
      var name_adult = document.getElementById("name_adult").value,
        age_=document.getElementById("age"),
        sex = document.getElementById("sex").value,
        descr = document.getElementById("textarea1").value,
        virus = document.getElementById("virus").value;
  
      /* ERROR CONTROLS */
  
      if (name_adult == "" || age_ == "" || sex == "" || descr == "" | virus == "") {
         alertify.alert("Watch out !", "Except image,you can´t leave an empty field !");
         e.preventDefault();
      }
    });
  };
  