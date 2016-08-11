SOBRE ESTE DIRETÓRIO
====================

Por padrão, esta aplicação está configurada para carregar todos os arquivos de configurações no caminho.
`./config/autoload/{,*.}{global,local}.php`. Isto permite que sejam definidas configurações de aplicação gerais,
que podem ser sobrescritas por configurações específicas de módulos, bem como manter configurações privadas (como
credenciais de banco de dados) fora do controle de versão.

#####Arquivo `global.php`
O arquivo `global.php` armazena as configurações que são agnósticas com relação ao ambiente. Este arquivo é incluído 
no controle de versão, portanto não deve ser utilizado para definir informações privadas da aplicação.

#####Arquivos `env.{ambiente}.php`
Os arquivos neste formato armazenam as configurações de ambiente globais do sistema. Apenas o arquivo correspondente ao
ambiente atual é carregado; por exemplo, se `APPLICATION_ENV = development`, então apenas o arquivo 
`env.development.php` será carregado pelo sistema.

Estes arquivos também são incluídos no controle de versão; não os utilize para guardar informações privadas da aplicação.

#####Arquivo `local.php`
O arquivo `local.php` armazena as configurações privadas de aplicação e ambiente. O mesmo não é incluído no controle
de versão, portanto é necessário gerá-lo manualmente após o checkout.

Consulte a documentação em `docs/gerar-config.md` para mais informações sobre a geração desse arquivo.  