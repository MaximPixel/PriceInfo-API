<?php

namespace PriceInfo\Shop\Api;

class ProdImage extends AbstractApiObject {

    protected $url;

    public function url(string $url) {
        $this->url = $url;
        return $this;
    }

    public function createJson() {
        return [
            "url" => $this->url,
        ];
    }

    public function validate($json) {
        $this->assertArrayKeyType($json, "url", ["string"]);
    }
}