<?php

namespace PriceInfo\Shop\Api\Request;

class LimitRequest extends AbstractProdsRequest {

    protected $context, $offset, $limit;

    public function __construct(RequestContext $context, int $offset, int $limit) {
        $this->context = $context;
        $this->offset = $offset;
        $this->limit = $limit;
    }

    public function createJson() {
        return [
            "context" => $this->context,
            "offset" => $this->offset,
            "limit" => $this->limit,
        ];
    }

    public function getSelectMethod() {
        return "limit";
    }

    public function getOffset() {
        return $this->offset;
    }

    public function getLimit() {
        return $this->limit;
    }
}