<?php


namespace App;


class HttpTransportCurrency implements ITransport
{

    public function getContent($content, $cur_id = null)
    {
        $request = URL . $content . '/'. $cur_id;

        $c = curl_init($request);

        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($c);

        return $output;
    }
}