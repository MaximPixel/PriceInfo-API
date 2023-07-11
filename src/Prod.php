<?php

namespace PriceInfo\Api;

class Prod {

    public static function fromJson($json) {
        $prod = (new Prod)
            ->sku($json["sku"])
            ->url($json["url"])
            ->manufacturer($json["manufacturer"])
            ->model($json["model"])
            ->ean($json["ean"])
            ->price($json["price"])
            ->availability($json["availability"])
            ->itemsAvailable($json["itemsAvailable"])
            ->updated($json["updated"]);

        if (isset($json["category"]) || isset($json["name"]) || isset($json["description"]) || isset($json["images"])) {
            $prod = $prod->details(ProdDetails::fromJson($json));
        }

        if (isset($json["delivery"])) {
            $prod = $prod->delivery(array_map(function ($deliveryJson) {
                return ProdDelivery::fromJson($deliveryJson);
            }, $json["delivery"]));
        }

        return $prod;
    }

    private $sku, $url, $manufacturer, $model, $ean, $price, $availability, $itemsAvailable, $updated;
    private $details;
    private $delivery;

    public function sku($sku) {
        $this->sku = $sku;
        return $this;
    }

    public function url($url) {
        $this->url = $url;
        return $this;
    }

    public function manufacturer($manufacturer) {
        $this->manufacturer = $manufacturer;
        return $this;
    }

    public function model($model) {
        $this->model = $model;
        return $this;
    }

    public function ean($ean) {
        $this->ean = $ean;
        return $this;
    }

    public function price($price) {
        $this->price = $price;
        return $this;
    }

    public function availability($availability) {
        $this->availability = $availability;
        return $this;
    }

    public function itemsAvailable($itemsAvailable) {
        $this->itemsAvailable = $itemsAvailable;
        return $this;
    }

    public function updated($updated) {
        $this->updated = $updated;
        return $this;
    }

    public function details($details) {
        $this->details = $details;
        return $this;
    }

    public function delivery($delivery) {
        $this->delivery = $delivery;
        return $this;
    }

    public function getSku() {
        return $this->sku;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getManufacturer() {
        return $this->sku;
    }

    public function getModel() {
        return $this->model;
    }

    public function getEan() {
        return $this->ean;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getAvailability() {
        return $this->availability;
    }

    public function getItemsAvailable() {
        return $this->itemsAvailable;
    }

    public function getUpdated() {
        return $this->updated;
    }

    public function getDetails() {
        return $this->details;
    }

    public function getDelivery() {
        return $this->delivery;
    }

    public function toJson() {
        $json = [
            "sku" => $this->sku,
            "url" => $this->url,
            "manufacturer" => $this->manufacturer,
            "model" => $this->model,
            "price" => $this->price,
            "availability" => $this->availability,
            "itemsAvailable" => $this->itemsAvailable,
            "updated" => $this->updated,
        ];

        if ($this->details) {
            foreach ($this->details->toJson() as $key => $value) {
                $json[$key] = $value;
            }
        }

        if ($this->delivery) {
            $json["delivery"] = $this->delivery->toJson();
        }

        return $json;
    }
}