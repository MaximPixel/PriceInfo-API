<?php

namespace Pricegator\Shop\Api;

use JsonSerializable;

class Zone extends ValidateObject implements JsonSerializable {

    protected $country;

    public function country($country) {
        if (is_string($country)) {
            $this->country = $country;
            return $this;
        } else if (is_array($ean)) {
            $this->ean = $ean;

            foreach ($ean as $eanStr) {
                $this->validateString($eanStr);
            }

            return $this;
        }

        throw new ValidationTypeException("ean", ["string", "array"], $value);
    }

    public function getCountry() {
        return $this->country;
    }

    public function validate() {
        $this->validateRequired("country", $this->country);
    }

    public function jsonSerialize() {
        $this->validate();

        return [
            "country" => $this->country,
        ];
    }
}
