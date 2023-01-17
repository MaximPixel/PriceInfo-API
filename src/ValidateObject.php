<?php

namespace Pricegator\Shop\Api;

abstract class ValidateObject {

    public function validateRequired($field, $value) {
        if ($value === null) {
            throw new ValidationRequiredException($field);
        }

        return true;
    }

    public function validateInt($field, $value) {
        $validated = filter_var($value, FILTER_VALIDATE_INT);

        if ($validated === false) {
            throw new ValidationTypeException($field, "int", $value);
        }

        return $validated;
    }

    public function validateArray($field, $value) {
        if (!is_array($value)) {
            throw new ValidationTypeException($field, "array", $value);
        }

        return $value;
    }

    public function validateString($field, $value) {
        if (!is_string($value)) {
            throw new ValidationTypeException($field, "string", $value);
        }

        return $value;
    }

    public function validateSetString($field, $value) {
        $this->validateString($field, $value);
        $this->$field = $value;
        return $this;
    }

    public function validateFloat($field, $value) {
        $validated = filter_var($value, FILTER_VALIDATE_FLOAT);

        if ($validated === false) {
            throw new ValidationTypeException($field, "float", $value);
        }

        return $validated;
    }

    public function validateSetFloat($field, $value) {
        $validated = $this->validateFloat($field, $value);
        $this->$field = $validated;
        return $this;
    }

    public abstract function validate();
}
