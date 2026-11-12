<?php

namespace App\Contracts;

use App\Enums\Currency;

interface ExchangeRateProvider
{
    public function rate(Currency $from, Currency $to): float;
}
