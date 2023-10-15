<?php
namespace App\Stock\Domain\Entity;

use App\Stock\Domain\Abstract\BaseEntity;

class Company extends BaseEntity {

    public function setTopList(array $rs, int $value) {
        $rs = $this->setOrder($rs, 'market_value', 'DESC');
        $rs = $this->setLimit($rs, $value);
        return $rs;
    }
    public function setSymbol(array $rs, string $symbol) {
        $rs = $this->setWhere($rs, 'symbol', '=', 'string', $symbol);

    }
}