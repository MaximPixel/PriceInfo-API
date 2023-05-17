<?php

namespace PriceInfo\Shop\Api;

class Carrier extends AbstractApiObject {

    protected $price, $name, $deliveryDaysEst, $inStore;

    public function price(float $price) {
        $this->price = $price;
        return $this;
    }

    public function name(string $name) {
        $this->name = $name;
        return $this;
    }

    public function deliveryDaysEst(string $deliveryDaysEst) {
        $this->deliveryDaysEst = $deliveryDaysEst;
        return $this;
    }

    public function inStore(bool $inStore = true) {
        $this->inStore = $inStore;
        return $this;
    }

    public function createJson() {
        return [
            "price" => $this->price,
            "name" => $this->name,
            "deliveryDaysEst" => $this->deliveryDaysEst,
            "inStore" => $this->inStore,
        ];
    }

    public function validate($json) {
        $this->assertArrayKeyType($json, "price", ["double"]);
        $this->assertArrayKeyType($json, "name", ["string"]);
        $this->assertArrayKeyType($json, "deliveryDaysEst", ["int"]);
        $this->assertArrayKeyType($json, "inStore", ["bool"]);
    }
}