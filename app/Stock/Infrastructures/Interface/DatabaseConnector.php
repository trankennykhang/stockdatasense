<?php
namespace App\Stock\Infrastructures\Interface;

interface DatabaseConnector {
    public function query(string $queryString);
    public function insert(string $queryString);
    public function update(string $queryString);
    public function delete(string $queryString);
    public function getQueryBuilder();
}