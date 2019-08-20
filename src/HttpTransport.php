<?php


namespace App;


class HttpTransport implements ITransport
{

    public function getContent($content, $cur_id = null, $dynamics = false)
    {
        $request = URL . $content . '/'. $cur_id . '?periodicity=0';

        $c = curl_init($request);
echo $request;
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($c);
echo $output;
        return $output;
    }
}