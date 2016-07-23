<?php namespace Sanatorium\Orderspaymentpaypal\Controllers\Services;

use Log;
use Product;
use Cart;
use Sanatorium\Localization\Models\Language;

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

}