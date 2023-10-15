<?php
namespace App\Stock\Domain\Mapper;

use App\Stock\Domain\Entity\Price;

class PriceMapper extends BaseMapper {
    public static function toPriceList(array $arr) : array {
        return self::toArrayEntity($arr, new Price());
    }
    public static function toPrice(array $arr) {
        return self::toEntity($arr, new Price());
    }
}