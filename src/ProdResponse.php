<?php

namespace Pricegator\Shop\Api;

use JsonSerializable;

class ProdResponse extends ValidateObject implements JsonSerializable {

    protected $skuId;
    protected $url;
    protected $price;
    protected $data;
    protected $deliveries;
    protected $itemsAvailable;
    protected $images;

    public function skuId($skuId) {
        $this->skuId = $skuId;
        return $this;
    }

    public function url($url) {
        return $this->validateSetString("url", $url);
    }

    public function price($price) {
        return $this->validateSetFloat("price", $price);
    }

    public function data(ProdData $data) {
        $this->data = $data;
        return $this;
    }

    public function deliveries($deliveries) {
        $this->validateArray("deliveries", $deliveries);
        $this->deliveries = $deliveries;
        return $this;
    }

    public function available($itemsAvailable) {
        $this->validateInt("itemsAvailable", $itemsAvailable);
        $this->itemsAvailable = $itemsAvailable;
        return $this;
    }

    public function images($images) {
        $this->validateArray("images", $images);
        $this->images = $images;
        return $this;
    }

    public function validate() {
        $this->validateRequired("skuId", $this->skuId);
        $this->validateRequired("url", $this->url);
        $this->validateRequired("data", $this->data);
        $this->validateRequired("deliveries", $this->deliveries);
        $this->validateRequired("available", $this->itemsAvailable);
        $this->validateRequired("images", $this->images);
    }

    public function jsonSerialize() {
        $this->validate();

        return [
            "skuId" => $this->skuId,
            "url" => $this->url,
            "data" => $this->data,
            "deliveries" => $this->deliveries,
            "available" => $this->itemsAvailable,
            "images" => $this->images,
        ];
    }
}
