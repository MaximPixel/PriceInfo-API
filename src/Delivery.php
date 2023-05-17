<?php

namespace PriceInfo\Shop\Api;

class Delivery extends AbstractApiObject {

    protected $country, $carriers;

    public function country(string $country) {
        $this->country = $country;
        return $this;
    }

    public function countries(array $countries) {
        foreach ($countries as $country) {
            if (!is_string($country)) {
                throw new \Excepton("country should be string type");
            }
        }
        $this->country = $country;
        return $this;
    }

    public function carrier(Carrier $carrier) {
        $this->carriers = [$carrier];
        return $this;
    }

    public function carriers(array $carriers) {
        foreach ($carriers as $carrier) {
            if (!is_string($country)) {
                throw new \Excepton("country should be Carrier type");
            }
        }
        $this->carriers = $carriers;
        return $this;
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