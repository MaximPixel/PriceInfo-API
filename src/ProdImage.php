<?php

namespace Pricegator\Shop\Api;

use JsonSerializable;

class ProdImage extends ValidateObject implements JsonSerializable {

    protected $country;

    public function url($url) {
        return $this->validateSetString("url", $url);
    }

    public function validate() {
        $this->validateRequired("url", $this->url);
    }

    public function jsonSerialize() {
        $this->validate();

        return [
            "country" => $this->url,
        ];
    }
}
