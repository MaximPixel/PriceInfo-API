<?php

namespace PriceInfo\Api;

class Carrier {

    public static function fromJson($json) {
        $carrier = (new Carrier)
            ->name($json["name"])
            ->shippingRate($json["shippingRate"])
            ->deliveryDays($json["deliveryDays"]);

        if (isset($json["inStore"])) {
            $carrier = $carrier->inStore($json["inStore"]);
        }

        return $carrier;
    }

    private $name, $shippingRate, $deliveryDays, $inStore;

    public function name($name) {
        $this->name = $name;
        return $this;
    }

    public function shippingRate($shippingRate) {
        $this->shippingRate = $shippingRate;
        return $this;
    }

    public function deliveryDays($deliveryDays) {
        $this->deliveryDays = $deliveryDays;
        return $this;
    }

    public function inStore($inStore) {
        $this->inStore = !!$inStore;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function getShippingRate() {
        return $this->shippingRate;
    }

    public function getDeliveryDays() {
        return $this->deliveryDays;
    }

    public function getInStore() {
        return $this->inStore;
    }

    public function toJson() {
        $json = [
            "name" => $this->name,
            "shippingRate" => $this->shippingRate,
            "deliveryDays" => $this->deliveryDays,
        ];

        if ($this->inStore !== null) {
            $json["inStore"] = $this->inStore ? 1 : 0;
        }

        return $json;
    }
}