<?php

namespace Connecting;

class CurlConnect
{
    private $connect;

    public function __construct($host)
    {
        $curl = curl_init($host);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_NOBODY, 1);

        $content = curl_exec($curl);
        curl_close($curl);
        $connect = explode("\r\n",$content);

        $this -> connect = $connect;
    }

    public function getPrivateConnect()
    {
        return $this -> connect;
    }
}