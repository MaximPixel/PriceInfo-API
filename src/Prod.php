<?php

namespace PriceInfo\Shop\Api;

class Prod extends AbstractApiObject {

    protected $sku, $url, $price, $data, $delivery = [], $itemsAvailable, $images = [];

    public function sku(string|int $sku) {
        $this->sku = $sku;
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
        foreach ($images as $image) {
            if (!($image instanceof Delivery)) {
                throw new \Exception("delivery should be Delivery type");
            }
        }
        $this->deliveries = $deliveries;
        return $this;
    }

    public function itemsAvailable(int $itemsAvailable) {
        $this->itemsAvailable = $itemsAvailable;
        return $this;
    }

    public function image(ProdImage $image) {
        $this->images = [$image];
        return $this;
    }

    public function images(array $images) {
        foreach ($images as $image) {
            if (!($image instanceof ProdImage)) {
                throw new \Exception("Image should be string ProdImage type");
            }
        }
        $this->images = $images;
        return $this;
    }

    public function getSku() {
        return $this->sku;
    }

    public function createJson() {
        return [
            "sku" => $this->sku,
            "url" => $this->url,
            "price" => $this->price,
            "data" => $this->data,
            "delivery" => $this->delivery,
            "itemsAvailable" => $this->itemsAvailable,
            "images" => $this->images,
        ];
    }

    public function validate($json) {
        $this->assertArrayKeyType($json, "sku", ["string", "integer"]);
        $this->assertArrayKeyType($json, "url", ["string"]);
        $this->assertArrayKeyType($json, "price", ["integer", "double"]);
        $this->assertArrayKeyType($json, "data", [ProdData::class]);
        $this->assertArrayKeyType($json, "itemsAvailable", ["integer"]);
        $this->assertArrayKeyType($json, "images", ["array"]);
    }
}