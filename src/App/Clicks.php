<?php

namespace Echowebid\Bitly\App;

class Clicks extends Api 
{
    public function __construct($args)
    {
        parent::__construct();
        $query = ['access_token' => $this->access_token, 'link' => $args];
        $this->options = [
            CURLOPT_URL => $this->endpoint . 'v3/link/clicks?' . http_build_query($query)
        ];
        $this->sendResponse();
        $this->method = 'clicks';
    }
}