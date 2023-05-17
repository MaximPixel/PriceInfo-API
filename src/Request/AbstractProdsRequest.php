<?php

namespace PriceInfo\Shop\Api\Request;

abstract class AbstractProdsRequest extends AbstractRequest {

    public function jsonSerialize() {
        $requestData = [
            "selectMethod" => $this->getSelectMethod(),
        ];

        return array_merge($requestData, parent::jsonSerialize());
    }

    abstract function getSelectMethod();

    public function getType() {
        return "prods";
    }
}