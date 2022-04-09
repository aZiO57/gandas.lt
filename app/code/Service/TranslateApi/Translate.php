<?php

namespace Service\GetNewsFromApi;

use Model\News;

class Translate
{
    public function exec($content)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://deep-translate1.p.rapidapi.com/language/translate/v2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\r
    \"q\": \"$content\",\r
    \"source\": \"en\",\r
    \"target\": \"lt\"\r
}",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: deep-translate1.p.rapidapi.com",
                "X-RapidAPI-Key: 3c3064f2dbmshcdfdb287df153b7p1f532djsn3322b87a6292",
                "content-type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $content;
        } else {
            $response = json_decode($response);
            return $response->data->translations->translatedText;
        }
    }
}
