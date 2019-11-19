<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>SquareUp - Simple CC integration</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    </head>
    <body>
	<?php
	if(isset($_POST['nonce'])) {
		require_once('vendor/autoload.php');
		
		$access_token = '123456'; //ACCESS TOKEN
		
		# setup authorization
		\SquareConnect\Configuration::getDefaultConfiguration()->setAccessToken($access_token);
		
		# create an instance of the Transaction API class
		$transactions_api = new \SquareConnect\Api\TransactionsApi();
		$location_id = '123456'; //LOCATION ID
		$nonce = $_POST['nonce'];

		$request_body = array (
			"card_nonce" => $nonce,
			"amount_money" => array (
				"amount" => (int) $_POST['amount'],
				"currency" => "USD"
			),
			"idempotency_key" => uniqid()
		);

		try {
			$result = $transactions_api->charge($location_id,  $request_body);
			if($result['transaction']['id']){
				$message = "Thank you for your purchase!";
				$details = "Transation ID: ".$result['transaction']['id'];
			} else {
				$message = "Error!";
				$details = "Sorry, something went wrong";
			}
		} catch (\SquareConnect\ApiException $e) {
			$message = "Error!";
			$details = "Sorry, something went wrong";
			var_dump($e->getResponseBody());
		}
	?>
		
		<div id="wrapper">
			<div id="container">
				<div id="welcome">
					<h1><span>SquareUp - Simple CC integration</h1>
				</div>
				<h2><?php echo $message;?></h2>
				<h3><?php echo $details;?></h3>
			</div>
		</div>
		
	<?php
	}
	?>
	</body>
</html>
