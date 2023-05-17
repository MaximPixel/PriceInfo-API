<?php

namespace PriceInfo\Shop\Api\Test;

use PriceInfo\Shop\Api\PriceInfoModule;

class TestPriceInfoModule extends PriceInfoModule {

    public function getInitResponseBuilderClass() {
        return TestInitResponseBuilder::class;
    }

    public function getProdsLastIdResponseBuilderClass() {
        return TestProdsLastIdResponseBuilder::class;
    }

    public function getProdsLimitResponseBuilderClass() {
        return TestProdsLimitResponseBuilder::class;
    }

    public function getProdsSkuResponseBuilderClass() {
        return TestProdsSkuResponseBuilder::class;
    }
}