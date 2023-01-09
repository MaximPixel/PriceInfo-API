<?php

namespace Pricegator\Shop\Api;

class SkuProdsRequest extends ProdsRequest {

    protected $sku;
    
    public function __construct($sku) {
        $this->sku = $sku;
    }

    public function getSku() {
        return $this->sku;
    }
}
