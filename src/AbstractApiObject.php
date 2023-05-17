<?php

namespace PriceInfo\Shop\Api;

abstract class AbstractApiObject implements \JsonSerializable {

    abstract function createJson();

    public function validate($json) {}

    public function jsonSerialize() {
        $json = $this->createJson();
        $this->validate($json);
        return $json;
    }

    protected function assertArrayKeyType($array, $key, $types) {
        if (!array_key_exists($key, $array)) {
            throw new \Exception("Key '$key' is not defined");
        }

        return $this->assertVarType($array[$key], $key, $types);
    }

    protected function assertVarType($var, $varName, $types) {
        if (is_string($types)) {
            $types = [$types];
        } else if (!is_array($types)) {
            throw new \Exception("In argument 'types' string and array allowed only");
        }

        $varType = gettype($var);

        foreach ($types as $type) {
            if ($varType == $type || (is_object($var) && get_class($var) == $type)) {
                return true;
            }
        }

        throw new \Exception("Variable '$varName' type - $varType, allowed types - " . implode(",", $types));
    }
}