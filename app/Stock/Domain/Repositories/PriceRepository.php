<?php
namespace App\Stock\Domain\Repositories;

use App\Stock\Domain\Entity\Price;
use App\Stock\Infrastructures\Interface\DatabaseConnector;
use App\Stock\Domain\Mapper\PriceMapper;
use DateTime;

class PriceRepository {
    public DatabaseConnector $conn = null;

    public function __construct(DatabaseConnector $conn) {
        $this->conn = $conn;
    }
    function getPrices(string $symbol, DateTime $start, DateTime $end = '') : array {
        return PriceMapper::toPriceList(
            $this->conn->query(
                $this->conn->getQueryBuilder()->toQuery(
                    Price::select(['Symbol' => $symbol])
                )
            )
        );
    }
    function insertPrices(array $prices) {
        foreach ($prices as $price) {
            $price->save();
        }
    }
}