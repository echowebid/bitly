<?php

return [
    
    /**
     * Bitly Endpointapi
     * https://dev.bitly.com/
     */
    
    "endpoint" => env("BITLY_ENDPOINT", "https://api-ssl.bitly.com/"),

    /**
     * Bitly Generic Access Token
     * https://api.bitly.com/
     */
    
    "access_token" => env("BITLY_ACCESSTOKEN", ""),

];
