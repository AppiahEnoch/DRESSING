<div id="productContainer" class="container-fluid">
  <div class="row gap-5">
    <!-- Left side for displaying cloth images -->
    <div id="imageCard" class="col-md-6 product-images border">
    <div class="small-images">
        <img src="productimage/1.jpg" alt="Cloth Image 1" onclick="showImage('productimage/1.jpg')">
        <img src="productimage/2.jpg" alt="Cloth Image 2" onclick="showImage('productimage/2.jpg')">

        <!-- More images can be added -->
      </div>
      <div class="large-image">
        <img id="largeImage" src="productimage/1.jpg" alt="Cloth Image">
      </div>

    </div>

    <!-- Right side for displaying user preferences -->
    <div id="productDetails" class="col-md-5 user-preferences">
        <h3>PRODUCT NAME</h3>
        <section class="description-price">
        <h3>Price</h3>
        <p>$29.99</p>
      </section>
   

      <section class="color-options" id="color-options-section">
   
     <div class="form-group" id="color-form-group">
     <h3 class="" id="color-heading">Color</h3>
    <select class="form-select" id="colorSelect">
      <option selected>Choose Color</option>
      <option value="Red">Red</option>
      <option value="Blue">Blue</option>
      <option value="Green">Green</option>
      <option value="Yellow">Yellow</option>
    </select>
  </div>

  
</section>


      <!-- Size Options -->
      <section class="size-options">
 
  <div class="form-group">
  <h3>Size</h3>
    <select class="form-select" id="sizeSelect">
      <option selected>Choose Size</option>
      <option value="1-2years">1-2years</option>
      <option value="2-3years">2-3years</option> 
      <option value="3-4years">3-4years</option>  
      <option value="5-6years">5-6years</option> 
    </select>
  </div>
</section>



   

      <!-- Add to Cart Button -->
      <button class="btn btn-custom add-to-cart w-100">Add to Cart</button>


<section class="washing-instructions m-3">
    <!-- Card -->
    <div class="card">
        <!-- Card Header -->
        <div class="card-header">
            <h3>
                <a href="#collapseWashingInstructions" class="btn btn-link w-100 text-center" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseWashingInstructions">
                    View Washing Instructions
                </a>
            </h3>
        </div>
        
        <!-- Collapsible Card Body -->
        <div class="collapse w-100 " id="collapseWashingInstructions">
            <div class="card-body text-center">
                <!-- Washing instructions text -->
                <p>Machine wash cold, tumble dry low</p>
            </div>
        </div>
    </div>
</section>



<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" id="collapsibleCard">
                <div class="card-header" id="collapsibleCardHeader">
                    <h5>
                        <a href="#collapseContactForm" class="btn btn-link w-100" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseContactForm">
                            Message Us
                        </a>
                    </h5>
                </div>
                <div class="collapse" id="collapseContactForm">
                    <div class="card-body" id="collapsibleCardBody">
                        <form id="collapsibleContactForm" action="#" method="post">
                            <div class="mb-3" id="emailDiv">
                                <label for="collapsibleContactForm_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="collapsibleContactForm_email" name="collapsibleContactForm_email" required>
                            </div>
                            <div class="mb-3" id="messageDiv">
                                <label for="collapsibleContactForm_message" class="form-label">Message</label>
                                <textarea class="form-control" id="collapsibleContactForm_message" name="collapsibleContactForm_message" rows="3" required></textarea>
                            </div>
                            <div class="d-grid gap-2" id="sendButtonDiv">
                                <button type="submit" class="btn btn-primary btn-custom" id="sendButton">Send message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    </div>


  </div>
</div>
