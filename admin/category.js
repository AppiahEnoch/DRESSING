$(document).ready(function () {
    $("#formAddCategory").on("submit", function (e) {
      e.preventDefault();
  
      $.ajax({
        type: "post",
        cache: false,
        url: "insertCategory.php",
        data: $("#formAddCategory").serialize(),
        dataType: "json",
        success: function (data, status) {
          if (data.status === "success") {
         
            showToastR("aeToastR", "Success", "Category successfully added", "20");
          } else {
            showToast("aeToastE", "Error", "Category could not be added", "20");
          }
        },
        error: function (xhr, status, error) {
          console.error(error);
          showToast("aeToastE", "Error", "Something went wrong", "20");
        },
      });
    });
  });
  



  $(document).ready(function () {
    function fetchCategories() {
        $.ajax({
          type: "get",
          cache: false,
          url: "selectCategory.php",
          dataType: "json",
          success: function (data, status) {
            let tableContent = '<thead><tr><th>ID</th><th>Category</th><th>Action</th></tr></thead><tbody>';
            let selectOptions = '<option selected>Select a category</option>';
            
            data.forEach(function (category) {
              tableContent += '<tr id="row-' + category.id + '">';
              tableContent += '<td>' + category.id + '</td>';
              tableContent += '<td contenteditable="true" id="category-' + category.id + '">' + category.category + '</td>';
              tableContent += '<td><button class="btn btn-danger deleteBtn" data-id="' + category.id + '">Delete</button></td>';
              tableContent += '</tr>';
      
              selectOptions += '<option value="' + category.id + '">' + category.category + '</option>';
            });
            
            tableContent += '</tbody>';
            
            $('#categoryTable').html(tableContent);
            $('#productCategory').html(selectOptions);
            $('#update_productCategory').html(selectOptions);
          
          },
          error: function (xhr, status, error) {
            console.error(error);
          },
        });
      }
      
  
    fetchCategories();
  
    $(document).on("click", ".deleteBtn", function () {
        const id = $(this).data("id");
      
        showToastY(
          "aeToastY", 
          "Confirm Delete", 
          "Are you sure you want to delete this category?", 
          "20", 
          function() {
            $.ajax({
              type: "post",
              cache: false,
              url: "deleteCategory.php",
              data: { id: id },
              dataType: "json",
              success: function (data, status) {
                if (data.status === "success") {
                  $('#row-' + id).remove();
                  showToast("aeToastS", "Deleted", "Category has been deleted", "20");
                } else {
                  showToast("aeToastE", "Error", "Unable to delete the category", "20");
                }
              },
              error: function (xhr, status, error) {
                console.error(error);
                showToast("aeToastE", "Error", "Something went wrong", "20");
              },
            });
          }, 
          function() {
            showToast("aeToastE", "Cancelled", "Category delete cancelled", "20");
          }
        );
      });
      
  
    $(document).on("keyup", "[contenteditable=true]", function () {
      const id = $(this).attr('id').split('-')[1];
      const newCategory = $(this).text();
  
      $.ajax({
        type: "post",
        cache: false,
        url: "updateCategory.php",
        data: { id: id, newCategory: newCategory },
        dataType: "json",
        success: function (data, status) {
          if (data.status === "success") {
            showToast("aeToastS", "Updated", "Category has been updated", "20");
          } else {
            showToast("aeToastE", "Error", "Unable to update the category", "20");
          }
        },
        error: function (xhr, status, error) {
          console.error(error);
          showToast("aeToastE", "Error", "Something went wrong", "20");
        },
      });
    });
  });
  