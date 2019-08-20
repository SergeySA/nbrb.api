<?php


namespace App;


class JsonSourceFormat implements ISourceFormat
{

    public function decode($output)
    {
var_dump(json_decode($output, false));
        return json_decode($output, false);
    }

    public function encode($data)
    {
        // TODO: Implement Encode() method.
    }
}