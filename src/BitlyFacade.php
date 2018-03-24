<?php

namespace Echowebid\Bitly;

use Illuminate\Support\Facades\Facade;

class BitlyFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'Bitly'; }
}