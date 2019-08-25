<?php


namespace App;


class JsonSourceFormat implements ISourceFormat
{

    public function decode($output)
    {
        return json_decode($output, false);
    }

    public function encode($data)
    {
        // TODO: Implement Encode() method.
    }
}