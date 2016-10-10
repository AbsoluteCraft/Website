<?php

namespace App\Http\Controllers;

use App\Models\Shop\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PayPalController extends Controller {

	public function ipn(Request $request) {
		define("DEBUG", 0);
		define("USE_SANDBOX", 0);

		$raw_post_data = file_get_contents('php://input');
		$raw_post_array = explode('&', $raw_post_data);
		$myPost = [];
		foreach($raw_post_array as $keyval) {
			$keyval = explode('=', $keyval);
			if(count($keyval) == 2)
				$myPost[$keyval[0]] = urldecode($keyval[1]);
		}
		$get_magic_quotes_exists = false;
		$req = 'cmd=_notify-validate';
		if(function_exists('get_magic_quotes_gpc')) {
			$get_magic_quotes_exists = true;
		}
		foreach($myPost as $key => $value) {
			if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
				$value = urlencode(stripslashes($value));
			} else {
				$value = urlencode($value);
			}
			$req .= "&$key=$value";
		}

		if(USE_SANDBOX == true) {
			$paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
		} else {
			$paypal_url = "https://www.paypal.com/cgi-bin/webscr";
		}
		$ch = curl_init($paypal_url);
		if($ch == false) {
			return false;
		}

		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
		if(DEBUG == true) {
			curl_setopt($ch, CURLOPT_HEADER, 1);
			curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
		}

		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Connection: Close']);

		$res = curl_exec($ch);
		if(curl_errno($ch) != 0) {
			Log::warning("Can't connect to PayPal to validate IPN message: " . curl_error($ch));
			curl_close($ch);
			exit;
		} else {
			Log::info('HTTP request of validation request: ' . curl_getinfo($ch, CURLINFO_HEADER_OUT) . ' for IPN payload: ' . $req);
			Log::info('HTTP response of validation request: ' . $res);

			curl_close($ch);
		}

		$tokens = explode("\r\n\r\n", trim($res));
		$res = trim(end($tokens));
		if(strcmp($res, "VERIFIED") == 0) {
			Log::info("Verified IPN: " . $req);
			if($request->get('payment_status') == 'Complete' || $request->get('payment_status') == 'Processed') {
				Donation::where('id', '=', $_POST['custom'])
					->update(['approved' => 1]);
			}
		} else if(strcmp($res, "INVALID") == 0) {
			Log::warning('Invalid IPN: ' . $req);
		}
	}

}