<?php

namespace Pricegator\Shop\Api;

class LastIdProdsRequest extends ProdsRequest {

    protected $lastId, $limit;
    
    public function __construct($lastId, $limit) {
        $this->lastId = $lastId;
        $this->limit = $limit;
    }

    public function getLastId() {
        return $this->lastId;
    }

    public function getLimit() {
        return $this->limit;
    }
}
