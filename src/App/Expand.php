<?php

namespace Echowebid\Bitly\App;

class Expand extends Api 
{
    public function __construct($args)
    {
        parent::__construct();
        $query = ['access_token' => $this->access_token, 'shortUrl' => $args];
        $this->options = [
            CURLOPT_URL => $this->endpoint . 'v3/expand?' . http_build_query($query)
        ];
        $this->sendResponse();
        $this->method = 'expand';
    }
}