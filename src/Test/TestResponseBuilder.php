<?php

namespace Pricegator\Shop\Api\Test;

use Pricegator\Shop\Api\Request;
use Pricegator\Shop\Api\Response;
use Pricegator\Shop\Api\ProdsResponse;
use Pricegator\Shop\Api\ResponseBuilder;

class TestResponseBuilder extends ResponseBuilder {

    public function buildResponse(Request $request) {
        if ($request->isInitRequest()) {
            return new Response([
                "msg" => "init",
            ]);
        } else if ($request->isProdsRequest()) {
            $prodsRequest = $request->getProdsRequest();

            $prodsResponse = new ProdsResponse;

            $prodsResponse->addProd([
                "title" => "TEST",
            ]);

            return new Response([
                "prods" => $prodsResponse,
            ]);
        }
    }
}
