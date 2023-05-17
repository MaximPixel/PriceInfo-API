<?php

namespace PriceInfo\Shop\Api\Test;

use PriceInfo\Shop\Api\Request\InitRequest;
use PriceInfo\Shop\Api\Response\InitResponse;
use PriceInfo\Shop\Api\Response\AbstractInitResponseBuilder;

class TestInitResponseBuilder extends AbstractInitResponseBuilder {

    public function createResponse(InitRequest $request) {
        return (new InitResponse)->withCurrencies(["EUR", "PLN"]);
    }
}