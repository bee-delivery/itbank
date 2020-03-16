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

        //Production
        //$this->base_url = config('itbank.base_url');
        //$this->api_key  = config('itbank.api_key');
        //$this->conta_id = config('itbank.conta_id');

        // Local
        $this->base_url = 'http://bank.local:8084/api/v1/';
        $this->api_key  = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJiZDMzMDhlNS1jMzBlLTQ3OTAtYTg5Ni1jZDdmZDNiOTEyNTQiLCJqdGkiOiI4Yjg4ZTVmOTk4ODQzYjdjYjE3YzQ1ZTgxMzZkYTQ2OTkxMDRhOTI3NzYyNzY3MmUyNGU3YTE2NzJjMjU0YmFiYmU4M2ZjZDdiZjJlY2UxZSIsImlhdCI6MTU4MzE3NTYxOSwibmJmIjoxNTgzMTc1NjE5LCJleHAiOjE2MTQ3MTE2MTksInN1YiI6ImYxODE3NjdjLTIxNGMtNDk2NS05OTQ4LWYzOTRlMDI3Y2UyYyIsInNjb3BlcyI6W119.ZcxbK-nxxyZWDc1ms8UbnEEv8aAcOFXU6O9Texc1N7gu1UiANA90ubSWZ-7iAyA2jVQ_BK8jKxVPnR41DMCYUDTfDcCcV-J-H8P6S8pckUj4WAJQjlteNoGDjrtFJULpPMv02c9Gj-Y2eQJxK5CPdWEx0wzKs_D5cG72UG5rJTX_52egG1Ei2ndES8Mrl1TKb22rZapHaN4V0_DWdLDiLvAFEGOJPK_qRjxUH3i50sPOyZg_pRtAofhjiYKV_NtVvozsa5CoEAo6JWt7tn0ymbkRmmk_tik8s5zflWBDSrWDnUuJftKqyxaqGa1fMVZgTO3rP2ZSkbcZqt1jLXvNrZ9ymivnBgroVBAAatpJ2f_SOGNCbO63SlsaEaJbXJkugPDhcxT8YEORy49PpAw-lE29ETmV2UlrwGxwXD3z_Dv8w3kG9HVCovOUi7kJj641nu8dG4zeFUjsi5q365FqUYNr7c9b411o-H-W3Qi-NWawOWOxcXluG2Z7eXeTRN4XoAUehyD5KNLmkL94qj46D57R-r5CzYd6SNNMfrWQKEzGV7Bey2aO5ksFU_GteK_J8w1mtrwfnJw1nhuUidSTpeXE-Pqbz_acLfI6fqIVxPE3-GZaCH2jzFXsfDAZfTi-NoTZUcCGo0mb5Ftms3A4A8iWlPyyLKqB1AIdYiSTDc0';
        $this->conta_id = 'abe98525-d5da-4f48-89fe-98011927a333';

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
