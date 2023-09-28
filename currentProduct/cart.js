





var changedItems = [];

function loadCartItems() {
  $.ajax({
    type: "post",
    cache: false,
    url: "getCartItems.php",
    dataType: "json",
    success: function (data, status) {
      if (data && data.length > 0) {
        let cartWrapper = $("#cart-card-wrapper");
        cartWrapper.empty(); // Clear the cart wrapper

        data.forEach((item, index) => {
          let imagePath = item.filepaths.length > 0 ? item.filepaths[index].substring(0) : '';
         // alert(imagePath);

          let cartCard = `<div id="product${item.id}" class="col-12 cart-card mb-2">
                            <div class="card" id="detailsCard${index}">
                              <div class="card-header d-flex justify-content-between align-items-center">
                                <span class="item-name">${item.name}</span>
                                <span class="remove-item">
                                  <i class="fas fa-trash-alt"></i> Remove
                                </span>
                              </div>
                              <div class="card-body m-0 p-0">
                                <div class="row m-0 mt-1 p-0">
                                  <div class="col-4">
                                    <img id="itemImg${index}" class="img-fluid" src="${imagePath}" alt="${item.name}" />
                                  </div>
                                  <div class="col-8">
                                    <div class="row">
                                      <div class="col">
                                        <p class="item-quantity"><strong>Qty:</strong> 
                                          <span class="item-quantity "><strong><span class="QTYValue"> 1</span></strong> </span>
                                        </p>
                                      </div>
                                      <div class="col">
                                        <button class="btn btn-sm btn-primary" id="increase${index}">+</button>
                                        <button class="btn btn-sm btn-secondary" id="decrease${index}">-</button>
                                      </div>
                                    </div>
                                    <p class="item-price"><strong>Price:</strong> <span class="priceValue">$${item.price}</span></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>`;

          cartWrapper.append(cartCard);
          $(`#product${item.id} .remove-item`).click(function() {
            removeItem(item.id);

          });


         

$(`#increase${index}`).on("click", function() {
  var currentQuantity = parseInt($(`#product${item.id} .item-quantity strong .QTYValue`).text(), 10);
  var newQuantity = currentQuantity + 1;
  var unitPrice = parseFloat(item.price); // Assuming the unit price is stored in item.price
  
  // Update quantity on UI
  $(`#product${item.id} .item-quantity strong .QTYValue`).text(newQuantity);
  
  // Update total price for this item
  $(`#product${item.id} .item-price .priceValue`).text(`$${(unitPrice * newQuantity).toFixed(2)}`);
  
  var productId = item.id;
  
  // Update changedItems array
  updateChangedItems(productId, newQuantity);
});

$(`#decrease${index}`).on("click", function() {
  var currentQuantity = parseInt($(`#product${item.id} .item-quantity strong .QTYValue`).text(), 10);
  var newQuantity = currentQuantity - 1;
  var unitPrice = parseFloat(item.price); // Assuming the unit price is stored in item.price
  
  if (newQuantity >= 1) {
    // Update quantity on UI
    $(`#product${item.id} .item-quantity strong .QTYValue`).text(newQuantity);
  
    // Update total price for this item
    $(`#product${item.id} .item-price .priceValue`).text(`$${(unitPrice * newQuantity).toFixed(2)}`);
  }
  
  var productId = item.id;
  
  // Update changedItems array
  updateChangedItems(productId, newQuantity);
});
















        });

        updateTotalSummary()
      } else {
        showToast("aeToastE", "Error", "No cart items found.", "20");
      }
    },
    error: function (xhr, status, error) {
      showToast("aeToastE", "Error", error, "20");
    }, 
  });





}


function updateTotalSummary() {
  let totalItems = 0;
  let totalPrice = 0.0;

  $(".QTYValue").each(function() {
    totalItems += parseInt($(this).text(), 10);
  });

  $(".priceValue").each(function() {
    totalPrice += parseFloat($(this).text().substring(1)); // Remove the dollar sign
  });

  $(".totalItems").text(totalItems);
  $(".totalPrice").text(`$${totalPrice.toFixed(2)}`);
}


function updateChangedItems(productId, newQuantity) {
  updateTotalSummary()
  // Check if this product ID already exists in the array
  var existingItem = changedItems.find(function(item) {
    return item.productId === productId;
  });

  if (existingItem) {
    // Update the quantity of the existing item
    existingItem.quantity = newQuantity;
  } else {
    // Add a new item to the array
    changedItems.push({
      productId: productId,
      quantity: newQuantity
    });
  }

  //console.log(changedItems);  // For debugging; shows the current state of the array
}










function removeItem(productId) {

  alert(productId);
  $.ajax({
    type: "post",
    cache: false,
    url: "removeItem.php",
    data: {product_id: productId},
    success: function (data, status) {
      if (data === "success") {
        $(`#product${productId}`).remove();
        updateTotalSummary()
        showToastR("aeToastR", "Success", "Item removed from cart.", "20");
      } else {
        showToast("aeToastE", "Error", "Failed to remove item.", "20");
      }
    },
    error: function (xhr, status, error) {
      showToast("aeToastE", "Error", error, "20");
    },
  });


}









$('#shoppingCart').on('show.bs.offcanvas', function () {
  $("#wrapper1").removeClass("d-none");
  loadCartItems(); 
  });




// Load cart items when offcanvas is shown
$('#shoppingCart').on('show.bs.offcanvas', function () {
$("#wrapper1").removeClass("d-none");
loadCartItems(); 
});

$('#viewCartBtn1').on('show.bs.offcanvas', function () {
  alert(1)
$("#wrapper1").removeClass("d-none");
loadCartItems(); 
});









$(document).ready(function() {



  
  $("#clearCart").click(function() {
    showToastY(
      "aeToastY", 
      "Confirm Clear Cart", 
      "Are you sure you want to clear the shopping cart?", 
      "20", 
      clearCart, 
      function() {


       }
    );
  });
});

function clearCart() {
  $.ajax({
    type: "post",
    cache: false,
    url: "clearCart.php",
    dataType: "json",
    success: function(data, status) {
      if (data.status === "success") {
        showToastR("aeToastR","Success","Cart cleared successfully.","20");
        // Add code to clear the UI cart here
      } else {
        showToast("aeToastE","Error","Failed to clear the cart.","20");
      }
    },
    error: function(xhr, status, error) {
      showToast("aeToastE","Error",error,"20");
    }
  });
}







// Using jQuery, add a click event to the button that toggles the form
$('#collapsibleCardHeader a').on('click', function() {
  $('html, body').animate({ scrollTop: $(document).height() }, 'slow');
});






$(document).ready(function () {


  $("#makePayment").on("click", function () {
    showToastY(
      "aeToastY", 
      "Confirm Payment", 
      "Are you sure you want to make payment?", 
      "20", 
      function() {

     

        // Yes option clicked
        $.ajax({
          type: "post",
          cache: false,
          url: "prepareOrder.php",
          data: {
            changedItems: JSON.stringify(changedItems)
          },
          dataType: "json",
          success: function (data, status) {
          //  alert(data);
            if (data.length > 0) {
              showToast("aeToastS", "Success", "Payment successfully made.", "20");
            } else {
              showToast("aeToastE", "Error", "Payment failed.", "20");
            }
          },
          error: function (xhr, status, error) {
            showToast("aeToastE", "Error", error, "20");
          },
        });
      }, 
      function() {
        // No option clicked
        showToast("aeToastE", "Cancelled", "Payment process cancelled.", "20");
      }
    );
  });
});

