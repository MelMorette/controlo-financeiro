<?php

namespace App\Services;

use App\Contracts\ExchangeRateProvider;
use App\Enums\Currency;
use Illuminate\Support\Facades\Http;

class FrankfurterExchangeRateProvider implements ExchangeRateProvider
{
    public function rate(Currency $from, Currency $to): float
    {
        if ($from === $to) {
            return 1.0;
        }

        $response = Http::baseUrl('https://api.frankfurter.dev/v2/')
            ->timeout(5)
            ->retry(2, 500)
            ->get('rate/'.strtolower($from->value).'/'.strtolower($to->value))
            ->throw();

        return (float) $response->json('rate');
    }
}
