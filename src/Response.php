<?php

namespace PriceInfo\Api;

class Response {

    public function fromJson($json) {
        return (new Response)
            ->prods(array_map(function ($prodJson) {
                return Prod::fromJson($prodJson);
            }, $json["prods"]))
            ->lastId($json["lastId"]);
    }

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
            "prods" => array_map(function ($prod) {
                return $prod->toJson();
            }, $this->prods),
            "lastId" => $this->lastId,
        ];
    }
}