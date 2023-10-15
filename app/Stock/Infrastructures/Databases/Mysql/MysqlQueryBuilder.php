<?php
namespace App\Stock\Infrastructures\Databases\Mysql;

use App\Stock\Infrastructures\Interface\QueryBuilder;

class MysqlQueryBuilder implements QueryBuilder {
    
    public function toQuery(array $parameters) : mixed {
        return 'SELECT * FROM '.
            $parameters['table'];

    }
    public function toInsert(array $parameters) : mixed {

    }
    public function toUpdate(array $parameters) : mixed {
        
    }
    public function toDelete(array $parameters) : mixed {
        
    }
}