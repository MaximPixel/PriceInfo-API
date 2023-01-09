<?php

namespace Pricegator\Shop\Api;

class Request {

    private $context;
    private $data;

    public function __construct(Context $context, $data) {
        $this->context = $context;
        $this->data = $data;
    }

    public function getType() {
        return $this->data["type"];
    }

    public function isProdsRequest() {
        return $this->getType() == "prods";
    }

    public function isInitRequest() {
        return $this->getType() == "init";
    }

    public function getSelectMethod() {
        return $this->data["selectMethod"];
    }

    public function getProdsRequest() {
        $selectMethod = $this->getSelectMethod();

        if ($selectMethod == "limit") {
            $offset = $this->data["offset"];
            $limit = $this->data["limit"];

            return $this->context->createLimitProdsRequest($offset, $limit);
        } else if ($selectMethod == "lastId") {
            $lastId = $this->data["lastId"];
            $limit = $this->data["limit"];

            return $this->context->createLastIdProdsRequest($lastId, $limit);
        } else if ($selectMethod == "sku") {
            $sku = $this->data["sku"];

            return $this->context->createSkuProdsRequest($sku);
        }
    }
}
