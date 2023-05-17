<?php

namespace PriceInfo\Shop\Api\Request;

class SkuRequest extends AbstractProdsRequest {

    protected $context, $sku;

    public function __construct(RequestContext $context, array $sku) {
        $this->context = $context;
        $this->sku = $sku;
    }

    public function createJson() {
        return [
            "context" => $this->context,
            "sku" => $this->sku,
        ];
    }

    public function getSelectMethod() {
        return "sku";
    }

    public function getSkuArray() {
        return $this->sku;
    }
}