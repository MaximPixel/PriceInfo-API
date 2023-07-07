<?php

namespace PriceInfo\Shop\Api;

require "./vendor/autoload.php";

use PHPUnit\Framework\TestCase;

use PriceInfo\Api\Request;

class Test extends TestCase {

    private $exampleProducts;

    protected function setUp(): void {
        $this->exampleProducts = [];
    }

    protected function tearDown(): void {
        unset($this->exampleProducts);
    }

    public function testRequestEncoding() {
        $request = Request::createOffset(null, 1);

        $this->assertSame(json_encode($request->toJson()), "{\"method\":\"getProducts\",\"details\":0,\"offset\":null,\"count\":1}");

        $request = Request::createSku(["123456789"]);

        $this->assertSame(json_encode($request->toJson()), "{\"method\":\"getProductsBySku\",\"details\":0,\"sku\":[\"123456789\"]}");

        $request = Request::createOffset(1, 2, details: true);

        $this->assertSame(json_encode($request->toJson()), "{\"method\":\"getProducts\",\"details\":1,\"offset\":1,\"count\":2}");

        $request = Request::createSku(["987654321"], details: true);

        $this->assertSame(json_encode($request->toJson()), "{\"method\":\"getProductsBySku\",\"details\":1,\"sku\":[\"987654321\"]}");
    }

    public function testRequestDeconding() {
        $json = "{\"method\":\"getProducts\",\"details\":1,\"offset\":1,\"count\":2}";

        $request = Request::fromJson(json_decode($json, true));

        $this->assertSame($request->getMethod(), "getProducts");
        $this->assertSame($request->getDetails(), true);
        $this->assertSame($request->getParams()["offset"], 1);
        $this->assertSame($request->getParams()["count"], 2);

        $json = "{\"method\":\"getProductsBySku\",\"details\":0,\"sku\":[\"123456789\"]}";

        $request = Request::fromJson(json_decode($json, true));

        $this->assertSame($request->getMethod(), "getProductsBySku");
        $this->assertSame($request->getDetails(), false);
        $this->assertSame($request->getParams()["sku"], ["123456789"]);
    }
}