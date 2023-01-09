<?php

namespace Pricegator\Shop\Api;

class LimitProdsRequest extends ProdsRequest {

    protected $offset, $limit;
    
    public function __construct($offset, $limit) {
        $this->offset = $offset;
        $this->limit = $limit;
    }

    public function getOffset() {
        return $this->offset;
    }

    public function getLimit() {
        return $this->limit;
    }
}
