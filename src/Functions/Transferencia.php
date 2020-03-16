<?php

namespace BeeDelivery\ItBank\Functions;

use BeeDelivery\ItBank\Connection;
use BeeDelivery\ItBank\Exceptions\TransferenciaException;
use Exception;

class Transferencia
{

    public $http;
    protected $transferencia;

    public function __construct($apiKey)
    {
        $this->http = new Connection($apiKey);
    }

    /**
     * Recupera todas as transferências
     *
     * @see https://itbank.docs.apiary.io/#reference/0/transferencias/listar-transferencias
     * @param String name
     * @return json
     */
    public function all($page = null)
    {
        return $this->http->get('transferencia?&page='.$page);
    }

    /**
     * Cria uma transferência.
     *
     * @see https://itbank.docs.apiary.io/#reference/0/transferencias/criar-uma-transferencia
     * @param Array $transferencia
     * @return Boolean
     */
    public function create($transferencia)
    {
        $transferencia = $this->setTransferencia($transferencia);
        return $this->http->post('transferencia', ['form_params' => $transferencia]);
    }

    /**
     * Recupera uma transferência pelo id.
     *
     * @see https://itbank.docs.apiary.io/#reference/0/transferencias/recuperar-uma-transferencia
     * @param String $id
     * @return json
     */
    public function find($id)
    {
        return $this->http->get('transferencia' .'/'. $id);
    }

    /**
     * Deleta uma transferência pelo id.
     *
     * @see https://itbank.docs.apiary.io/#reference/0/transferencias/excluir-uma-transferencia
     * @param String $transferencia_id
     * @return json
     */
    public function delete($transferencia_id)
    {
        return $this->http->delete('transferencia' .'/'. $transferencia_id);
    }

    /**
     * Faz merge nas informações da transferência.
     *
     * @param Array $transferencia
     * @return Array
     */
    public function setTransferencia($transferencia)
    {
        try {

            if (!$this->transferencia_valid($transferencia) ) {
                throw TransferenciaException::invalidTransferencia();
            }

            $this->transferencia = array(
                'cliente_id'            => '',
                'favorecido'            => '',
                'cpfcnpj'               => '',
                'banco'                 => '',
                'agencia'               => '',
                'agencia_dv'            => '',
                'conta'                 => '',
                'conta_dv'              => '',
                'cod_operacao'          => '',
                'tipo_conta'            => '',
                'valor'                 => '',
                'obs'                   => '',
                'referencia_externa'    => '',
            );

            $this->transferencia = array_merge($this->transferencia, $transferencia);
            return $this->transferencia;

        } catch (Exception $e) {
            return 'Erro ao definir a transferência. - ' . $e->getMessage();
        }
    }

    /**
     * Verifica se os dados da transferência são válidos.
     *
     * @param array $transferencia
     * @return Boolean
     */
    public function transferencia_valid($transferencia)
    {
        return !(
            empty($transferencia['favorecido']) OR empty($transferencia['cpfcnpj']) OR
            empty($transferencia['banco']) OR empty($transferencia['agencia']) OR
            empty($transferencia['conta']) OR empty($transferencia['conta_dv']) OR
            empty($transferencia['tipo_conta']) OR empty($transferencia['valor'])
        );
    }
}
