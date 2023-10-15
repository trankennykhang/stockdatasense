<?php
namespace App\Stock\Infrastructures\Facades;

use Illuminate\Support\Facades\Facade;

class StockProvider extends Facade {
 
 /**
  * Get the registered name of the component.
  *
  * @return string
  */
 protected static function getFacadeAccessor() { return 'stockProvider'; }

}