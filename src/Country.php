<?php

namespace Pricegator\Shop\Api;

use JsonSerializable;

class Country extends ValidateObject implements JsonSerializable {

    public static function fromJson(string $json) {
        return new Country($json);
    }

    protected $code;

    public function __construct(string $code) {
        $this->code = $code;
    }

    public function getCode() {
        return $this->code;
    }

    public function validate() {
        $this->validateRequired("code", $this->code);
    }

    public function jsonSerialize() {
        $this->validate();

        return $this->code;
    }
}
