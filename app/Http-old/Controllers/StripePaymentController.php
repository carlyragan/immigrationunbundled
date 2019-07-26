<?php

namespace App\Http\Controllers;
use App\User;
use App\PaymentHistory;
use Auth;
use Illuminate\Http\Request;
use Session;
use Stripe\Charge;
use Stripe\Stripe;

class StripePaymentController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function stripe() {
		return view('temp1.immigrant.payment.payment');
	}

	/**
	 * success response method.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function stripePost(Request $request) {

		$user = Auth::user();
		Stripe::setApiKey(env('STRIPE_SECRET'));
		Charge::create([
			"amount" => 0.50 * 100,
			"currency" => "usd",
			"source" => $request->stripeToken,
			"description" => "Payment from email " . $user->email,
		]);

		$payment = new PaymentHistory();
		$payment->user_id = $user->id;
		$payment->amount = 0.01;
		$payment->stripe_token = $request->stripeToken;
		$payment->description = 'Payment for immigration from email = ' . $user->email;
		$payment->currency = 'USD';
		$payment->save();
		Session::flash('success', 'Payment successful!');
		return redirect()->route('immigrant.success');
	}

	public function success() {

		return view('temp1.immigrant.payment.success');
	}
}
