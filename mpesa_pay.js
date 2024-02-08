$(document).ready(function () {
	$("#mpesa_no").on("input", function () {
		if ($(this).val().length == 12) {
			$("#checkout-submit-dets").attr("disabled", false);
		} else {
			$("#checkout-submit-dets").attr("disabled", true);
		}
	});

	$("#checkout-submit-dets").on("click", function () {
		const mpesaNo = document.getElementById("mpesa_no").value;
        const amount = document.getElementById("amount").value;

		if (mpesaNo.length != 12) {
			$("#mpesa_no").css("border", "1px solid red");
			$("#mpesa_no").css("box-shadow", "0 0 5px red");
			$(".valid-no-error").css("display", "block");
		} else {
			$("#checkout-submit-dets").attr("disabled", true);
			$("#mpesa_no").css("border", "1px solid #999");
			$("#mpesa_no").css("box-shadow", "none");
			$(".valid-no-error").css("display", "none");

			$.ajax({
				url: "./daraja-api/stkpush.php",
				type: "POST",
				context: document.body,
				data: {
					amount: amount,
					number: mpesaNo,
				},
				success: function (data) {
					const checkoutRequestID =
						JSON.parse(data).checkoutRequestID;
					const responseCode = JSON.parse(data).responseCode;
					$("#confirm-paid").css("display", "block");
					$("#confirm-paid").on("click", function () {
						window.location.href =
							"./daraja-api/confirm.php?checkoutRequestID=" +
							checkoutRequestID +
							"&responseCode=" +
							responseCode +
							"&prodId=" +
							productId +
							"&qty=" +
							productQty +
							"&userId=" +
							userCheckout;
					});
				},
			});
		}
	});
});

transactionClose.addEventListener("click", () => {
	transaction.style.display = "none";
});