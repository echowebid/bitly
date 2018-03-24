<?php

namespace Echowebid\Rajaongkir\App;

class Shorten extends Api 
{
    protected $method = "get";

    public function __construct($args)
    {
        parent::__construct();
        $query = ['access_token' => $this->access_token, 'longUrl' => $agrs];
        $this->options = [CURLOPT_URL  => $this->endpoint . '?=' . http_build_query($query)];
        $this->getData();
    }
}