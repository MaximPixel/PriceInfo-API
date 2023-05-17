<?php

namespace PriceInfo\Shop\Api\Response;

use PriceInfo\Shop\Api\Request\LastIdRequest;

abstract class AbstractProdsLastIdResponseBuilder {

    abstract function createResponse(LastIdRequest $request);
}