$(document).ready(function() {
  $.ajax({
    type: "post",
    cache: false,
    url: "getUserDetails.php",
    dataType: "json",
    success: function (data, status) {
      
      //alert(data);
      if (data.success) {

        $("ul.list-group").html(`
          <li class="list-group-item"><strong>Country: </strong> ${data.country}</li>
          <li class="list-group-item"><strong>Username: </strong> ${data.username}</li>
          <li class="list-group-item"><strong>Email: </strong> ${data.email}</li>
          <li class="list-group-item"><strong>Total Number of Orders Made: </strong> ${data.total_orders}</li>
        `);
      } else {
        showToast("aeToastE","Error",data.error,"20");
      }
    },
    error: function (xhr, status, error) {
      showToast("aeToastE","Error",error,"20");
    }
  });
});
