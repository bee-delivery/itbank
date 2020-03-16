<?php

namespace BeeDelivery\ItBank;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;


class Connection {

    public $http;
    public $api_key;
    public $base_url;
    public $conta_id;

    public function __construct() {

        $this->base_url = config('itbank.base_url');
        $this->api_key  = config('itbank.api_key');
        $this->conta_id = config('itbank.conta_id');

        $this->http = new Client([
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer '.$this->api_key,
                'conta-id'      => $this->conta_id
            ]
        ]);

        return $this->http;
    }

    public function get($url)
    {

        try{
            $response = $this->http->get($this->base_url . $url);
            return [
                'code'     => $response->getStatusCode(),
                'response' => json_decode($response->getBody()->getContents())
            ];
        }catch (\Exception $e){

            return [
                'code'     => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }

        $response = $this->http->get($this->base_url . $url);
    }

    public function post($url, $params)
    {

        try{
            $response = $this->http->post($this->base_url . $url, $params);

            return [
                'code'     => $response->getStatusCode(),
                'response' => json_decode($response->getBody()->getContents())
            ];
        }catch (\Exception $e){

            return [
                'code'     => $e->getCode(),
                'response' => $e->getMessage()
            ];
        }
    }

    public function delete($url)
    {
        $response = $this->http->delete($this->base_url . $url);
        return json_decode($response->getBody()->getContents(), true);
    }

}
