<?php
namespace App\Stock\Infrastructures\Providers\YFinance;

use App\Stock\Infrastructures\Interface\StockProvider;

class YFinance implements StockProvider {


    public function getPrices(string $symbol, string $type) : array {
        $prices = [];

        return $prices;
    }
}