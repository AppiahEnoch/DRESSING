var indexnumber = 0;

$(document).ready(function () {

  getID();


  $("#form1").on("submit", function (e) {
    e.preventDefault();
    reset();


  });
});

function reset() {
  // Collecting the input data from the form
  var username = $("#username").val();
  var password = $("#password").val();
  var confirmPassword = $("#confirmPassword").val();
 

  if (!validatePassword(password)) {
    var m =
      "Password must be at least 8 characters long " +
      " and contains at least one lowercase letter, one " +
      "uppercase letter, one number, and one special character";
    showToast("aeToastE", "PASSWORD NOT ACCEPTED", m, "20");

    return;
  }

  if (!passwordConfirm(password, confirmPassword)) {
    showToast(
      "aeToastE",
      "PASSWORD MISMATCH",
      "Confirm Password does not match with password",
      "20"
    );

    return;
  }

  // Sending the data to reset.php using AJAX
  $.ajax({
    type: "post",
    data: {
      username: username,
      password: password,
      indexnumber: indexnumber, // Including the index number in the request
    },
    cache: false,
    url: "reset.php", // Path to your PHP file
    dataType: "text",
    success: function (data, status) {

      showToastYN("aeToastYN", "SUCCESS!","YOUR USERNAME AND PASSWORD RESET IS SUCCESSFUL !", "20");
     

    },
    error: function (xhr, status, error) {
      // Handle any errors
      // alert(error);
    },
  });
}



function getID() {
  $.ajax({
    type: "post",
    data: {
      id: "none",
    },
    cache: false,
    url: "selectID.php",
    dataType: "text",
    success: function (data, status) {
      indexnumber = data;
    },
    error: function (xhr, status, error) {
      // alert(error);
    },
  });
}








//  showToastYN("aeToastYN", "Confirm Delete All.", "Are you sure you want to delete all registration codes?", "20");
 



function handleYesClick() {

  openPage("../index.php")

}









//  

