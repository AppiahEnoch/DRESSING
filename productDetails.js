
  

  $(document).ready(function () {

    $.ajax({
      type: "get",
      url: "getProducts.php",
      dataType: "text",
      success: function (data, status) {

        alert(data)
        let html = '<div class="container-fluid justify-content-center align-items-center d-flex mt-5" id="wrapper1" name="wrapper1">';
        let navbarHtml = '';
  
        Object.keys(data).forEach(category => {
          if (Array.isArray(data[category])) {
            const id = category.replace(/\s+/g, '').toLowerCase();
            const formattedCategory = category.toLowerCase().split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
            
            const justCategoryName = category.split(/\d/)[0].trim().toLowerCase().split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
            
            navbarHtml += `<li class="nav-item" id="${id}Item">
                            <a class="nav-link" href="#${id}Sec" id="${id}Link">${justCategoryName}</a>
                          </li>`;
  
            html += `<div class="row justify-content-center w-100" id="${id}Sec">
                      <h2 class="w-100 text-center mycategory">${formattedCategory}</h2>`;
                      
            let count = 0;
            data[category].forEach(product => {
              let filepath = product.filepath.replace(/^\.+/,'.');
              let hideClass = count >= 4 ? "d-none hidden-product" : "";
              html += `<div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center mb-4 ${hideClass}">
                        <div class="card product-card" id="card${product.id}" aria-label="Product Card">
                          <img src="${filepath}" onerror="this.onerror=null; this.src='path/to/default.jpg';" class="card-img-top" alt="${product.name}" id="productImage${product.id}">
                          <div class="card-body" id="cardBody${product.id}">
                            <h5 class="card-title" id="productTitle${product.id}" aria-label="Product Title">${product.name}</h5>
                            <p class="card-text price" id="productPrice${product.id}" aria-label="Product Price">${product.currency} ${product.price}</p>
                            <div class="d-grid gap-2" id="actionButtons${product.id}">
                              <a href="#" class="btn btn-outline-secondary view-details" id="viewDetails${product.id}" aria-label="View Details">Quick View</a>
                            </div>
                          </div>
                        </div>
                      </div>`;
              count++;
            });
  
            if (count > 4) {
              html += '<div class="col-12 text-center"><button class="btn btn-primary toggle-view-more">View More</button></div>';
            }
          
            
          } else {
            showToast("aeToastE", "Data Error", "Invalid data structure", "20");
          }
        });
  
        html += '</div>';
        $("#productContainer").html(html);
        $("#navbarList").prepend(navbarHtml);
  
        $(".nav-link").on('click', function(event) {
          if (this.hash !== "") {
            event.preventDefault();
            const hash = this.hash;
            $('html, body').animate({
              scrollTop: $(hash).offset().top - 200  // Offset by 50 pixels (height of the navbar)
            }, 50)
          }
        });
  
        $(".toggle-view-more").click(function () {
          $(this).closest('.row').find('.hidden-product').toggleClass('d-none');
          $(this).text($(this).text() === "View More" ? "View Less" : "View More");
        });
      },
      error: function (xhr, status, error) {
        showToast("aeToastE", "Error1", error, "20");
      }
    });

  });
  
  
  
  function mostRecentProduct(){
    $.ajax({
      type: "get",
      url: "getRecentProducts.php",
      dataType: "json",
      success: function (data, status) {
        $("#navbarList li:not(#newArrivalsItem):not(#personalizeItem1):not(#loginItem)").remove();


        let html = '<div class="container-fluid justify-content-center align-items-center d-flex" id="wrapper1" name="wrapper1">';
        let navbarHtml = '';
  
        Object.keys(data).forEach(category => {
          if (Array.isArray(data[category])) {
            const id = category.replace(/\s+/g, '').toLowerCase();
            const formattedCategory = category.toLowerCase().split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
            
            const justCategoryName = category.split(/\d/)[0].trim().toLowerCase().split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
            
            navbarHtml += `<li class="nav-item" id="${id}Item">
                            <a class="nav-link" href="#${id}Sec" id="${id}Link">${justCategoryName}</a>
                          </li>`;
  
            html += `<div class="row justify-content-center w-100" id="${id}Sec">
                      <h2 class="w-100 text-center mycategory">${formattedCategory}</h2>`;
                      
            let count = 0;
            data[category].forEach(product => {
              let filepath = product.filepath.replace(/^\.+/,'.');
              let hideClass = count >= 4 ? "d-none hidden-product" : "";
              html += `<div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center mb-4 ${hideClass}">
                        <div class="card product-card" id="card${product.id}" aria-label="Product Card">
                          <img src="${filepath}" onerror="this.onerror=null; this.src='path/to/default.jpg';" class="card-img-top" alt="${product.name}" id="productImage${product.id}">
                          <div class="card-body" id="cardBody${product.id}">
                            <h5 class="card-title" id="productTitle${product.id}" aria-label="Product Title">${product.name}</h5>
                            <p class="card-text price" id="productPrice${product.id}" aria-label="Product Price">${product.currency} ${product.price}</p>
                            <div class="d-grid gap-2" id="actionButtons${product.id}">
                              <a href="#" class="btn btn-outline-secondary view-details" id="viewDetails${product.id}" aria-label="View Details">Quick View</a>
                            </div>
                          </div>
                        </div>
                      </div>`;
              count++;
            });
  
            if (count > 4) {
              html += '<div class="col-12 text-center"><button class="btn btn-primary toggle-view-more">View More</button></div>';
            }
          
            
          } else {
            showToast("aeToastE", "Data Error", "Invalid data structure", "20");
          }
        });
  
        html += '</div>';
        $("#productContainer").html(html);
        $("#navbarList").prepend(navbarHtml);
  
        $(".nav-link").on('click', function(event) {
          if (this.hash !== "") {
            event.preventDefault();
            const hash = this.hash;
            $('html, body').animate({
              scrollTop: $(hash).offset().top -200
            }, 50);
          }
        });
  
        $(".toggle-view-more").click(function () {
          $(this).closest('.row').find('.hidden-product').toggleClass('d-none');
          $(this).text($(this).text() === "View More" ? "View Less" : "View More");
        });
      },
      error: function (xhr, status, error) {
        showToast("aeToastE", "Error", error, "20");
      }
    });

  }



  // Global variable to store fetched data
let allProductsData = null;

// Fetch all products data once on page load
$(document).ready(function () {
  $.ajax({
    type: "get",
    url: "getProducts.php",
    dataType: "json",
    success: function (data, status) {
      allProductsData = data;
      

     // searchKeyword(""); // Create cards with all products initially
    },
    error: function (xhr, status, error) {
      showToast("aeToastE", "Error", error, "20");
    }
  });

  // Input event listener for keyword input field
  $("#searchBox").on("input", function () {
    const keyword = $(this).val().toLowerCase();
    if (allProductsData !== null) {
      searchKeyword(keyword);
    }
  });
});

// Function to filter products based on keyword
function filterProductsByKeyword(data, keyword) {
  const filteredData = {};
  Object.keys(data).forEach(category => {
    filteredData[category] = [];
    data[category].forEach(product => {
      if (
          product.name.toLowerCase().includes(keyword) ||
          product.categoryName.toLowerCase().includes(keyword) ||
          product.price.toString().includes(keyword) ||
          (product.size && product.size.toString().includes(keyword))
        ) {
        filteredData[category].push(product);
      }
    });
  });
  return filteredData;
}



// Existing function to create cards based on keyword


function searchKeyword(keyword) {
  const data = filterProductsByKeyword(allProductsData, keyword);
  let html = '<div class="container-fluid justify-content-center align-items-center d-flex" id="wrapper1" name="wrapper1">';

  let resultsFound = false;

  Object.keys(data).forEach(category => {
    if (Array.isArray(data[category]) && data[category].length > 0) {
      resultsFound = true;
      const id = category.replace(/\s+/g, '').toLowerCase();
      const formattedCategory = category.toLowerCase().split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');

      html += `<div class="row justify-content-center w-100" id="${id}Sec">
                <h2 class="w-100 text-center mycategory">${formattedCategory}</h2>`;
                
      let count = 0;
      data[category].forEach(product => {
        let filepath = product.filepath.replace(/^\.+/,'.');
        let hideClass = count >= 4 ? "d-none hidden-product" : "";
        html += `<div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center mb-4 ${hideClass}">
                  <div class="card product-card" id="card${product.id}" aria-label="Product Card">
                    <img src="${filepath}" onerror="this.onerror=null; this.src='path/to/default.jpg';" class="card-img-top" alt="${product.name}" id="productImage${product.id}">
                    <div class="card-body" id="cardBody${product.id}">
                      <h5 class="card-title" id="productTitle${product.id}" aria-label="Product Title">${product.name}</h5>
                      <p class="card-text price" id="productPrice${product.id}" aria-label="Product Price">${product.currency} ${product.price}</p>
                      <div class="d-grid gap-2" id="actionButtons${product.id}">
                        <a href="#" class="btn btn-outline-secondary view-details" id="viewDetails${product.id}" aria-label="View Details">Quick View</a>
                     
                        </div>
                    </div>
                  </div>
                </div>`;
        count++;
      });

      if (count > 4) {
        html += '<div class="col-12 text-center"><button class="btn btn-primary toggle-view-more">View More</button></div>';
      }

    } else {
     // showToast("aeToastE", "Data Error", "Invalid data structure", "20");
    }
  });

  html += '</div>';
  $("#productContainer").html(html);

  $(".toggle-view-more").click(function () {
    $(this).closest('.row').find('.hidden-product').toggleClass('d-none');
    $(this).text($(this).text() === "View More" ? "View Less" : "View More");
  });

  if (resultsFound) {
    $("#productContainer").removeClass('d-none');
  } else {
    $("#productContainer").addClass('d-none');
   // showToast("aeToastE", "No Results", "No products found for the given keyword.", "20");
  }
}



function getSelectedProductDetails() {
  $(document).on('click', '.view-details', function() {
  const cardId = $(this).attr("id").replace("viewDetails", "");


alert(cardId)
    
    $.ajax({
      type: "post",
      url: "setCurrentProductIdInSession.php",
      data: { productId: cardId },
      dataType: "text",
      success: function(data, status) {

   
      openPage("currentProduct/page.php");


  

      
  

      },
      error: function(xhr, status, error) {
        showToast("aeToastE", "Error", error, "20");
      }
    });
  });
}

$(document).ready(function () {
  getSelectedProductDetails();
});


