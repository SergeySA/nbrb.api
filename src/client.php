<?php
namespace App;

class Client {

    protected $transport;
    protected $sourceFormat;

    /**
     * Client constructor.
     * @param $transport
     * @param $sourceFormat
     */
    public function __construct(ITransport $transport, ISourceFormat $sourceFormat)
    {
        $this->transport = $transport;
        $this->sourceFormat = $sourceFormat;
    }

    public function getCurrencies($cur_id = null)
    {
        $output = $this->transport->getContent('Currencies', $cur_id);

        return $this->sourceFormat->decode($output);
    }

    public function getRates($cur_id = null, $parameters = [])
    {
        $output = $this->transport->getContent('Rates', $cur_id, $on_date, $periodicity);

        return $this->sourceFormat->decode($output);

//        $c = curl_init('http://www.nbrb.by/API/ExRates/Rates/'.$cur_id . '?Periodicity=0');
//
//        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
//        $res = curl_exec($c);
//
//        return $res = json_decode($res, false);

    }

    public function getDynamicRates($cur_id, $start_date, $end_date)
    {
        $output = $this->transport->getContent('Rates/Dynamics', $cur_id);
    }

}
