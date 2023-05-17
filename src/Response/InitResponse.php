<?php

namespace PriceInfo\Shop\Api\Response;

class InitResponse extends AbstractResponse {

    public function fromJson(array $json) {
        return (new InitResponse)
            ->withCurrencies($json["currencies"]);
    }

    private $currencies = [];

    public function withCurrency(string $currency) {
        $this->currencies[] = $currency;
        return $this;
    }

    public function withCurrencies(iterable $currencies) {
        foreach ($currencies as $currency) {
            $this->withCurrency($currency);
        }
        return $this;
    }

    public function createJson() {
        return [
            "currencies" => $this->currencies,
        ];
    }
}