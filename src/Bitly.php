<?php

namespace Echowebid\Bitly;

use Echowebid\Bitly\App\Expand;
use Echowebid\Bitly\App\Shorten;

class RajaOngkir 
{
    public function Shorten()
    {
        return new Shorten;
    }
    
    public function Expand()
    {
        return new Expand;
    }
}