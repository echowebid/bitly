<?php

namespace Echowebid\Bitly\App;

use Exception;

abstract class Api 
{
    protected $access_token;
    protected $data;
    protected $endpoint;
    protected $method;

    public function __construct()
    {
        $this->endpoint = config('bitly.endpoint', 'https://api-ssl.bitly.com/');
        $this->access_token = config('bitly.access_token', '1q2w3e4r5t6y7u8i9o0p');
        $this->method = 'shorten';
    }

    public function sendResponse(){

        $curl = curl_init();

        $curl_options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
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
            $response_decode = json_decode($response, true);
            if ($response_decode['status_code'] != 200)
            {
                throw new Exception($response_decode['status_txt'], 1);
            }
            $this->data = $response_decode;
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
        if ( $this->method == 'clicks' ) {
            return isset($this->data['data']['link_clicks']) ? $this->data['data']['link_clicks'] : 0;
        } elseif ( $this->method == 'expand' ) {
            return isset($this->data['data']['expand'][0]['long_url']) ? $this->data['data']['expand'][0]['long_url'] : null;
        } elseif ( $this->method == 'shorten' ) {
            return isset($this->data['data']['url']) ? $this->data['data']['url'] : '';
        }
        
        return null;
    }
}
