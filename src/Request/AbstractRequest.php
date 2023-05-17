<?php

namespace PriceInfo\Shop\Api\Request;

abstract class AbstractRequest implements \JsonSerializable {

    abstract function createJson();

    abstract function getType();

    public function jsonSerialize() {
        $requestData = [
            "type" => $this->getType(),
        ];

        return array_merge($requestData, $this->createJson());
    }
}