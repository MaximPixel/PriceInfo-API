<?php

namespace Pricegator\Shop\Api;

use JsonSerializable;

class Carrier extends ValidateObject implements JsonSerializable {

    protected $price;
    protected $name;
    protected $daysEst;
    protected $inStore;

    public function price($price) {
        return $this->validateSetFloat("price", $price);
    }

    public function name($name) {
        return $this->validateSetString("name", $name);
    }

    public function daysEst($daysEst) {
        return $this->validateSetFloat("daysEst", $daysEst);
    }

    public function inStore($inStore = true) {
        if (!is_bool($inStore)) {
            throw new ValidateionTypeException("inStore", "bool", $inStore);
        }

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
