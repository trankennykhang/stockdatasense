<?php
namespace App\Stock\Domain\Mapper;

use App\Stock\Domain\Entity\Company;

class CompanyMapper {
    public static function toCompanyList(array $array) : array {
        $rs = [];
        foreach ($array as $arr) {
            $company = new Company($arr);
            $rs[] = $company;
        }
        return $rs;
    }
    public static function toCompany(array $arr) {
        $company = new Company($arr);

        return $company;
    }
}