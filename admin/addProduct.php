<div id="wrapper1" class="container-fluid d-none">
<div id="addProduct" class="container justify-content-center align-items-center mt-2">
  <div class="row justify-content-center align-items-center">
  <form class="row justify-content-center align-items-center" id="addProductForm" enctype="multipart/form-data">
<div class="col-12 col-sm-10 col-md-8 col-lg-6">
      <div class="custom-form justify-content-center align-items-center">

        <!-- Image Upload -->
        <div class="mb-3 justify-content-center align-items-center">
          <label for="imageUpload" class="form-label">Add image of Product</label>
          <div class="input-group">
            <span class="input-group-text" id="inputGroupFileAddon01">
              <i class="fas fa-file-image" aria-hidden="true"></i>
            </span>
            <input required type="file" class="form-control" id="imageUpload" aria-describedby="inputGroupFileAddon01">
          </div>
        </div>
        <!-- Image Grid Display -->
        <div class="mb-3">
          <div class="row" id="imageGrid">
            <!-- Images will be displayed here as users add them -->
          </div>
        </div>

        <button id="addImage" type="button" class="btn btn-success w-100">Add image</button>



        
      </div>
    </div>

    <div id="price" class="col-12 col-sm-10 col-md-8 col-lg-6">
    <div class="custom-form justify-content-center align-items-center">

<!-- Accepted Currencies -->
<div class="mb-3">
    <label for="acceptedCurrencies" class="form-label">Accepted Currencies</label>
    <select class="form-select" id="acceptedCurrencies" name="acceptedCurrencies">
        <option >Select a currency</option>
        <option selected value="usd">USD - US Dollar</option>
        <option value="ghs">GHS - Ghana Cedi</option> 
        <option value="eur">EUR - Euro</option>
        <option value="gbp">GBP - British Pound</option>
        <option value="jpy">JPY - Japanese Yen</option>
        <option value="aud">AUD - Australian Dollar</option>
        <option value="cad">CAD - Canadian Dollar</option>
        <option value="chf">CHF - Swiss Franc</option>
        <option value="cny">CNY - Chinese Yuan</option>
        <option value="inr">INR - Indian Rupee</option>
      <!-- Added Ghana Cedi -->
        <!-- Add more currencies as needed -->
    </select>
</div>







        
        <!-- Product Name -->
        <div class="mb-3 justify-content-center align-items-center">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name="productName" required>
        </div>

        <div class="mb-3">
            <label for="productCategory" class="form-label">Product Category</label>
            <select class="form-select" id="productCategory" name="productCategory">
           
                <!-- Add more categories as needed -->
            </select>
        </div>
        
        <!-- Price -->
        <div class="mb-3">
            <label for="productPrice" class="form-label">Price</label>
            <input type="number" class="form-control" id="productPrice" name="productPrice" step="0.01" required>
        </div>
        
        <!-- Size -->
        <div class="mb-3">
            <label for="productSize" class="form-label">Size</label>
            <input type="text" class="form-control" id="productSize" name="productSize" placeholder="e.g., S, M, L, XL" required>
        </div>
        
        <!-- Color -->
        <div class="mb-3">
            <label for="productColor" class="form-label">Color</label>
            <input type="text" class="form-control" id="productColor" name="productColor" placeholder="e.g., Red, Blue, Green" required>
        </div>

        <!-- Add Product Button -->
        <button type="submit" class="btn btn-success w-100">Add Product</button>
    </div>
</div>

</form>


  </div>
</div>
</div>



