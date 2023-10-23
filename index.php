<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';
use App\Api;

$convertFrom = readline('Enter the currency to convert from: ');
$amountToConvert = readline('Enter the amount to convert: ');
$convertTo = readline('Enter the currency to convert to: ');

$apiFetcher = new Api();
$conversion = $apiFetcher->search((float)$amountToConvert, $convertFrom, $convertTo);
//var_dump($conversion);

$convertedAmount = $conversion->getCalculatedAmount();
echo 'Converted amount is: ' . $convertTo . ' ' . round($convertedAmount, 2) . PHP_EOL;







