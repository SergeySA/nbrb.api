<?php


namespace App;


class HttpTransportRates implements ITransport
{
    protected $start_date;

    protected $periodicity;

    /**
     * HttpTransportRates constructor.
     * @param $start_date
     * @param $periodicity
     */
    public function __construct($start_date, $periodicity = 0)
    {
        $this->start_date = $start_date;
        $this->periodicity = $periodicity;
    }

    public function getContent($content, $cur_id = null)
    {
        $parameters = "?Periodicity={$this->periodicity}&onDate={$this->start_date}";
        $request = URL . $content . '/'. $cur_id . $parameters;

        $c = curl_init($request);
//echo $request;
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($c);
//echo $output;
        return $output;

    }
}