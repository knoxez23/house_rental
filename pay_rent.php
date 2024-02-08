
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
                            <input type="number" class="form-control" id="invoice" name="invoice" placeholder="Enter Invoice No">
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount">
                        </div>
                        <div class="form-group">
                            <label for="mpesa_no">Mpesa Number</label>
                            <input type="number" class="form-control" id="mpesa_no" name="mpesa_no" placeholder="Enter Mpesa Number">
                            <small id="mpesaHelp" class="form-text text-muted">Please enter a 12-digit Mpesa number.</small>
                        </div>
                        <button type="button" class="btn btn-primary" id="checkout-submit-dets" >Pay Now</button>
                        <button type="button" class="btn btn-secondary" id="confirm-paid" style="display: none;">I Have Already Paid</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="mpesa_pay.js"></script>
<!-- <script>
    $(document).ready(function () {
    $("#mpesa_no").on("input", function () {
        if ($(this).val().length == 12) {
            $("#checkout-submit-dets").attr("disabled", false);
        } else {
            $("#checkout-submit-dets").attr("disabled", true);
        }
    });

    $("#checkout-submit-dets").on("click", function () {
        const mpesaNo = getElementById("mpesa_no");
        const tenantName = getElementById("tenant_name");
        const amount = getElementById("amount");
        const invoice = getElementById("invoice");

        // Send Mpesa number and amount to stkpush.php for processing
        $.ajax({
            url: "./daraja-api/stkpush.php",
            type: "POST",
            data: {
                mpesaNo: mpesaNo,
                amount: amount,
            },
            // success: function (data) {
            //     // Upon success, save payment details to the database
            //     $.ajax({
            //         url: "ajax.php",
            //         type: "POST",
            //         data: {
            //             action: "save_mpesa_payment",
            //             tenantName: tenantName,
            //             invoice: invoice,
            //             amount: amount,
            //         },
            //         success: function (response) {
            //             // Handle success response here if needed
            //             console.log("Payment details saved successfully.");
            //         },
            //         error: function (xhr, status, error) {
            //             console.error(xhr.responseText);
            //         }
            //     });
            // },
            // error: function (xhr, status, error) {
            //     console.error(xhr.responseText);
            // }
        });
    });
});

</script> -->
