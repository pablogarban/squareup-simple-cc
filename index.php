<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>SquareUp - Simple CC integration</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    </head>
    <body>
		<div id="wrapper">
			<div id="container">
				<div id="welcome">
					<h1><span>SquareUp - Simple CC integration</h1>
				</div>
				<div id="form-container">
					<div id="sq-ccbox">
						<form id="nonce-form" novalidate action="process.php" method="post">
							<fieldset>
								<span class="label">Card Number</span>
								<div id="sq-card-number"></div>

								<div class="third">
									<span class="label">Expiration</span>
									<div id="sq-expiration-date"></div>
								</div>

								<div class="third">
									<span class="label">CVV</span>
									<div id="sq-cvv"></div>
								</div>

								<div class="third">
									<span class="label">Postal</span>
									<div id="sq-postal-code"></div>
								</div>
							</fieldset>

							<button id="sq-creditcard" class="button-credit-card" onclick="requestCardNonce(event)">Pay $1.00</button>
							<div id="error"></div>
							<input type="hidden" id="amount" name="amount" value="100">
							<input type="hidden" id="card-nonce" name="nonce">
						</form>
					</div> <!-- end #sq-ccbox -->

				</div> <!-- end #form-container -->


			</div>
		</div>
        <script type="text/javascript" src="https://js.squareup.com/v2/paymentform"></script>
		<script type="text/javascript" src="assets/js/script.js"></script>
		<script>
			document.addEventListener("DOMContentLoaded", function(event) {
				if (SqPaymentForm.isSupportedBrowser()) {
					paymentForm.build();
					paymentForm.recalculateSize();
				}
			});
		</script>
    </body>
</html>
