$(document).ready(function () {
    $("#form2").on("submit", function (e) {
      e.preventDefault();
      registerUser();
    });
  });
  





function registerUser() {
    const username = $("#username").val();
    const email = $("#email").val();
    const password = $("#password").val();
    const confirmPassword = $("#confirmPassword").val();
  
    if (password !== confirmPassword) {
      showToast("aeToastE", "Password Mismatch", "Passwords do not match.", "20");
      return;
    }
  
    $.ajax({
      type: "post",
      cache: false,
      url: "registerUser.php",
      data: { username: username, email: email, password: password },
      dataType: "json",
      success: function (data, status) {
        if (data.success) {
          showToast("aeToastS", "Success", "User successfully registered.", "20");
        }
      },
      error: function (xhr, status, error) {
        const response = JSON.parse(xhr.responseText);
        if (response.error === 'Username already taken') {
          showToast("aeToastE", "Error", "Username already taken.", "20");
        } else if (response.error === 'Email already taken') {
          showToast("aeToastE", "Error", "Email already taken.", "20");
        } else {
          showToast("aeToastE", "Error", "Failed to register user.", "20");
        }
        console.error(error);
      },
    });
  }
  