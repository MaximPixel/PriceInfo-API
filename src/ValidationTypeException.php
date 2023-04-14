<?php

namespace PriceInfo\Shop\Api;

use Exception;

class ValidationTypeException extends Exception {

    private $field;
    private $requiredType;
    private $givenValue;

    public function __construct($field, $requiredType, $givenValue) {
        $this->field = $field;
        $this->requiredType = $requiredType;
        $this->givenValue = $givenValue;
        parent::__construct($this->buildMessage());
    }

    public function getField() {
        return $this->field;
    }

    public function getRequiredType() {
        return $this->requiredType;
    }

    public function getGivenValue() {
        return $this->givenValue;
    }

    protected function buildMessage() {
        $field = $this->field;

        if (is_array($this->requiredType)) {
            $requiredType = join(" or ", array_map(function ($requiredType) {
                return "'$requiredType'";
            }, $this->requiredType));
        } else {
            $requiredType = "'$this->requiredType'";
        }

        $givenValue = var_export($this->givenValue, true) . " (" . gettype($this->givenValue) . ")";

        return "Field '$field' required $requiredType value type, $givenValue is given";
    }
}
