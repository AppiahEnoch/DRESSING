$(document).ready(function() {
    $.ajax({
      type: "post",
      url: "getSession.php",
      dataType: "json",
      success: function(data, status) {
        if(data.user_level == 3) {
          $("#adminList").removeClass("d-none");
        }
      },
      error: function(xhr, status, error) {
        showToast("aeToastE", "Error", error, "20");
      }
    });
  });
  