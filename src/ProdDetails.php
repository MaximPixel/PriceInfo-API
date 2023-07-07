<?php

namespace PriceInfo\Api;

class ProdDetails {

    public function fromJson($json) {
        return (new ProdDetails)
            ->category($json["category"])
            ->name($json["name"])
            ->description($json["description"])
            ->images($json["images"]);
    }

    private $category, $name, $description, $images;

    public function category($category) {
        $this->category = $category;
        return $this;
    }

    public function name($name) {
        $this->name = $name;
        return $this;
    }

    public function description($description) {
        $this->description = $description;
        return $this;
    }

    public function images($images) {
        $this->images = $images;
        return $this;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImages() {
        return $this->images;
    }

    public function toJson() {
        return [
            "category" => $this->category,
            "name" => $this->name,
            "description" => $this->description,
            "images" => $this->images,
        ];
    }
}