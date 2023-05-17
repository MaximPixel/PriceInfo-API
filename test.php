<?php

require "./vendor/autoload.php";

use PriceInfo\Shop\Api\Request\RequestBuilder;
use PriceInfo\Shop\Api\Response\ResponseBuilder;

$requestBuilder = new RequestBuilder;
$responseBuilder = new ResponseBuilder;

$requests = [
    $requestBuilder->createInitRequest(),
    $requestBuilder->createLimitRequest(0, 2),
    $requestBuilder->createLimitRequest(2, 3),
    $requestBuilder->createLimitRequest(5, 4),
    $requestBuilder->createLastIdRequest(11, 4),
    $requestBuilder->createSkuRequest([1, 2, 3, 4]),
];

$module = new \PriceInfo\Shop\Api\Test\TestPriceInfoModule;

foreach ($requests as $request) {
    $requestJson = json_encode($request);

    $request = $module->decodeRequestJson(json_decode($requestJson, true));

    $response = $responseBuilder->createResponse($module, $request);

    var_dump($requestJson);
    echo("\n");
    var_dump(json_encode($response));
    echo("\n");
    echo("\n");
}