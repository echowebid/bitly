<?php

namespace Echowebid\Rajaongkir\App;

class Expand extends Api 
{
    protected $method = "post";

    public function __construct($args)
    {
        parent::__construct();
        $query = ['access_token' => $this->access_token, 'longUrl' => $agrs];
        $this->options = [CURLOPT_URL  => $this->endpoint . '/v3/?=' . http_build_query($query)];
        $this->getData();
    }
}