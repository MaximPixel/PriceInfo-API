<?php

namespace Pricegator\Shop\Api;

use JsonSerializable;

class ProdsResponse implements JsonSerializable {

    private $data;

    public function __construct($data = []) {
        $this->data = $data;
    }

    public function addProd($prodData) {
        $this->data[] = $prodData;
    }

    public function jsonSerialize() {
        return $this->data;
    }
}
