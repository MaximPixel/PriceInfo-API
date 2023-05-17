<?php

namespace PriceInfo\Shop\Api\Response;

use PriceInfo\Shop\Api\Request\InitRequest;

abstract class AbstractInitResponseBuilder {

    abstract function createResponse(InitRequest $request);
}