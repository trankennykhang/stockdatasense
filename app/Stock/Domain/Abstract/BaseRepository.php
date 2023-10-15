<?php
namespace App\Stock\Domain\Abstract;

use App\Stock\Infrastructures\Interface\DatabaseConnector;

abstract class BaseRepository {

    public DatabaseConnector $conn = null;

    public function __construct(DatabaseConnector $conn) {
        $this->conn = $conn;
    }
}