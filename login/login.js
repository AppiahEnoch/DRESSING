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
      dataType: "json",
      success: function (data, status) {
        if (data.success) {
          showToast("aeToastS", "Success", "Login successful.", "20");
    
        } else {
          showToast("aeToastE", "INVALID USERNAME OR PASSWORD", "Invalid username or password.", "20");
        }
      },
      error: function (xhr, status, error) {
        console.error(error);
        showToast("aeToastE", "Error", "Failed to authenticate user.", "20");
      },
    });
  }
  