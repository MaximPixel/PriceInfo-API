<?php

namespace Pricegator\Shop\Api;

use JsonSerializable;

class ProdData extends ValidateObject implements JsonSerializable {

    protected $title;
    protected $model;
    protected $description;
    protected $manufacturer;
    protected $weight;
    protected $ean;

    public function title($title) {
        return $this->validateSetString("title", $title);
    }

    public function model($model) {
        return $this->validateSetString("model", $model);
    }

    public function description($description) {
        return $this->validateSetString("description", $description);
    }

    public function manufacturer($manufacturer) {
        return $this->validateSetString("manufacturer", $manufacturer);
    }

    public function weight($weight) {
        return $this->validateSetFloat("weight", $weight);
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
