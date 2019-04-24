<?php

namespace Artisaninweb\SoapWrapper;

use \Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
  /**
   * Bootstrap the application events.
   *
   * @return void
   */
  public function boot()
  {
    // Nothing here
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->soapWrapper = new SoapWrapper();

    if (is_array($this->app['config']['soapwrapper'])) {
      $this->soapWrapper->addByArray($this->app['config']['soapwrapper']);
    }
    $soapWrapper = $this->soapWrapper;

    $this->app->singleton(SoapWrapper::class, function () use ($soapWrapper) {
      return $this->soapWrapper;
    });
  }
}
