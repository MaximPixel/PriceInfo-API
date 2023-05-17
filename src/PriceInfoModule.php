<?php

namespace PriceInfo\Shop\Api;

abstract class PriceInfoModule {

    abstract function getInitResponseBuilderClass();

    abstract function getProdsLastIdResponseBuilderClass();

    abstract function getProdsLimitResponseBuilderClass();

    abstract function getProdsSkuResponseBuilderClass();

    public function decodeRequestJson(array $json) {
        $requestClass = null;

        $type = $json["type"] ?? null;

        if ($type == "init") {
            $requestClass = \PriceInfo\Shop\Api\Request\InitRequest::class;
        } else if ($type == "prods") {
            $selectMethod = $json["selectMethod"];

            if ($selectMethod == "lastId") {
                $requestClass = \PriceInfo\Shop\Api\Request\LastIdRequest::class;
            } else if ($selectMethod == "limit") {
                $requestClass = \PriceInfo\Shop\Api\Request\LimitRequest::class;
            } else if ($selectMethod == "sku") {
                $requestClass = \PriceInfo\Shop\Api\Request\SkuRequest::class;
            }
        }

        if ($requestClass) {
            return $requestClass::fromJson($json);
        } else {
            return null;
        }
    }
}