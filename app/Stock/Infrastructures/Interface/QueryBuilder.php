<?php
namespace App\Stock\Infrastructures\Interface;

interface QueryBuilder {
    public function toQuery(array $parameters);
    public function toInsert(array $parameters);
    public function toUpdate(array $parameters);
    public function toDelete(array $parameters);
}