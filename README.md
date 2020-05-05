# ItBank Laravel

Pacote de integração com itbank.com.br

## Início

Para começar, é necessário que você crie sua conta em https://www.itbank.com.br/

## Instalando

Instale com [composer](https://getcomposer.org/):

```bash
composer require bee-delivery/itbank
```

## Como utilizar?


[Documentação API Pague Veloz](https://www.itbank.com.br/Help)

### Novo Cliente

Criando uma conta na Pague Veloz. Veja em [DOC Pague Veloz - Novo Cliente](https://www.itbank.com.br/Help/Api/POST-api-v5-Assinar)

```
$cliente = [
    'Nome'                  => 'JOHN DOE',
    'Documento'             => '00000000000',
    'TipoPessoa'            => 1,
    'Email'                 => 'exemplo@exemplo.com.br',
    'Endereco'              => [
        'CEP'               => '00000000',
        'Bairro'            => 'BAIRRO',
        'Logradouro'        => 'LOGRADOURO',
        'Numero'            => '123',
        'Complemento'       => ''
    ],
    'Telefones'             => [
        [
            'Numero'        => '00900000000',
            'Tipo'          =>  4
        ]
    ],
    'Usuario'               => [
        'Nome'              => 'JOHN DOE',
        'Email'             => 'exemplo@exemplo.com.br',
        'Senha'             => 'Senha123456789',
        'ConfirmacaoSenha'  => 'Senha123456789,
    ],
    'DataNascimento'        => '01/01/1990',
    'UrlNotificacao'        => '',
    'InscricaoEstadual'     => '',
    'InscricaoMunicipal'    => '',
    'Cupom'                 => 'cupom_fornecido_pague_veloz'
];

$response = ItBank::cliente($email, $token)->criar($cliente);
```


## Licença

Sinta-se a vontade em nos ajudar. Faça um PR :)

GNU General Public License v3
