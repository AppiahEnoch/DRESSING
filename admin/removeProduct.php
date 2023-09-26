<div id="wrapper2" class="container-fluid d-none">

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <input type="text" id="searchBox" name="searchBox" class="form-control" placeholder="Search...">
            <div id="suggestionList" class="list-group"></div>
        </div>
    </div>
</div>






<div id="addProduct" class="container justify-content-center align-items-center mt-2">
  <div class="row justify-content-center align-items-center">
  <form class="row justify-content-center align-items-center" id="addProductForm" enctype="multipart/form-data">

    <div id="update_addProduct" class="container justify-content-center align-items-center mt-2">
  <div class="row justify-content-center align-items-center">
    
  <div class="col-12 col-sm-10 col-md-8 col-lg-6">
      <div class="custom-form justify-content-center align-items-center">

        <!-- Image Upload -->
        <div class="mb-3 justify-content-center align-items-center">
          <label for="imageUpload" class="form-label">Edit of Product</label>
          <div class="input-group">
          <input type="file" id="hiddenFileInputForInsert" style="display: none;">

          </div>
        </div>
        <!-- Image Grid Display -->
        <div class="mb-3">
          <div class="row" id="edit_imageGrid">
            <!-- Images will be displayed here as users add them -->
          </div>
        </div>

        <button id="addNewImage" type="button" class="btn btn-success w-100">Add image</button>



        
      </div>
    </div>
  
  
  <div class="col-12 col-sm-10 col-md-8 col-lg-6">
      <div class="custom-form justify-content-center align-items-center">
        <!-- Accepted Currencies -->
        <div class="mb-3">
          <label for="update_acceptedCurrencies" class="form-label">Accepted Currencies</label>
          <select class="form-select" id="update_acceptedCurrencies" name="update_acceptedCurrencies">
            <option>Select a currency</option>
            <option selected value="usd">USD - US Dollar</option>
            <option value="ghs">GHS - Ghana Cedi</option> 
            <!-- ... Other options ... -->
          </select>
        </div>

        <!-- Product Name -->
        <div class="mb-3 justify-content-center align-items-center">
          <label for="update_productName" class="form-label">Product Name</label>
          <input type="text" class="form-control" id="update_productName" name="update_productName" required>
        </div>

        <!-- Product Category -->
        <div class="mb-3">
          <label for="update_productCategory" class="form-label">Product Category</label>
          <select class="form-select" id="update_productCategory" name="update_productCategory">
            <option selected>Select a category</option>
          
          </select>
        </div>
        
        <!-- Price -->
        <div class="mb-3">
          <label for="update_productPrice" class="form-label">Price</label>
          <input type="number" class="form-control" id="update_productPrice" name="update_productPrice" step="0.01" required>
        </div>

        <!-- Size -->
        <div class="mb-3">
          <label for="update_productSize" class="form-label">Size</label>
          <input type="text" class="form-control" id="update_productSize" name="update_productSize" placeholder="e.g., S, M, L, XL" required>
        </div>

        <!-- Color -->
        <div class="mb-3">
          <label for="update_productColor" class="form-label">Color</label>
          <input type="text" class="form-control" id="update_productColor" name="update_productColor" placeholder="e.g., Red, Blue, Green" required>
        </div>

        <!-- Add Product Button -->
      <div class="row">
        <div class="col-6">
        <button id="upadteProduct" type="submit" class="btn btn-success w-100">Update Product</button>
     
        </div>
        <div class="col-6">
        <button id="deleteProduct" type="submit" class="btn btn-danger  w-100">Delete Product</button>
     
        </div>
      </div>
      </div>
    </div>


  </div>
</div>

</form>


  </div>
</div>

</div>



