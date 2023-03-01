<?php

namespace App\Providers\Financex;

use App\Repositories\Payment\PaymentEloquentRepository;
use App\Repositories\Payment\PaymentRepository;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PaymentRepository::class, PaymentEloquentRepository::class);
    }
}
