<?php
namespace App\Stock\Infrastructures\Helper;

use App\Stock\Infrastructures\Providers\YFinance\YFinance;

class StockProviderHelper {
 
    public static function getCurrentProvider()
    {
        // Check configuration
        // load configure
        return new YFinance();
    }
    public function setTemporaryProviderForNextCall() {

    }
    public function setTemporaryProvider() {

    }
 
}