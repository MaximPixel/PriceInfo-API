<?php

namespace PriceInfo\Api;

class Request {

    public static function createOffset($offset, int $count, bool $details = false) {
        return new Request("getProducts", $details, [
            "offset" => $offset,
            "count" => $count,
        ]);
    }

    public static function createSku(array $sku, bool $details = false) {
        return new Request("getProductsBySku", $details, [
            "sku" => $sku,
        ]);
    }

    public static function fromJson($json) {
        $method = $json["method"];

        if ($method == "getProducts") {
            return self::createOffset($json["offset"], $json["count"], $json["details"] ?? false);
        } else if ($method == "getProductsBySku") {
            return self::createSku($json["sku"], $json["details"] ?? false);
        }
    }

    private $method, $details, $params;

    private function __construct($method, $details, $params) {
        $this->method = $method;
        $this->details = !!$details;
        $this->params = $params;
    }

    public function getMethod() {
        return $this->method;
    }

    public function getDetails() {
        return $this->details;
    }

    public function getParams() {
        return $this->params;
    }

    public function toJson() {
        $json = [
            "method" => $this->method,
            "details" => $this->details ? 1 : 0,
        ];

        foreach ($this->params as $key => $value) {
            $json[$key] = $value;
        }

        return $json;
    }
}