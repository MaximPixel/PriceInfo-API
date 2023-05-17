<?php

namespace PriceInfo\Shop\Api\Request;

class InitRequest extends AbstractRequest {

    public function createJson() {
        return [
            "type" => $this->getType(),
        ];
    }

    public function getType() {
        return "init";
    }
}