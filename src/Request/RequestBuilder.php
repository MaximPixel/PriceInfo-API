<?php

namespace PriceInfo\Shop\Api\Request;

class RequestBuilder {

    public function createRequestContext() {
        return new \PriceInfo\Shop\Api\Request\RequestContext("EUR");
    }

    public function createInitRequest() {
        return new \PriceInfo\Shop\Api\Request\InitRequest;
    }

    public function createLimitRequest(int $offset, int $limit) {
        return new \PriceInfo\Shop\Api\Request\LimitRequest($this->createRequestContext(), $offset, $limit);
    }

    public function createLastIdRequest($lastId, int $limit) {
        return new \PriceInfo\Shop\Api\Request\LastIdRequest($this->createRequestContext(), $lastId, $limit);
    }

    public function createSkuRequest(array $sku) {
        return new \PriceInfo\Shop\Api\Request\SkuRequest($this->createRequestContext(), $sku);
    }
}