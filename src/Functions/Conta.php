<?php

namespace BeeDelivery\ItBank\Functions;

use Exception;
use BeeDelivery\ItBank\Exceptions\ContaException;
use BeeDelivery\ItBank\Connection;

class Conta
{

    public $http;
    protected $conta;

    public function __construct($apiKey)
    {
        $this->http = new Connection($apiKey);
    }


    /**
     * Cria uma conta.
     *
     * @see https://itbank.docs.apiary.io/#reference/0/contas/criar-um-conta
     * @param Array $conta
     * @return Boolean
     */
    public function create($conta)
    {
        return $this->http->post('conta', ['json' => $conta]);
    }

    /**
     * Recupera um conta pelo id.
     *
     * @see https://itbank.docs.apiary.io/#reference/0/contas/recuperar-um-conta
     * @param String $id
     * @return json
     */
    public function find($id)
    {
        return $this->http->get('conta' .'/'. $id);
    }


    /**
     * Faz merge nas informações do conta.
     *
     * @param Array $conta
     * @return Array
     */
    public function setConta($conta)
    {
        try {

            if (!$this->conta_valid($conta) ) {
                throw ContaException::invalidConta();
            }

            $this->conta = array(
                'name'                  => '',
                'email'                 => '',
                'password'              => '',
                'password_confirmation' => ''
            );

            $this->conta = array_merge($this->conta, $conta);
            return $this->conta;

        } catch (Exception $e) {
            return 'Erro ao definir o conta. - ' . $e->getMessage();
        }
    }

    /**
     * Verifica se os dados do conta são válidos.
     *
     * @param array $conta
     * @return Boolean
     */
    public function conta_valid($conta)
    {
        return !(empty($conta['name']) OR empty($conta['email']) OR empty($conta['password']) OR empty($conta['password_confirmation']));
    }
}
