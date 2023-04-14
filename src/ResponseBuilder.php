<?php

namespace PriceInfo\Shop\Api;

abstract class ResponseBuilder {

    public abstract function buildResponse(Request $request);
}
