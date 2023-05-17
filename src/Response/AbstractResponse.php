<?php

namespace PriceInfo\Shop\Api\Response;

abstract class AbstractResponse implements \JsonSerializable {

    abstract function createJson();

    public function jsonSerialize() {
        return $this->createJson();
    }
}