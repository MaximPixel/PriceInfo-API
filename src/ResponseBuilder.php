<?php

namespace Pricegator\Shop\Api;

abstract class ResponseBuilder {

    public abstract function buildResponse(Request $request);
}
