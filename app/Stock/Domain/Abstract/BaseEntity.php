<?php
namespace App\Stock\Domain\Abstract;

use App\Stock\Infrastructures\Abstract\BaseModel;
use ReflectionClass;

abstract class BaseEntity extends BaseModel {

    public function __construct(Array $arr = []) {
        foreach ($arr as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
    public function setTableName($rs = []) {
        if (property_exists($this, 'table')) {
            $rs['table'] = $this->{'table'};
        } else {
            $rs['table'] = get_class($this);
        }
        return $rs;
    }

    public static function select(array $params) {

        // set table name;
        $rs = self::setTableName();
        
        foreach ($params as $name => $value) {
            if (method_exists(__CLASS__, "set".$name)) {
                $rs = self::{'set'.$name}($rs, $value);
            }
        }
        return $rs;
    }
    public static function insert(array $params) {

        // set table name;
        $rs = self::setTableName();
        
        foreach ($params as $name => $value) {
            if (method_exists(__CLASS__, "set".$name)) {
                $rs = self::{'set'.$name}($rs, $value);
            }
        }
        return $rs;
    }
    public function setOrder(array $rs, string $field, string $type) {
        return $rs;
    }
    public function setLimit(array $rs, int $limit) {
        return $rs;
    }
    public function setWhere(array $rs, string $field, string $operator, string $type, string $value) {
        if ($type == 'string')
            $type = '\'';
        else $type = '';

        $rs['where'] = $field . $operator . $type . $value . $type;
        
        return $rs;
    }
    public function newInstance(array $arr) {
        //return new ReflectionClass(get_class($this))($arr);
        return new Company();
    }
}