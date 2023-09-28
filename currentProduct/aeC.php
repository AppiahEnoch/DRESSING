<div id="wrapper1" class="container cartCard  d-none">
  
<div id="cart-card-wrapper" class="row w-100">
    <div id="productid" class="col cart-card">
      <!-- Bootstrap 5 Card -->
      <div class="card" id="detailsCard">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span class="item-name">Sample Item</span>
          <span class="remove-item">
            <i class="fas fa-trash-alt"></i> Remove
          </span>
        </div>
        <div class="card-body m-0 p-0">
          <div class="row m-0 mt-1 p-0">
            <!-- Image -->
            <div class="col-4">
              <img id="itemImg" class="img-fluid" src="https://via.placeholder.com/100" alt="Sample Image" />
            </div>
            
            <!-- Details -->
            <div class="col-8">
               <div class="row">
           <div class="col">
           <p class="item-quantity"><strong>Qty:</strong> 
                <span class="item-quantity"><strong>5</strong> </span>
          </p>
           </div>
           <div class="col">
           <button class="btn btn-sm btn-primary " id="increase">+</button>
            <button class="btn btn-sm btn-secondary" id="decrease">-</button>
           </div>
               </div>
              </p>
              <p class="item-price"><strong>Price:</strong> <span>$20.00</span></p>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Bootstrap 5 Card -->
    </div>
    <div id="productid" class="col cart-card">
      <!-- Bootstrap 5 Card -->
      <div class="card" id="detailsCard">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span class="item-name">Sample Item</span>
          <span class="remove-item">
            <i class="fas fa-trash-alt"></i> Remove
          </span>
        </div>
        <div class="card-body m-0 p-0">
          <div class="row m-0 mt-1 p-0">
            <!-- Image -->
            <div class="col-4">
              <img id="itemImg" class="img-fluid" src="https://via.placeholder.com/100" alt="Sample Image" />
            </div>
            
            <!-- Details -->
            <div class="col-8">
               <div class="row">
           <div class="col">
           <p class="item-quantity"><strong>Qty:</strong> 
                <span class="item-quantity"><strong>5</strong> </span>
          </p>
           </div>
           <div class="col">
           <button class="btn btn-sm btn-primary " id="increase">+</button>
            <button class="btn btn-sm btn-secondary" id="decrease">-</button>
           </div>
               </div>
              </p>
              <p class="item-price"><strong>Price:</strong> <span>$20.00</span></p>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Bootstrap 5 Card -->
    </div>

  </div>


 

</div>

<div class="container payment-container">
  <div class="row justify-content-between align-items-center">
    <!-- Total Price -->
    <div class="col-6 text-center">
  <p class="total-tems" style="font-size: 14px;"><strong>Items:</strong> <span class="totalItems">1000</span></p> 
  <p class="total-price" style="font-size: 14px;"><strong>Price:</strong> <span class="totalPrice">$1000.00</span></p>
</div>

    
    <!-- Make Payment Button -->
    <div class="col-6 text-center">
      <button id="makePayment" class="btn btn-success">
        Make Payment
      </button>
    </div>
  </div>
</div>
