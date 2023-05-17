<?php

namespace PriceInfo\Shop\Api\Request;

class RequestContext implements \JsonSerializable {

    protected $currency;

    public function __construct(string $currency) {
        $this->currency = $currency;
    }

    public function getCurrency() {
        $this->currency;
    }

    public function jsonSerialize() {
        return [
            "currency" => $this->currency,
        ];
    }
}