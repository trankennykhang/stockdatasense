<?php
namespace App\Stock\Domain\Services;

use App\Stock\Infrastructures\Interface\DatabaseConnector;
use App\Stock\Infrastructures\Interface\StockProvider;
use App\Stock\Domain\Mapper\PriceMapper;
use App\Stock\Domain\Repositories\CompanyRepository;
use App\Stock\Domain\Repositories\PriceRepository;

class ImportService {

    public StockProvider $provider;
    public DatabaseConnector $conn;

    public function __construct(DatabaseConnector $conn, StockProvider $provider) {
        $this->conn = $conn;
        $this->provider = $provider;
    }
    public function importPrice(string $symbol, string $type) {
        $companyRepo = new CompanyRepository($this->conn);
        $priceRepo = new PriceRepository($this->conn);
        $company = $companyRepo->getCompanyBySymbol($symbol);
        
        $prices = PriceMapper::toPriceList(
            $this->provider->getPrices($company->symbol, $type)
        );
        $priceRepo->insertPrices($prices);
    }
    
    public function importPrices(int $limit, string $type) {
        $companyRepo = new CompanyRepository($this->conn);
        $priceRepo = new PriceRepository($this->conn);
        $companies = $companyRepo->getCompanies($limit);
        
        foreach ($companies as $company) {
            $prices = PriceMapper::toPriceList(
                $this->provider->getPrices($company->symbol, $type)
            );
            $priceRepo->insertPrices($prices);
        }
    }
}