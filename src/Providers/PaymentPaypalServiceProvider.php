<?php namespace Sanatorium\Orderspaymentpaypal\Providers;

use Cartalyst\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class PaymentPaypalServiceProvider extends ServiceProvider {

	/**
	 * {@inheritDoc}
	 */
	public function boot()
	{
		// Register the default payment service
		$this->app['sanatorium.orders.payment.services']->registerService(
			'\Sanatorium\Orderspaymentpaypal\Controllers\Services\PaypalPaymentService'
		);
	}

	/**
	 * {@inheritDoc}
	 */
	public function register()
	{
		// Prepare resources
        $this->prepareResources();
	}

	/**
     * Prepare the package resources.
     *
     * @return void
     */
    protected function prepareResources()
    {
        $config = realpath(__DIR__.'/../../config/config.php');

        $this->mergeConfigFrom($config, 'sanatorium-orderspaymentpaypal');

        $this->publishes([
            $config => config_path('sanatorium-orderspaymentpaypal.php'),
        ], 'config');
    }

}
