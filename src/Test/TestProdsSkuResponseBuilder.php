<?php

namespace PriceInfo\Shop\Api\Test;

use PriceInfo\Shop\Api\Request\SkuRequest;
use PriceInfo\Shop\Api\Response\ProdsResponse;
use PriceInfo\Shop\Api\Response\AbstractProdsSkuResponseBuilder;

class TestProdsSkuResponseBuilder extends AbstractProdsSkuResponseBuilder {

    public function createResponse(SkuRequest $request) {
        return (new ProdsResponse);
    }
}