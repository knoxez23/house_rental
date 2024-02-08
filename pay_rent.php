<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Rent</title>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">MPESA</h3>
                </div>
                <div class="card-body">
                    <form id="payment-form">
                        <div class="form-group">
                            <label for="tenant_name">Tenant Name</label>
                            <input type="text" class="form-control" id="tenant_name" placeholder="Enter Tenant Name">
                        </div>
                        <div class="form-group">
                            <label for="invoice">Invoice No</label>
                            <input type="number" class="form-control" id="invoice" placeholder="Enter Invoice No">
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" id="amount" placeholder="Enter Amount">
                        </div>
                        <div class="form-group">
                            <label for="mpesa_no">Mpesa Number</label>
                            <input type="number" class="form-control" id="mpesa_no" placeholder="Enter Mpesa Number">
                            <small id="mpesaHelp" class="form-text text-muted">Please enter a 12-digit Mpesa number.</small>
                        </div>
                        <button type="button" class="btn btn-primary" id="checkout-submit-dets" disabled>Pay Now</button>
                        <button type="button" class="btn btn-secondary" id="confirm-paid" style="display: none;">I Have Already Paid</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $("#mpesa_no").on("input", function () {
            if ($(this).val().length == 12) {
                $("#checkout-submit-dets").attr("disabled", false);
            } else {
                $("#checkout-submit-dets").attr("disabled", true);
            }
        });

        $("#checkout-submit-dets").on("click", function () {
            const mpesaNo = $("#mpesa_no").val();
            const tenantName = $("#tenant_name").val();
            const amount = $("#amount").val();
            const invoice = $("#invoice").val();

            // Simulated successful payment process
            // Here you would implement your actual payment logic
            // For now, I'm just simulating success with a setTimeout
            setTimeout(function () {
                $("#confirm-paid").show();
            }, 1000);

            // Upon successful payment, save payment details to the database
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: "save_payment",
                    tenant_id: tenantName, // You may need to adjust this to send the correct tenant ID
                    invoice: invoice,
                    amount: amount
                    // Add other payment details as needed
                },
                success: function (response) {
                    // Handle success response here if needed
                    console.log("Payment details saved successfully.");
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
</body>
</html>
