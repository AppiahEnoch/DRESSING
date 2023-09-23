$(document).ready(function () {
    $("#form2").on("submit", function (e) {
      e.preventDefault();
      registerUser();
    });
  });
  


  function registerUser() {
    const username = $("#form2_username").val();
    const email = $("#form2_email").val();
    const password = $("#form2_account_password").val();
    const confirmPassword = $("#form2_confirmPassword").val();
  
    if (password !== confirmPassword) {
      showToastR("aeToastR", "Password Mismatch", "Passwords do not match.", "20");
      return;
    }
  
    $.ajax({
      type: "post",
      cache: false,
      url: "account_insert.php",
      data: { username: username, email: email, password: password },
      dataType: "json",
      success: function (data, status) {
        if (data.success) {
            showWrapper4(['wrapper5'], 'wrapper', 5);

      
        } else if (data.error) {
          showToast("aeToastE", data.error, data.error, "20");
        }
      },
      error: function (xhr, status, error) {
        console.error(error);
        showToast("aeToastE", "Error", "Failed to register user.", "20");
      },
    });
  }
  
  