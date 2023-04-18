<?php

namespace PriceInfo\Shop\Api;

use JsonSerializable;

class ProdsResponse implements JsonSerializable {

    public static function fromJson(array $json) {
        $prodsResponse = new ProdsResponse;
        foreach ($json["prods"] as $prodResponse) {
            $prodsResponse->addProd(ProdResponse::fromJson($prodResponse));
        }
        return $prodsResponse;
    }

    private $prods;

    public function addProd(ProdResponse $prodResponse) {
        if ($this->prods === null) {
            $this->prods = [];
        }
        $this->prods[] = $prodResponse;
    }

    public function getLastId() {
        if (isset($this->prods[0])) {
            $lastId = $this->prods[0]->getSkuId();

            foreach ($this->prods as $prod) {
                $id = $prod->getSkuId();

                if ($lastId < $id) {
                    $lastId = $id;
                }
            }

            return $lastId;
        }

        return null;
    }

    public function getProds() {
        return $this->prods;
    }

    public function count() {
        return count($this->prods);
    }

    public function jsonSerialize() {
        return [
            "prods" => $this->prods,
            "lastId" => $this->getLastId(),
        ];
    }
}
