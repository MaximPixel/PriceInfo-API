<?php

namespace PriceInfo\Shop\Api\Response;

use PriceInfo\Shop\Api\Request\SkuRequest;

abstract class AbstractProdsSkuResponseBuilder {

    abstract function createResponse(SkuRequest $request);
}