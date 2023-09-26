$(document).ready(function() {
    $("#formaddAdmin").on("submit", function(e) {
      e.preventDefault();
      registerAdmin();
    });
  });


function registerAdmin() {
    const username = $("#username").val();
    const email = $("#email").val();
    var mobile = $("#mobile").val();

    if(aeEmpty(mobile)){
        mobile="0000000000";
    }
    const password = $("#password").val();
    const confirm_password = $("#confirm_password").val();
    const admin_level = $("#admin_level").val();


    if (password !== confirm_password) {
        showToast("aeToastE", "INVALID PASSWORD", "Passwords do not match", "20");
        return;
      }
  
    $.ajax({
      type: "post",
      cache: false,
      url: "insertAdmin.php",
      dataType: "json",
      data: { username, email, mobile, password, adminLevel: admin_level },
      success: function (data, status) {
        if (data.success) {
          showToastR( "aeToastR","Success","Admin successfully registered.","20");
        } else {
          showToast( "aeToastE","Error",data.error,"20");
        }
      },
      error: function (xhr, status, error) {
        showToast( "aeToastE","Error",error,"20");
      },
    });
  }
  



  $(document).ready(function() {
    function populateTable() {
      $.ajax({
        type: "get",
        url: "selectAdmin.php",
        dataType: "json",
        success: function (data) {
          let rows = "";
          data.forEach(user => {
            let level = user.userlevel == 3 ? "Super Admin" : "Admin";
            rows += `<tr>
                      <td>${user.id}</td>
                      <td>${user.username}</td>
                      <td contenteditable="true" onkeyup="updateLevel(${user.id}, this)">${level}</td>
                      <td><button class="btn btn-danger btn-sm" onclick="deleteUser(${user.id})">Delete</button></td>
                     </tr>`;
          });
          $("#adminTable tbody").html(rows);

        },
        error: function (xhr, status, error) {
          showToast("aeToastE", "Error", error, "20");
        }
      });
    }
    
    populateTable();
  
    window.updateLevel = function(id, element) {
        let newLevel;
        const levelText = $(element).text().trim().toLowerCase();
        if (levelText === "super admin") {
          newLevel = 3;
        } else if (levelText === "admin") {
          newLevel = 2;
        } else {
          showToast("aeToastE", "Error", "Invalid Level", "20");
          return;
        }


      $.ajax({
        type: "post",
        url: "updateAdminLevel.php",
        data: { id, newLevel },
        dataType: "json",
        success: function(data) {
          if (data.success) {
            showToastR("aeToastR", "Updated", "Level updated successfully", "20");
          } else {
            showToast("aeToastE", "Failure", "Could not update level", "20");
          }
        },
        error: function(xhr, status, error) {
          showToast("aeToastE", "Error", error, "20");
        }
      });
    };
  
    window.deleteUser = function(id) {
      showToastY(
        "aeToastY",
        "Confirm Delete",
        "Are you sure you want to delete this user?",
        "20",
        function() {
          $.ajax({
            type: "post",
            url: "deleteAdmin.php",
            data: { id },
            dataType: "json",
            success: function (data) {
              if (data.success) {
                showToast("aeToastS", "Success", "User deleted successfully", "20");
                populateTable();
              } else {
                showToast("aeToastE", "Error", "Could not delete user", "20");
              }
            },
            error: function (xhr, status, error) {
              showToast("aeToastE", "Error", error, "20");
            }
          });
        },
        function() {
          showToast("aeToastE", "Cancelled", "User not deleted", "20");
        }
      );
    }
  });
  
  
  