<?php
namespace App\Stock\Infrastructures\Databases\Mysql;

class MysqlMapper {
    public static function toArray($dataset) {
        $rs = [];
        foreach ($dataset as $data) {
            $rs[] = (array)$data;
        }
        return $rs;
    }
}