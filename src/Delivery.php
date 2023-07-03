<?php

namespace PriceInfo\Shop\Api;

class Delivery extends AbstractApiObject {

    public static function fromJson(array $json) {
        $delivery = new Delivery;

        if (is_array($json["country"])) {
            $delivery->countries($json["country"]);
        } else {
            $delivery->country($json["country"]);
        }

        $delivery->carriers(array_map(function ($carrierJson) {
            return Carrier::fromJson($carrierJson);
        }, $json["carriers"]));

        return $delivery;
    }

    protected $country, $carriers;

    public function country(string $country) {
        $this->country = $country;
        return $this;
    }

    public function countries(array $countries) {
        foreach ($countries as $country) {
            if (!is_string($country)) {
                throw new \Exception("country should be string type");
            }
        }
        $this->country = $countries;
        return $this;
    }

    public function carrier(Carrier $carrier) {
        $this->carriers = [$carrier];
        return $this;
    }

    public function carriers(array $carriers) {
        foreach ($carriers as $carrier) {
            if (!($carrier instanceof Carrier)) {
                throw new \Exception("country should be Carrier type");
            }
        }
        $this->carriers = $carriers;
        return $this;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getCarriers() {
        return $this->carriers;
    }

    public function createJson() {
        return [
            "country" => $this->country,
            "carriers" => $this->carriers,
        ];
    }

    public function validate($json) {
        $this->assertArrayKeyType($json, "url", ["string", "array"]);
        $this->assertArrayKeyType($json, "carriers", ["array"]);
    }
}