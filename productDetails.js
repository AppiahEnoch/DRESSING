function showImage(src) {
    const largeImage = document.getElementById("largeImage");
    largeImage.src = src;
  }
  

  $(document).ready(function () {

    $.ajax({
      type: "get",
      url: "getProducts.php",
      dataType: "json",
      success: function (data, status) {
        let html = '<div class="container-fluid justify-content-center align-items-center d-flex" id="wrapper1" name="wrapper1">';
        let navbarHtml = '';
  
        Object.keys(data).forEach(category => {
          if (Array.isArray(data[category])) {
            const id = category.replace(/\s+/g, '').toLowerCase();
            const formattedCategory = category.toLowerCase().split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
  
            const justCategoryName = category.split(' ')[0].toLowerCase().split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
  
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
              scrollTop: $(hash).offset().top
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
  
            const justCategoryName = category.split(' ')[0].toLowerCase().split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
  
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
              scrollTop: $(hash).offset().top
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