function getSuggestions() {
    $("#searchBox").on("input", function() {
        const keyword = $(this).val();
        if (keyword.length > 0) {
            $.ajax({
                type: "post",
                url: "get_product_suggestions.php",
                data: { keyword: keyword },
                dataType: "json",
                success: function(data) {
                    let suggestionItems = '';
                    data.forEach((item) => {
                        suggestionItems += `<a href="#" class="list-group-item list-group-item-action">${item}</a>`;
                    });
                    $("#suggestionList").html(suggestionItems);
                },
                error: function() {
                    showToast("aeToastE", "Error", "Unable to fetch suggestions", "20");
                }
            });
        } else {
            $("#suggestionList").html("");
        }
    });
}

$(document).ready(function() {
    getSuggestions();
});






$(document).on("click", ".list-group-item", function() {
    const selectedText = $(this).text();
    $("#searchBox").val(selectedText);
    $("#suggestionList").empty();

    $.ajax({
        type: "post",
        cache: false,
        url: "get_product_details.php", // Changed back to original PHP filename
        data: { productName: selectedText },
        dataType: "json",
        success: function (data, status) {

      
            if (data.status === "success") {
                const files = data.data.files; // Updated based on PHP output structure
              // alert(1);
              populateProductDetails(data.data)
                 displayImages(files);



            } else {
                showToast("aeToastE", "Error", data.message, "20");
            }
        },
        error: function (xhr, status, error) {
           showToast("aeToastE", "Error", error, "20");
        },
    });
});


function populateProductDetails(data) {
    // Special handling for Accepted Currencies and Product Category
    $("#update_acceptedCurrencies").find(`option[value="${data.product.currency}"]`).prop('selected', true);
    $("#update_productCategory").find(`option[value="${data.product.category}"]`).prop('selected', true);
  
   // alert(data.product.category)
    // Populate Product Name
    $("#update_productName").val(data.product.name);
  
    // Populate Price
    $("#update_productPrice").val(data.product.price);
  
    // Populate Size
    $("#update_productSize").val(data.product.size);
  
    // Populate Color
    $("#update_productColor").val(data.product.color);
  }
  
  

function displayImages(files) {
    $("#edit_imageGrid").empty();
    files.forEach(function(file) {

        //alert(file)
        const imageElement = `
            <div class="col-3 position-relative">
                <img src="${file}" alt="Uploaded Image" class="img-thumbnail">
                <i class="fas fa-times-circle position-absolute top-0 end-0 text-danger cursor-pointer close-icon"></i>
           
                </div>`;
        $("#edit_imageGrid").append(imageElement);
    });
}



// Adding event listeners for delete and update on images
$(document).on("click", ".close-icon", function() {
    const filePath = $(this).siblings("img").attr("src");
    const elementToRemove = $(this).parent();

    showToastY("aeToastY", "Confirm Delete", "Are you sure you want to delete this image?", "20", function() {
        $.ajax({
            type: "post",
            url: "deleteProductImage.php",
            data: { filepath: filePath },
            dataType: "json",
            success: function (data, status) {
                if (data.status === 'success') {
                    showToast("aeToastS","Success",data.message,"20");
                    elementToRemove.remove();
                } else {
                    showToast("aeToastE","Error",data.message,"20");
                }
            },
            error: function (xhr, status, error) {
                showToast("aeToastE","Error",error,"20");
            },
        });
    }, function() {
        // No action if user selects 'No'
    });
});





let currentImage;
let filePath;

$(document).on("click", ".img-thumbnail", function() {
    currentImage = $(this);
    filePath = $(this).attr("src");
    $("#hiddenFileInput").trigger("click");
});

$("#hiddenFileInput").change(function() {
    const file = this.files[0];
    const formData = new FormData();
    formData.append('file', file);
    formData.append('oldFilePath', filePath);

    $.ajax({
        url: 'updateProductImage.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (data, status) {
            if (data.status === 'success') {
                showToast("aeToastS","Success",data.message,"20");
                currentImage.attr('src', data.newFilePath);
            } else {
                showToast("aeToastE","Error",data.message,"20");
            }
        },
        error: function (xhr, status, error) {
            showToast("aeToastE","Error",error,"20");
        }
    });
});





// JavaScript code
// Update to existing JavaScript code
$(document).ready(function() {
    $("#addNewImage").click(function() {
        $("#hiddenFileInputForInsert").trigger("click");
    });

    $("#hiddenFileInputForInsert").change(function() {
        const file = this.files[0];
        const formData = new FormData();
        formData.append('file', file);

        $.ajax({
            url: 'addMoreImage.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (data, status) {
                
                if (data.status === 'success') {
                    showToast("aeToastS","Success",data.message,"20");
                    addNewImageToGrid(data.filepath);  // Assuming the 'filepath' key in the returned JSON
                } else {
                    showToast("aeToastE","Error",data.message,"20");
                }
            },
            error: function (xhr, status, error) {
               showToast("aeToastE","Error",error,"20");
            }
        });
    });
});

function addNewImageToGrid(file) {
    const imageElement = `
        <div class="col-3 position-relative">
            <img src="${file}" alt="Uploaded Image" class="img-thumbnail">
            <i class="fas fa-times-circle position-absolute top-0 end-0 text-danger cursor-pointer close-icon"></i>
        </div>`;
    $("#edit_imageGrid").append(imageElement);
}





function updateProduct() {
  
    const name = $("#update_productName").val();
    const category = $("#update_productCategory").val();
    const price = $("#update_productPrice").val();
    const size = $("#update_productSize").val();
    const color = $("#update_productColor").val();
    const currency = $("#update_acceptedCurrencies").val();

    //alert(color)
  
    $.ajax({
      type: "post",
      cache: false,
      url: "updateProductDetails.php",
      dataType: "json",
      data: {
        name: name,
        category: category,
        price: price,
        size: size,
        color: color,
        currency: currency
      },
      success: function (data, status) {
        if (data.status === "success") {
          showToast("aeToastS", "Product Updated", "The product has been successfully updated.", "20");
        } else {
          showToast("aeToastE", "Update Failed", "Failed to update the product.", "20");
        }
      },
      error: function (xhr, status, error) {
        showToast("aeToastE", "Error", error, "20");
        console.error(error);
      },
    });
  }
  
  $("#upadteProduct").on("click", function(e) {
    e.preventDefault();
    updateProduct();
  });








  $("#deleteProduct").on("click", function(e) {
    e.preventDefault();
    showToastY(
      "aeToastY", 
      "Confirm Delete", 
      "Are you sure you want to delete this product?", 
      "20", 
      deleteProduct, 
      function() {
        showToast("aeToastE", "Cancelled", "Product deletion cancelled.", "20");
      }
    );
  });
  
  function deleteProduct() {
    $.ajax({
      type: "post",
      cache: false,
      url: "deleteProduct.php",
      dataType: "json",
      success: function(data, status) {
       // alert(data)
        if (data.success) {
          showToast("aeToastS", "Delete Successful", "Product has been deleted.", "20");
        } else {
          showToast("aeToastE", "Delete Failed", data.error, "20");
        }
      },
      error: function(xhr, status, error) {
        showToast("aeToastE", "Error", error, "20");
      },
    });
  }
  
  
  
  
  