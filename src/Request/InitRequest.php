<?php

namespace PriceInfo\Shop\Api\Request;

class InitRequest extends AbstractRequest {

    public static function fromJson(array $json) {
        return new InitRequest;
    }

    public function createJson() {
        return [
            "type" => $this->getType(),
        ];
    }

    public function getType() {
        return "init";
    }
}