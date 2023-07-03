<?php

namespace PriceInfo\Shop\Api;

class ProdData extends AbstractApiObject {

    public static function fromJson(array $json) {
        $prodData = (new ProdData)
            ->title($json["title"]);

        if (is_array($json["ean"])) {
            $prodData->eanArray($json["ean"]);
        } else {
            $prodData->ean($json["ean"]);
        }

        if (array_key_exists("model", $json)) {
            $prodData->model($json["model"]);
        }

        if (array_key_exists("description", $json)) {
            $prodData->description($json["description"]);
        }

        if (array_key_exists("manufacturer", $json)) {
            $prodData->manufacturer($json["manufacturer"]);
        }

        if (array_key_exists("weight", $json)) {
            $prodData->weight($json["weight"]);
        }

        return $prodData;
    }

    protected $title, $model, $description, $manufacturer, $weight, $ean;

    public function title(string $title) {
        $this->title = $title;
        return $this;
    }

    public function model(string $model) {
        $this->model = $model;
        return $this;
    }

    public function description(string $description) {
        $this->description = $description;
        return $this;
    }

    public function manufacturer(string $manufacturer) {
        $this->manufacturer = $manufacturer;
        return $this;
    }

    public function weight($weight) {
        $this->weight = $weight;
        return $this;
    }

    public function ean(string $ean) {
        $this->ean = $ean;
        return $this;
    }

    public function eanArray(array $eans) {
        foreach ($eans as $ean) {
            if (!is_string($ean)) {
                throw new \Exception("ean should be string type");
            }
        }
        $this->ean = $eans;
        return $this;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getModel() {
        return $this->model;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getManufacturer() {
        return $this->manufacturer;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function getEan() {
        return $this->ean;
    }

    public function createJson() {
        return [
            "title" => $this->title,
            "model" => $this->model,
            "description" => $this->description,
            "manufacturer" => $this->manufacturer,
            "weight" => $this->weight,
            "ean" => $this->ean,
        ];
    }

    public function validate($json) {
        $this->assertArrayKeyType($json, "title", ["string"]);
        $this->assertArrayKeyType($json, "ean", ["array", "string"]);
    }
}