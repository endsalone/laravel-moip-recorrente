<?php

namespace Moip\Recorrente\Http;


use Moip\Recorrente\Interfaces\iRequest;

class Request implements iRequest
{
    public function get($url)
    {
        $header = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode('HREDFJPZ7843NCVOZK8QUPUXJK9FOHY4:DGWBJYOBMMA8WQDRDFMJEJXKQFRW5CPGRRQ3KA27')
        ];
        //INICIAR CURL
        $curl = curl_init();
        //URL OPTIONS
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:25.0) Gecko/20100101 Firefox/25.0");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        //EXECUTA CURL
        $json = curl_exec($curl);
        //STATUS CODE
        $status = curl_getinfo($curl);

        //FECHA O CURL
        curl_close($curl);
        $array = array();
        $array['content'] = $json;
        $array['status'] = $status['http_code'];
        return ($array);
    }

    public function post($url, $data)
    {
        // TODO: Implement post() method.
    }

    public function put($url, $data)
    {
        // TODO: Implement put() method.
    }

    public function delete($url, $data)
    {
        // TODO: Implement delete() method.
    }
}
