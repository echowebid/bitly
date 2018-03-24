<?php

namespace Echowebid\Bitly;

use Echowebid\Bitly\App\Clicks;
use Echowebid\Bitly\App\Expand;
use Echowebid\Bitly\App\Shorten;

class Bitly 
{
    public function Clicks($attr)
    {
        return new Clicks($attr);
    }
    
    public function Expand($attr)
    {
        return new Expand($attr);
    }

    public function Shorten($attr)
    {
        return new Shorten($attr);
    }
}