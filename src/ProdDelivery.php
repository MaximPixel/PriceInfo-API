<?php

namespace PriceInfo\Api;

class ProdDelivery {

    public static function fromJson($json) {
        return (new ProdDelivery)
            ->country($json["country"])
            ->carriers(array_map(function ($carrierJson) {
                return Carrier::fromJson($carrierJson);
            }, $json["carriers"]));
    }

    private $country, $carriers;

    public function country($country) {
        $this->country = $country;
        return $this;
    }

    public function carriers($carriers) {
        $this->carriers = $carriers;
        return $this;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getCarriers() {
        return $this->carriers;
    }

    public function toJson() {
        return [
            "country" => $this->country,
            "carriers" => array_map(function ($carrier) {
                return $carrier->toJson();
            }, $this->carriers),
        ];
    }
}