<?php

namespace BeeDelivery\ItBank\Functions;

use Exception;
use BeeDelivery\ItBank\Exceptions\ClienteException;
use BeeDelivery\ItBank\Connection;

class Cliente
{

    public $http;
    protected $cliente;

    public function __construct($apiKey)
    {
        $this->http = new Connection($apiKey);
    }

    /**
     * Recupera todos os clientes
     *
     * @see https://itbank.docs.apiary.io/#reference/0/clientes/listar-clientes
     * @param String name
     * @return json
     */
    public function all($page = null)
    {
        return $this->http->get('cliente?&page='.$page);
    }

    /**
     * Cria um novo cliente.
     *
     * @see https://itbank.docs.apiary.io/#reference/0/clientes/criar-um-cliente
     * @param Array $cliente
     * @return Boolean
     */
    public function create($cliente)
    {
        $cliente = $this->setCliente($cliente);
        return $this->http->post('cliente', ['form_params' => $cliente]);
    }

    /**
     * Recupera um cliente pelo id.
     *
     * @see https://itbank.docs.apiary.io/#reference/0/clientes/recuperar-um-cliente
     * @param String $id
     * @return json
     */
    public function find($id)
    {
        return $this->http->get('cliente' .'/'. $id);
    }


    /**
     * Faz merge nas informações do cliente.
     *
     * @param Array $cliente
     * @return Array
     */
    public function setCliente($cliente)
    {
        try {

            if (!$this->cliente_valid($cliente) ) {
                throw ClienteException::invalidClient();
            }

            $this->cliente = array(
                'nome'                  => '',
                'cpfcnpj'               => '',
                'banco'                 => '',
                'agencia'               => '',
                'agencia_dv'            => '',
                'conta'                 => '',
                'conta_dv'              => '',
                'cod_operacao'          => '',
                'tipo_conta'            => '',
                'obs'                   => '',
                'referencia_externa'    => '',
            );

            $this->cliente = array_merge($this->cliente, $cliente);
            return $this->cliente;

        } catch (Exception $e) {
            return 'Erro ao definir o cliente. - ' . $e->getMessage();
        }
    }

    /**
     * Verifica se os dados do cliente são válidos.
     *
     * @param array $cliente
     * @return Boolean
     */
    public function cliente_valid($cliente)
    {
        return !(empty($cliente['nome']) OR empty($cliente['cpfcnpj']) OR empty($cliente['banco']) OR empty($cliente['agencia']) OR empty($cliente['conta']) OR empty($cliente['conta_dv']) OR empty($cliente['tipo_conta']));
    }
}
