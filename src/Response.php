<?php

namespace PriceInfo\Api;

class Response {

    private $prods, $lastId;

    public function prods($prods) {
        $this->prods = $prods;
        return $this;
    }

    public function lastId($lastId) {
        $this->lastId = $lastId;
        return $this;
    }

    public function getProds() {
        return $this->prods;
    }

    public function getLastId() {
        return $this->lastId;
    }

    public function toJson() {
        return [
            "prods" => $this->prods,
            "lastId" => $this->lastId,
        ];
    }
}