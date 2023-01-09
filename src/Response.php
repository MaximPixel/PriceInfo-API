<?php

namespace Pricegator\Shop\Api;

use JsonSerializable;

class Response implements JsonSerializable {

    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function jsonSerialize() {
        return $this->data;
    }
}
