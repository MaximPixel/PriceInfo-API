<?php

namespace PriceInfo\Shop\Api\Test;

use PriceInfo\Shop\Api\Request;
use PriceInfo\Shop\Api\Response;
use PriceInfo\Shop\Api\ProdsResponse;
use PriceInfo\Shop\Api\ResponseBuilder;

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
