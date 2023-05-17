<?php

namespace PriceInfo\Shop\Api\Test;

use PriceInfo\Shop\Api\Request\LastIdRequest;
use PriceInfo\Shop\Api\Response\ProdsResponse;
use PriceInfo\Shop\Api\Response\AbstractProdsLastIdResponseBuilder;

class TestProdsLastIdResponseBuilder extends AbstractProdsLastIdResponseBuilder {

    public function createResponse(LastIdRequest $request) {
        return (new ProdsResponse)
            ->addProd(
                (new \PriceInfo\Shop\Api\Prod)
                    ->sku(0)
                    ->url("https://test.com")
                    ->price(99)
                    ->data(
                        (new \PriceInfo\Shop\Api\ProdData)
                            ->title("test1")
                            ->model("test2")
                            ->ean("01010101010")
                    )
                    ->itemsAvailable(1001)
                    ->image((new \PriceInfo\Shop\Api\ProdImage)->url("testiamage"))
            )
            ->withAutoLastId();
    }
}