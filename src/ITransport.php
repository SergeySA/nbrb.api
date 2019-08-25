<?php


namespace App;


interface ITransport
{
    public function getContent($content, $cur_id = null);
}