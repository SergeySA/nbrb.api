<?php


namespace Lib\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PageController

{
    public function show($id)
    {
        return new Response('from controller'. $id);
    }
}