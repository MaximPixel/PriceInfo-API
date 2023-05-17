<?php

namespace PriceInfo\Shop\Api\Request;

class LastIdRequest extends AbstractProdsRequest {

    protected $context, $lastId, $limit;

    public function __construct(RequestContext $context, $lastId, int $limit) {
        $this->context = $context;
        $this->lastId = $lastId;
        $this->limit = $limit;
    }

    public function createJson() {
        return [
            "context" => $this->context,
            "lastId" => $this->lastId,
            "limit" => $this->limit,
        ];
    }

    public function getSelectMethod() {
        return "lastId";
    }

    public function getLastId() {
        return $this->lastId;
    }

    public function getLimit() {
        return $this->limit;
    }
}