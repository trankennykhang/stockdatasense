<?php
namespace App\Stock\Infrastructures\Databases\Mysql;

use App\Stock\Infrastructures\Interface\DatabaseConnector;
use Illuminate\Support\Facades\DB;

class MysqlConnector implements DatabaseConnector {

    public MysqlQueryBuilder $builder;

    public function query(string $queryString) {
        return MysqlMapper::toArray(DB::select($queryString));
    }

    public function insert(string $queryString) {
        return MysqlMapper::toArray(DB::select($queryString));
    }

    public function update(string $queryString) {
        return MysqlMapper::toArray(DB::select($queryString));
    }

    public function delete(string $queryString) {
        return MysqlMapper::toArray(DB::select($queryString));
    }
    
    public function getQueryBuilder() {
        if ($this->builder == null)
            $this->builder = new MysqlQueryBuilder();
        return $this->builder;
    }
}