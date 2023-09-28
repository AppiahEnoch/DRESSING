$(document).ready(function() {
 

    $("#addImage").click(function() {
       $("#imageUpload").click();
    })

    let formData = new FormData();

    $('#imageUpload').change(function() {
        const files = this.files;
        for(let i = 0; i < files.length; i++) {
            const file = files[i];
            formData.append("files[]", file, file.name);
            const reader = new FileReader();
            reader.onload = function(e) {
                const imageElement = `
                    <div class="col-3 position-relative" data-filename="${file.name}">
                        <img src="${e.target.result}" alt="Uploaded Image" class="img-thumbnail">
                        <i class="fas fa-times-circle position-absolute top-0 end-0 text-danger cursor-pointer close-icon1"></i>
                    </div>`;
                $('#imageGrid').append(imageElement);
            };
            reader.readAsDataURL(file);
        }
    });
    
    $('#imageGrid').on('click', '.close-icon1', function() {
        const parentDiv = $(this).closest('.col-3');
        const fileName = parentDiv.attr('data-filename');
        parentDiv.remove();
        let filesCount = 0;
    
        if (formData.has("files[]")) {
            const filesArray = formData.getAll("files[]");
            formData.delete("files[]");
            filesArray.forEach((file, index) => {
                if(file.name !== fileName) {
                    formData.append("files[]", file);
                    filesCount++;
                }
            });
        }
    
        if (filesCount === 0) {
            $('#imageUpload').val(null);
        }
    });
    


    $('#addProductForm').submit(function(e) {
        e.preventDefault();

        aeLoading()


        if($('#acceptedCurrencies').val() === 'Select a currency' || $('#acceptedCurrencies').val() === null) {
            showToast("aeToastE", "Currency Missing", "Please select an accepted currency", "20");
            return;
        }

        if($('#productCategory').val() === 'Select a category' || $('#productCategory').val() === null) {
            showToast("aeToastE", "Category Missing", "Please select a product category", "20");
            return;
        }

        formData.append('productName', $('#productName').val());
        formData.append('productCategory', $('#productCategory').val());
        formData.append('productPrice', $('#productPrice').val());
        formData.append('productSize', $('#productSize').val());
        formData.append('productColor', $('#productColor').val());
        formData.append('acceptedCurrencies', $('#acceptedCurrencies').val());

        $.ajax({
            type: "post",
            url: "insertProduct.php",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(data, status) {
           // alert(data)
           aeLoading()
                if(data.status === "success") {
                    showToastR("aeToastR", "Upload Successful", "Product added successfully", "20");
                } else if(data.status === "error") {
                    if(data.message === "Product already exists with the same name, use a different name.") {
                        showToast("aeToastE", "Upload Failed", "Product already exists with the same name, use a different name.", "20");
                    } else {
                        showToast("aeToastE", "Upload Failed", data.message, "20");
                    }
                }
            },
            error: function(xhr, status, error) {
                showToast("aeToastE", "Upload Failed", "Could not upload your files", "20");
                console.error(error);
                aeLoading()
            }
        });
        
    });
});

