<?php

namespace Pricegator\Shop\Api;

use JsonSerializable;

class ProdResponse extends ValidateObject implements JsonSerializable {

    public static function fromJson(array $json) {
        return (new ProdResponse)
            ->skuId($json["skuId"])
            ->url($json["url"])
            ->data(ProdData::fromJson($json["data"]))
            ->deliveries(array_map(function ($deliveryJson) {
                return Delivery::fromJson($deliveryJson);
            }, $json["deliveries"]))
            ->available($json["available"])
            ->images($json["images"]);
    }

    protected $skuId;
    protected $url;
    protected $price;
    protected $data;
    protected $deliveries;
    protected $itemsAvailable;
    protected $images;

    public function skuId(string|int $skuId) {
        $this->skuId = $skuId;
        return $this;
    }

    public function url(string $url) {
        $this->url = $url;
        return $this;
    }

    public function price(float $price) {
        $this->price = $price;
        return $this;
    }

    public function data(ProdData $data) {
        $this->data = $data;
        return $this;
    }

    public function deliveries(array $deliveries) {
        $this->validateArray("deliveries", $deliveries, Delivery::class);
        $this->deliveries = $deliveries;
        return $this;
    }

    public function available(int $itemsAvailable) {
        $this->itemsAvailable = $itemsAvailable;
        return $this;
    }

    public function images(array $images) {
        $this->validateArray("images", $images, "string");
        $this->images = $images;
        return $this;
    }

    public function getSkuId() {
        return $this->skuId;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getData() {
        return $this->data;
    }

    public function getDeliveries() {
        return $this->deliveries;
    }

    public function getAvailable() {
        return $this->itemsAvailble;
    }

    public function getImages() {
        return $this->images;
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
