GERAR ARQUIVO DE CONFIGURAÇÃO LOCAL
===================================
Por padrão, o arquivo de configuração `config\autoload\local.php` não é incluído no controle de versão, por conter
configurações privadas da aplicação. É necessário gerá-lo manualmente, com a seguinte estrutura:

    <?php
    return [
        // Configuração de Base Path (URL base das requisições)
        'base_path' => [
            // Sufixo que deve ser acrescentado depois do hostname para formar a URL base da aplicação
            'suffix' => '/public'
        ],
        // Configurações do Doctrine
        'doctrine' => [
            'connection' => [
                'orm_default' => [
                    // Driver do Doctrine para banco MySQL
                    'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                    'params' => [
                        'host' => '',
                        'port' => '',
                        'user' => '',
                        'password' => '',
                        'dbname' => ''
                    ]
                ]
            ]
        ]
    ];