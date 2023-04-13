<?php

namespace Pricegator\Shop\Api;

use JsonSerializable;

class ProdImage extends ValidateObject implements JsonSerializable {

    public static function fromJson(array $json) {
        return (new ProdImage)->url($json["url"]);
    }

    protected $url;

    public function url($url) {
        return $this->validateSetString("url", $url);
    }

    public function getUrl() {
        return $this->url;
    }

    public function validate() {
        $this->validateRequired("url", $this->url);
    }

    public function jsonSerialize() {
        $this->validate();

        return [
            "url" => $this->url,
        ];
    }
}
