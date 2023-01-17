<?php

namespace Pricegator\Shop\Api;

use JsonSerializable;

class Delivery extends ValidateObject implements JsonSerializable {

    protected $zone;
    protected $carriers;

    public function zone(Zone $zone) {
        $this->zone = $zone;
        return $this;
    }

    public function validate() {
        $this->validateRequired("zone", $this->zone);
    }

    public function carriers($carriers) {
        $this->validateArray("carriers", $carriers);

        foreach ($carriers as $key => $carrier) {
            if (!($carrier instanceof Carrier)) {
                throw new ValidationTypeException("carriers[$key]", "Carrier", $carrier);
            }
        }

        $this->carriers = $carriers;

        return $this;
    }

    public function jsonSerialize() {
        $this->validate();

        return [
            "zone" => $this->zone,
            "carriers" => $this->carriers,
        ];
    }
}
