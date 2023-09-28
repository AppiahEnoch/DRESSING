function showImage(src) {
  const largeImage = document.getElementById("largeImage");
  largeImage.src = src;
}


function loadProductDetails() {
  $.ajax({
    type: "post",
    cache: false,
    url: "getCurrentProduct.php",
    dataType: "json",
    success: function (data, status) {


      // if data is null  
if (data == null || jQuery.isEmptyObject(data)) {
        window.location.href = "../index.php";
        return;
      }
    
      if (data) {
        let smallImagesHTML = "";
        let filepaths = data.filepath; // adjusted to match PHP output
        for (let i = 0; i < filepaths.length; i++) {
          smallImagesHTML += `<img src="${filepaths[i]}" alt="Cloth Image ${i + 1}" id="smallImage${i}" name="smallImage${i}" onclick="showImage('${filepaths[i]}')">`;
        }
        $('#imageCard .small-images').html(smallImagesHTML);
        
        if (filepaths.length > 0) {
          $('#largeImage').attr('src', filepaths[0]);
        }
        
        $('#productDetails h3').first().text(data.name);
        $('#productDetails .description-price p').text(`${data.currency+" "}${data.price}`);
        
        let colorFound = false;
        $("#colorSelect option").each(function() {
          if ($(this).val() === data.color) {
            $(this).prop('selected', true);
            colorFound = true;
          }
        });
        if (!colorFound) {
          $('#colorSelect').append($('<option>', {
            value: data.color,
            text: data.color,
            selected: true
          }));
        }

        let sizeFound = false;
        $("#sizeSelect option").each(function() {
          if ($(this).val() === data.size) {
            $(this).prop('selected', true);
            sizeFound = true;
          }
        });
        if (!sizeFound) {
          $('#sizeSelect').append($('<option>', {
            value: data.size,
            text: data.size,
            selected: true
          }));
        }
        
      } else {

        window.location.href = "../index.php";
        showToast("aeToastE", "Error", "Failed to fetch product details.", "20");
      }
    },
    error: function (xhr, status, error) {
      window.location.href = "../index.php";
      showToast("aeToastE", "Error", "Failed to fetch product details.", "20");
      console.error(error);
    },
  });
}

function showImage(imagePath) {
  $('#largeImage').attr('src', imagePath);
}

$(document).ready(function () {
  loadProductDetails();
});





$(document).ready(function () {
  $("#collapsibleContactForm").on("submit", function (e) {
    e.preventDefault();
    const email = $("#collapsibleContactForm_email").val();
    const message = $("#collapsibleContactForm_message").val();


    function validateForm() {
      const email = $("#collapsibleContactForm_email").val();
      const message = $("#collapsibleContactForm_message").val();
      
      const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      
      if (!emailPattern.test(email)) {
        showToast("aeToastE","Invalid Email","Please enter a valid email address","20");
        return false;
      }
      
      if (message === null || message.trim() === "") {
        showToast("aeToastE","Empty Message","Message cannot be empty","20");
        return false;
      }
      
      return true;
    }
    
    aeLoading()

    $.ajax({
      type: "post",
      cache: false,
      url: "EMAIL.php",
      data: {
        email: email,
        message: message,
      },
      dataType: "text",
      success: function (data, status) {
        aeLoading()
    
        if (data=="1") {
          showToast("aeToastS", "Message Sent Successfully", "Your message has been sent to the shop owner. We greatly appreciate your engagement and you can expect a response soon. Thank you for reaching out to us!", "20");

        } else {
          showToast("aeToastE", "Error", "Message could not be sent.", "20");
        }
      },
      error: function (xhr, status, error) {
        showToast("aeToastE", "Error", "Message could not be sent.", "20");
        console.error(error);
        aeLoading()
      },
    });
  });
});
