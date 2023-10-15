<?php
namespace App\Stock\Domain\Mapper;

use App\Stock\Domain\Abstract\BaseEntity;

abstract class BaseMapper {

    public static function toArrayEntity(array $arr, BaseEntity $entity) : array {
        $rs = [];
        foreach ($arr as $ar) {
            $new_entity = $entity->newInstance($ar);
            $rs[] = $new_entity;
        }
        return $rs;
    }
    public static function toEntity(array $arr, BaseEntity $entity) {
        return $entity->newInstance($arr);
    }
}