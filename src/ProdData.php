<?php

namespace PriceInfo\Shop\Api;

class ProdData extends AbstractApiObject {

    protected $title, $model, $description, $manufacturer, $weight, $eans;

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

    public function weight(float $weight) {
        $this->weight = $weight;
        return $this;
    }

    public function ean(string $ean) {
        $this->eans = $ean;
        return $this;
    }

    public function eans(array $eans) {
        foreach ($eans as $ean) {
            if (!is_string($ean)) {
                throw new \Exception("ean should be string type");
            }
        }
        $this->eans = $eans;
        return $this;
    }

    public function createJson() {
        return [
            "title" => $this->title,
            "model" => $this->model,
            "description" => $this->description,
            "manufacturer" => $this->manufacturer,
            "weight" => $this->weight,
            "eans" => $this->eans,
        ];
    }

    public function validate($json) {
        $this->assertArrayKeyType($json, "title", ["string"]);
        $this->assertArrayKeyType($json, "eans", ["array", "string"]);
    }
}