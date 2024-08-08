<?php
class MicroservicesServiceProvider extends ServiceProvider{
    public function boot()
    {
         
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Facades 
        //$this->app->alias('Microservices',MicroservicesFacade::class);
    }
}