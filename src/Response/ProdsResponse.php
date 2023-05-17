<?php

namespace PriceInfo\Shop\Api\Response;

use PriceInfo\Shop\Api\Prod;

class ProdsResponse extends AbstractResponse {

    private $prods = [];
    private $withAutoLastId = false;
    private $lastId = null;

    public function addProd(Prod $prod) {
        $this->prods[] = $prod;
        return $this;
    }

    public function addProds(iterable $prods) {
        foreach ($prods as $prod) {
            $this->addProd($prod);
        }
        return $this;
    }

    public function withAutoLastId($withAutoLastId = true) {
        $this->withAutoLastId = $withAutoLastId;
        return $this;
    }

    public function withLastId($lastId) {
        $this->lastId = $lastId;
        return $this;
    }

    public function createJson() {
        $array = [
            "prods" => $this->prods,
        ];

        $lastId = $this->lastId;
        $putLastId = $lastId !== null || $this->withAutoLastId;

        if ($this->withAutoLastId) {
            $ids = array_map(function ($prod) {
                return $prod->getSku();
            }, $this->prods);

            rsort($ids);

            if (array_key_exists(0, $ids)) {
                $lastId = $ids[0];
            } else {
                $lastId = null;
            }
        }

        if ($putLastId) {
            $array["lastId"] = $lastId;
        }

        return $array;
    }
}