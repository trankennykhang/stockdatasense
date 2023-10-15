<?php
namespace App\Stock\Domain\Repositories;

use App\Stock\Domain\Abstract\BaseRepository;
use App\Stock\Domain\Entity\Company;
use App\Stock\Domain\Mapper\CompanyMapper;

class CompanyRepository extends BaseRepository {
    
    function getCompanies(int $topList = 0) : array {
        return CompanyMapper::toCompanyList(
            $this->conn->query(
                $this->conn->getQueryBuilder()->toQuery(
                    Company::select(['TopList' => $topList])
                )
            )
        );
    }
    function getCompanyBySymbol(string $symbol) : Company {
        return CompanyMapper::toCompany(
            $this->conn->query(
                $this->conn->getQueryBuilder->toQuery(
                    Company::select(['Symbol' => $symbol])
                )
            )
        );
    }
}