<?php

namespace Moip\Recorrente\Http;


use Moip\Recorrente\Recorrente;

class Request extends Recorrente
{

    /**
     * CRIAR HEADER DE AUTENTICACAO
     * @return array
     */
    protected function header()
    {
        parent::__construct();
        return [
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode($this->token . ':' . $this->key)
        ];
    }

    /**
     * HTTP GET
     * @param $url
     * @return array
     */
    public function get($url)
    {
        //INICIAR CURL
        $curl = curl_init();
        //URL OPTIONS
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->header());
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
        $array['content'] = json_decode($json);
        $array['status'] = $status['http_code'];
        return $array;
    }

    /**
     * HTTP POST
     * @param $url
     * @param $data
     * @return array
     */
    public function post($url, $data)
    {
        //INICIAR CURL
        $curl = curl_init();
        //CRIA JSON
        $json_data = json_encode($data);
        //URL OPTIONS
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->header());
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:25.0) Gecko/20100101 Firefox/25.0");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($curl,CURLOPT_POST, true);
        curl_setopt($curl,CURLOPT_POSTFIELDS, $json_data);
        //EXECUTA CURL
        $json = curl_exec($curl);
        //STATUS CODE
        $status = curl_getinfo($curl);

        //FECHA O CURL
        curl_close($curl);
        $array = array();
        $array['content'] = json_decode($json);
        $array['status'] = $status['http_code'];
        return $array;
    }

    /**
     * HTTP PUT
     * @param $url
     * @param $data
     * @return array
     */
    public function put($url, $data)
    {
        //INICIAR CURL
        $curl = curl_init();
        //CRIAR JSON
        $data_json = json_encode($data);
        //URL OPTIONS
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->header());
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:25.0) Gecko/20100101 Firefox/25.0");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
        //EXECUTA CURL
        $json = curl_exec($curl);
        //STATUS CODE
        $status = curl_getinfo($curl);

        //FECHA O CURL
        curl_close($curl);
        $array = array();
        $array['content'] = json_decode($json);
        $array['status'] = $status['http_code'];

        return $array;
    }

    /**
     * HTTP DELETE
     * @param $url
     * @return array
     */
    public function delete($url)
    {
        //INICIAR CURL
        $curl = curl_init();
        //URL OPTIONS
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->header());
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:25.0) Gecko/20100101 Firefox/25.0");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        //EXECUTA CURL
        $json = curl_exec($curl);
        //STATUS CODE
        $status = curl_getinfo($curl);

        //FECHA O CURL
        curl_close($curl);
        $array = array();
        $array['content'] = json_decode($json);
        $array['status'] = $status['http_code'];

        return $array;
    }
}
