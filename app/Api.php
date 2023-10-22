<?php

declare(strict_types=1);
namespace App;

class Api
{

    private string $api;


    public function __construct()
    {
        $this->api = 'http://api.exchangeratesapi.io/v1/latest?access_key=4755858ee8f52d30b1b91c8d9c04a098&symbols=';

    }

    public function search(string $convertFrom, string $convertTo)
    {

        $url = $this->api . urlencode($convertFrom) . ',' . urlencode($convertTo);
        $data = json_decode(file_get_contents($url));

        if ($data !== null) {
            $conversion = new \stdClass();
            $conversion->initial = $data->rates->$convertFrom;
            $conversion->converted = $data->rates->$convertTo;

            return $conversion;

        }

        return null;
    }


}

//http://api.exchangeratesapi.io/v1/latest?access_key=4755858ee8f52d30b1b91c8d9c04a098&symbols=USD,AUD,CAD,PLN

