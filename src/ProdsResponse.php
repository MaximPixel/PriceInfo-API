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

    private $prodResponses;

    public function addProd(ProdResponse $prodResponse) {
        $this->prodResponses[] = $prodResponse;
    }

    public function getLastId() {
        if (isset($this->prodResponses[0])) {
            $lastId = $this->prodResponses[0]->getSkuId();

            foreach ($this->prodResponses as $prod) {
                $id = $prod->getSkuId();

                if ($lastId < $id) {
                    $lastId = $id;
                }
            }

            return $lastId;
        }

        return null;
    }

    public function count() {
        return count($this->prodResponses);
    }

    public function getProds() {
        return $this->prodResponses;
    }

    public function jsonSerialize() {
        return $this->prodResponses;
    }
}
