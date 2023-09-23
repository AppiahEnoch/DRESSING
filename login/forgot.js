$(document).ready(function() {
    $("#form3").submit(function(e) {
        e.preventDefault();
        const email = $("#form3_email").val();

        $.ajax({
            type: "post",
            cache: false,
            url: "send_email.php",
            data: { form3_email: email },
            dataType: "text",
            success: function (data, status) {
                alert(data)
                if (data.success) {
                    showToast("aeToastS", "Success", "Email sent successfully.", "20");
                } else {
                    showToast("aeToastE", "Error", data.error, "20");
                }
            },
            error: function (xhr, status, error) {
                showToast("aeToastE", "Error", "An error occurred.", "20");
                console.error(error);
            }
        });
    });
});
