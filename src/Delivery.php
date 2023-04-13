<?php

namespace Pricegator\Shop\Api;

use JsonSerializable;

class Delivery extends ValidateObject implements JsonSerializable {

    public static function fromJson(array $json) {
        return (new Delivery)
            ->country($json["country"])
            ->carriers(array_map(function ($carrierJson) {
                return Carrier::fromJson($carrierJson);
            }, $json["carriers"]));
    }

    protected $countries;
    protected $carriers;

    public function country(string|array $countryCodes) {
        if (is_array($countryCodes)) {
            $this->countries = array_map(function ($code) {
                return new Country($code);
            }, $countryCodes);
        } else {
            $this->countries = [new Country($countryCodes)];
        }
        return $this;
    }

    public function carriers($carriers) {
        $this->validateArray("carriers", $carriers, Carrier::class);
        $this->carriers = $carriers;
        return $this;
    }

    public function getCountries() {
        return $this->countries;
    }

    public function getCarriers() {
        return $this->carriers;
    }

    public function validate() {
        $this->validateRequired("countries", $this->countries);
    }

    public function jsonSerialize() {
        $this->validate();

        if (count($this->countries) == 1) {
            $country = $this->countries[0];
        } else {
            $country = $this->countries;
        }

        return [
            "country" => $country,
            "carriers" => $this->carriers,
        ];
    }
}
