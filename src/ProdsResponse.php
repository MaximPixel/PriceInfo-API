<?php

namespace Pricegator\Shop\Api;

use JsonSerializable;

class ProdsResponse implements JsonSerializable {

    private $data;

    public function __construct($data = []) {
        $this->data = $data;
    }

    public function addProd($prodData) {
        $this->data[] = $prodData;
    }

    public function getLastId() {
        if (isset($this->data[0])) {
            $lastId = $this->$data[0]->getSkuId;

            foreach ($this->data as $prod) {
                $id = $prod->getSkuId();

                if ($lastId < $id) {
                    $lastId = $id;
                }
            }

            return $lastId;
        }

        return null;
    }

    public function count() {
        return count($this->data);
    }

    public function jsonSerialize() {
        return $this->data;
    }
}
