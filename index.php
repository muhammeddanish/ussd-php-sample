<?php

$ussdRequest = json_decode(@file_get_contents('php://input'));
$ussdResponse = new stdclass;

if ($ussdRequest != NULL)
switch ($ussdRequest->Type) {
	case 'Initiation':
		$ussdResponse->Message =
			"Welcome to Freebie Service.\n" .
			"1. Free Food\n2. Free Drink\n3. Free Airtime";
		$ussdResponse->Type = 'Response';
		break;
		
	case 'Response':
		switch ($ussdRequest->Sequence) {
			
			// Menu selection
			case 2:
				$items = array('1' => 'food', '2' => 'drink', '3' => 'airtime');
				if (isset($items[$ussdRequest->Message])) {
					$ussdResponse->Message = 'Are you sure you want free '
						. $items[$ussdRequest->Message] . "?\n1. Yes\n2. No";
					$ussdResponse->Type = 'Response';
					$ussdResponse->ClientState = $items[$ussdRequest->Message];
				} else {
					$ussdResponse->Message = 'Invalid option.';
					$ussdResponse->Type = 'Release';
				}
				break;
			
			// Order confirmation
			case 3:
				switch ($ussdRequest->Message) {
					case '1':
						$ussdResponse->Message =
							'Thank you. You will receive your free '
							. $ussdRequest->ClientState . ' shortly.';
						break;
					case '2':
						$ussdResponse->Message = 'Order cancelled.';
						break;
					default:
						$ussdResponse->Message = 'Invalid selection.';
						break;
				}
				$ussdResponse->Type = "Release";
				break;
			
			// Unexpected request
			default:
				$ussdResponse->Message = 'Unexpected request.';
				$ussdResponse->Type = 'Release';
				break;
		}
		break;
		
	// Session cleanup
	default:
		$ussdResponse->Message = 'Duh.';
		$ussdResponse->Type = 'Release';
		break;
}

// Request data could not be parsed.
else {
	$ussdResponse->Message = 'Invalid USSD request.';
	$ussdResponse->Type = 'Release';
}

header('Content-type: application/json; charset=utf-8');
echo json_encode($ussdResponse);
