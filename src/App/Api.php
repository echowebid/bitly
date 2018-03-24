<?php

namespace Echowebid\Rajaongkir\App;

use Exception;

abstract class Api 
{
    protected $access_token;
    protected $data;
    protected $endpoint;
    protected $method;
    protected $url;
    protected $parameter = [];

    public function __construct()
    {
        $this->endpoint = config('bitly.endpoint', 'http://rajaongkir.com/api/starter');
        $this->access_token = config('bitly.access_token', '1q2w3e4r5t6y7u8i9o0p');
    }

    public function sendResponse(){

        $curl = curl_init();

        $curl_options = [
            CURLOPT_ENCODING           => "",
            CURLOPT_MAXREDIRS          => 10,
            CURLOPT_RETURNTRANSFER     => true,
            CURLOPT_SSL_VERIFYPEER     => 0,
            CURLOPT_TIMEOUT            => 30
        ];
        
        if ( $this->options && is_array($this->options) )
        {
            foreach( $this->options as $key => $val)
            {
                $curl_options[$key] = $val;
            }
        }
        
        curl_setopt_array($curl, $curl_options);
        $response = curl_exec($curl);
        $curl_error = curl_error($curl);
        curl_close($curl);

        if ($curl_error) 
        {
            throw new Exception($curl_error, 1);    
        } else 
        {
            $data = json_decode($response, true);
            $this->data = json_decode($response, true);
            return $this;
        }
    }

    public function count()
    {
        if ( empty($this->data) )
            $this->data = $this->getData()->data;

        return count($this->data);
    }
  
    public function get()
    {
        return $this->data;
    }
}
