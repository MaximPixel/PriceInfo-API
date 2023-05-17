<?php

namespace PriceInfo\Shop\Api\Response;

use PriceInfo\Shop\Api\Request\LimitRequest;

abstract class AbstractProdsLimitResponseBuilder {

    abstract function createResponse(LimitRequest $request);
}