<?php

namespace PriceInfo\Shop\Api;

use Exception;

class ValidationRequiredException extends Exception {

    private $field;

    public function __construct($field) {
        $this->field = $field;
        parent::__construct($this->buildMessage());
    }

    public function getField() {
        return $this->field;
    }

    protected function buildMessage() {
        return "Field '$this->field' is required";
    }
}
