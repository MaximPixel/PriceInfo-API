<?php

namespace Pricegator\Shop\Api;

use JsonSerializable;

class ProdData extends ValidateObject implements JsonSerializable {

    public static function fromJson(array $json) {
        return (new ProdData)
            ->title($json["title"])
            ->ean($json["ean"])
            ->model($json["model"] ?? null)
            ->description($json["description"] ?? null)
            ->manufacturer($json["manufacturer"] ?? null)
            ->weight($json["weight"] ?? null);
    }

    protected $title;
    protected $model;
    protected $description;
    protected $manufacturer;
    protected $weight;
    protected $ean;

    public function title(string $title) {
        $this->title = $title;
        return $this;
    }

    public function model(string|null $model) {
        $this->model = $model;
        return $this;
    }

    public function description(string|null $description) {
        $this->description = $description;
        return $this;
    }

    public function manufacturer(string|null $manufacturer) {
        $this->manufacturer = $manufacturer;
        return $this;
    }

    public function weight(float|null $weight) {
        $this->weight = $weight;
        return $this;
    }

    public function ean($ean) {
        if (is_string($ean)) {
            $this->ean = $ean;
            return $this;
        } else if (is_array($ean)) {
            foreach ($ean as $key => $eanStr) {
                $this->validateString("ean[$key]", $eanStr);
            }

            $this->ean = $ean;

            return $this;
        }

        throw new ValidationTypeException("ean", ["string", "array"], $value);
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

    public function validate() {
        $this->validateRequired("title", $this->title);
        $this->validateRequired("ean", $this->ean);
    }

    public function jsonSerialize() {
        $this->validate();

        $array = [
            "title" => $this->title,
            "ean" => $this->ean,
        ];

        if ($this->model !== null) {
            $array["model"] = $this->model;
        }
        if ($this->description !== null) {
            $array["description"] = $this->description;
        }
        if ($this->manufacturer !== null) {
            $array["manufacturer"] = $this->manufacturer;
        }
        if ($this->weight !== null) {
            $array["weight"] = $this->weight;
        }

        return $array;
    }
}
