<?php

namespace Pricegator\Shop\Api;

class Context {

    public function __construct() {

    }

    public function createLimitProdsRequest($offset, $limit) {
        return new LimitProdsRequest($offset, $limit);
    }

    public function createLastIdProdsRequest($lastId, $limit) {
        return new LastIdProdsRequest($lastId, $limit);
    }

    public function createSkuProdsRequest($sku) {
        return new SkuProdsRequest($sku);
    }
}
