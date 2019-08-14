<?php
namespace App;

class Client {

public function getCurrencies($cur_id = null){
    //header("Authorization: HX38jW44DZfLvIp_G3vPPsWPCvnpqm09yKmdOlX5DiV_5oYb");
    //$url = 'https://api.currentsapi.services/v1/latest-news?' . "language=en&apiKey=HX38jW44DZfLvIp_G3vPPsWPCvnpqm09yKmdOlX5DiV_5oYb";
    //$c = curl_init($url);

    $c = curl_init('http://www.nbrb.by/API/ExRates/Currencies/'.$cur_id);

    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($c);

    return $res = json_decode($res, false);

}
    public function getRates($cur_id = null){

        $c = curl_init('http://www.nbrb.by/API/ExRates/Rates/'.$cur_id . '?Periodicity=0');

        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($c);

        return $res = json_decode($res, false);

    }

}
