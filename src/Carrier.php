<?php

namespace Pricegator\Shop\Api;

use JsonSerializable;

class Carrier extends ValidateObject implements JsonSerializable {

    public static function fromJson(array $json) {
        return (new Carrier)
            ->price($json["price"])
            ->name($json["name"])
            ->daysEst($json["deliveryDaysEst"])
            ->inStore($json["inStore"] ?? null);
    }

    protected $price;
    protected $name;
    protected $daysEst;
    protected $inStore;

    public function price(float $price) {
        $this->price = $price;
        return $this;
    }

    public function name(string $name) {
        $this->name = $name;
        return $this;
    }

    public function daysEst(float $daysEst) {
        $this->daysEst = $daysEst;
        return $this;
    }

    public function inStore(bool|null $inStore = true) {
        $this->inStore = $inStore;
        return $this;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getName() {
        return $this->name;
    }

    public function getDaysEst() {
        return $this->daysEst;
    }

    public function getInStore() {
        return $this->inStore;
    }

    public function validate() {
        $this->validateRequired("price", $this->price);
        $this->validateRequired("name", $this->name);
        $this->validateRequired("daysEst", $this->daysEst);
    }

    public function jsonSerialize() {
        $array = [
            "price" => $this->price,
            "name" => $this->name,
            "deliveryDaysEst" => $this->daysEst,
        ];

        if ($this->inStore !== null) {
            $array["inStore"] = $this->inStore;
        }

        return $array;
    }
}
