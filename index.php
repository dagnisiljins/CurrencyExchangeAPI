<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';
use App\Api;
use App\Convert;

$convertFrom = readline('Enter the currency to convert from: ');
$convertTo = readline('Enter the currency to convert to: ');

$apiFetcher = new Api();
$conversion = $apiFetcher->search($convertFrom, $convertTo);

$initialRate = $conversion->initial;
$convertedRate = $conversion->converted;

$amountToConvert = readline('Enter the amount to convert: ');

$converter = new Convert((float)$amountToConvert, $initialRate, $convertedRate);

$convertedAmount = $converter->getCalculatedAmount();
echo 'Converted amount is: ' . $convertTo . ' ' . round($convertedAmount, 2) . PHP_EOL;







