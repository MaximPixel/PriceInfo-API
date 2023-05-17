<?php

namespace PriceInfo\Shop\Api\Response;

use PriceInfo\Shop\Api\PriceinfoModule;
use PriceInfo\Shop\Api\Request\AbstractRequest;

class ResponseBuilder {

    protected function getResponseBuilderClass(PriceinfoModule $module, AbstractRequest $request) {
        $requestType = $request->getType();

        $response = new ProdsResponse;

        if ($requestType == "init") {
            return $module->getInitResponseBuilderClass();
        } else if ($requestType == "prods") {
            $selectMethod = $request->getSelectMethod();

            if ($selectMethod == "limit") {
                return $module->getProdsLimitResponseBuilderClass();
            } else if ($selectMethod == "lastId") {
                return $module->getProdsLastIdResponseBuilderClass();
            } else if ($selectMethod == "sku") {
                return $module->getProdsSkuResponseBuilderClass();
            }
        }
    }

    public function createResponse(PriceinfoModule $module, AbstractRequest $request) {
        $responseBuilderClass = $this->getResponseBuilderClass($module, $request);

        if ($responseBuilderClass) {
            return (new $responseBuilderClass)->createResponse($request);
        }
    }
}