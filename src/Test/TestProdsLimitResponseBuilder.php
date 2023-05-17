<?php

namespace PriceInfo\Shop\Api\Test;

use PriceInfo\Shop\Api\Request\LimitRequest;
use PriceInfo\Shop\Api\Response\ProdsResponse;
use PriceInfo\Shop\Api\Response\AbstractProdsLimitResponseBuilder;

class TestProdsLimitResponseBuilder extends AbstractProdsLimitResponseBuilder {

    public function createResponse(LimitRequest $request) {
        return (new ProdsResponse);
    }
}