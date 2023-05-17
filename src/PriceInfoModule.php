<?php

namespace PriceInfo\Shop\Api;

abstract class PriceInfoModule {

    abstract function getInitResponseBuilderClass();

    abstract function getProdsLastIdResponseBuilderClass();

    abstract function getProdsLimitResponseBuilderClass();

    abstract function getProdsSkuResponseBuilderClass();
}