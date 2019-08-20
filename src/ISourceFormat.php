<?php


namespace App;


interface ISourceFormat
{
    public function decode($content);

    public function encode($data);
}