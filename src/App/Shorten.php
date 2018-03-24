<?php

namespace Echowebid\Bitly\App;

class Shorten extends Api 
{
    public function __construct($args)
    {
        parent::__construct();
        $query = ['access_token' => $this->access_token, 'longUrl' => $args];
        $this->options = [
            CURLOPT_URL => $this->endpoint . 'v3/shorten?' . http_build_query($query)
        ];
        $this->sendResponse();
    }
}