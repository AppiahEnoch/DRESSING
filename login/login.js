$(document).ready(function () {
  $("#wrapper1 form").on("submit", function (e) {
    e.preventDefault();
    authenticateUser();
  });
});

function authenticateUser() {
  const usernameOrEmail = $("#usernameOrEmail").val();
  const password = $("#password").val();

  $.ajax({
    type: "post",
    cache: false,
    url: "validate_login.php",
    data: { usernameOrEmail: usernameOrEmail, password: password },
    dataType: "text",
    success: function (data, status) {
      if (data == "0") {
        showToast("aeToastE", "INVALID LOGIN ATTEMPT", "Invalid credentials.", "20");
        return;
      
      } else if (data == "1") {
        window.location.href = "../portal/page.php";
        return;
      
      
      } else {
       openPage("../admin/page.php")
        return;
      }
    },
    error: function (xhr, status, error) {
      console.error(error);
      showToast("aeToastE", "Error", "Failed to authenticate user.", "20");
    },
  });
}
