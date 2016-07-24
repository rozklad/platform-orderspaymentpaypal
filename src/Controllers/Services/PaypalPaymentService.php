<?php namespace Sanatorium\Orderspaymentpaypal\Controllers\Services;

use Log;
use Product;
use Cart;
use Sanatorium\Localization\Models\Language;

use PayPal\Rest\ApiContext;
use PayPal\Api\Amount;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class PaypalPaymentService {

	public $name;
	public $description;

	protected $client;

	public function __construct()
	{
		$this->name = trans('sanatorium/orderspaymentpaypal::payment_services.paypal.name');
		$this->description = trans('sanatorium/orderspaymentpaypal::payment_services.paypal.description');
	}

	public function process($order)
	{

	}

	public function reverse($order, $args = [])
	{

	}

	public function refund($order, $args = [])
	{

	}

	public function close($order, $args = [])
	{

	}

	public function status($order, $args = [])
	{

	}

	public function isPaymentOpened($order)
	{

	}

	public function status_human_readable($order, $args = [])
	{

	}

	public function isSuccess($order)
	{

	}

	public static function test()
    {
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AYSq3RDGsmBLJE-otTkBtM-jBRd1TCQwFf9RGfwddNXWz0uFU9ztymylOhRS',     // ClientID
                'EGnHDxD_qRPdaLdZz8iCr8N7_MzF-YHPTkjs6NKYQvQSBngp4PTTVWkPZRbL'      // ClientSecret
            )
        );
        $apiContext->setConfig([
            'service.EndPoint' => "https://test-api.sandbox.paypal.com",
            'cache.enabled' => false
        ]);

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        $amount = new Amount();
        $amount->setCurrency("USD")
                ->setTotal(20);
        $transaction = new Transaction();
        $transaction->setAmount($amount);

        //$baseUrl = getBaseUrl();
        $baseUrl = 'http://localhost:8000';

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("$baseUrl/ExecutePayment.php?success=true")
            ->setCancelUrl("$baseUrl/ExecutePayment.php?success=false");
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        $request = clone $payment;
        $curl_info = curl_version();
        try {
            $payment->create($apiContext);
        } catch (Exception $ex) {
            dd($ex);
            exit(1);
        }
        return $payment;
    }

}