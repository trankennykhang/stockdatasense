<?php
namespace App\Stock\Infrastructures\Interface;

interface StockProvider {

    public function getPrices(string $symbol, string $type) : array;
}