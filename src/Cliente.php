<?php

namespace BeeDelivery\ItBank\src;



use BeeDelivery\ItBank\Connection;

class Cliente
{

    public $http;
    protected $cliente;

    public function __construct($token, $conta)
    {
        $this->http = new Connection($token, $conta);
    }

    /**
     * Efetua assinatura de um novo cliente ItBank.
     *
     * @see https://www.itbank.com.br/Help/Api/POST-api-v5-Assinar
     * @param Array cliente
     * @return Array
     */
    public function criar($cliente)
    {
        $cliente = $this->setCliente($cliente);
        return $this->http->post('api/v5/Assinar', ['form_params' => $cliente]);
    }

    /**
     * Atualiza o cliente ItBank.
     *
     * @see https://www.itbank.com.br/Help/Api/PUT-api-v4-Cliente
     * @param Array cliente
     * @return Array
     */
    public function atualizar($cliente)
    {
        return $this->http->put('api/v4/Cliente', ['form_params' => $cliente]);
    }

    /**
     * Pesquisa um cliente ItBank.
     *
     * @see
     * @param Array cliente
     * @return Array
     */
    public function pesquisar($termo)
    {
        return $this->http->get('api/v3/Transferencia/ClienteDestino?filtro=' . $termo );
    }

    /**
     * Lista os usuarios do cliente ItBank.
     *
     * @see https://www.itbank.com.br/Help/Api/GET-api-v2-UsuarioCliente
     * @return Array
     */
    public function usuarios()
    {
        return $this->http->get('api/v2/UsuarioCliente');
    }

    /**
     * Lista os documentos pendentes do cliente ItBank.
     *
     * @see https://www.itbank.com.br/Help/Api/GET-api-v4-Cliente-DocumentosPendentes_contaBancariaId
     * @return Array
     */
    public function documentosPendentes()
    {
        return $this->http->get('api/v4/Cliente/DocumentosPendentes');
    }

    /**
     * Envia o documento do cliente ItBank.
     *
     * @see https://www.itbank.com.br/Help/Api/PUT-api-v4-Cliente-DocumentosPendentes
     * @return Array
     */
    public function documentoEnviar($documento)
    {
        return $this->http->put('api/v4/Cliente/DocumentosPendentes', ['form_params' => $documento]);
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

            if ( ! $this->cliente_is_valid($cliente) ) {
                throw new \Exception('Dados inválidos.');
            }

            $this->cliente = array(
                'Nome'                  => '',
                'Documento'             => '',
                'TipoPessoa'            => '',
                'Email'                 => '',
                'Endereco'              => '',
                'Telefones'             => '',
                'Usuario'               => '',
                'DataNascimento'        => '',
                'UrlNotificacao'        => '',
                'InscricaoEstadual'     => '',
                'InscricaoMunicipal'    => '',
                'Cupom'                 => ''
            );

            $this->cliente = array_merge($this->cliente, $cliente);
            return $this->cliente;

        } catch (\Exception $e) {
            return 'Erro ao definir o cliente. - ' . $e->getMessage();
        }
    }

    /**
     * Verifica se os dados da transferência são válidas.
     *
     * @param array $cliente
     * @return Boolean
     */
    public function cliente_is_valid($cliente)
    {
        return ! (
            empty($cliente['Nome']) OR
            empty($cliente['Documento']) OR
            empty($cliente['TipoPessoa']) OR
            empty($cliente['Email']) OR
            empty($cliente['Endereco']) OR
            empty($cliente['Telefones']) OR
            empty($cliente['Usuario'])
        );
    }
}

