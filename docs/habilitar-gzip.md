HABILITANDO COMPRESSÃO GZIP
===========================
Normalmente, é uma boa ideia habilitar a compressão de arquivos usando Gzip/DEFLATE no servidor. Os arquivos enviados
para o cliente ficam menores, gerando uma grande economia de banda ao servir arquivos de texto (documentos HTML, 
assets JS, CSS, fontes, ícones, etc.)

No entanto, tenha em mente que a compressão desses arquivos tem um custo de processamento para o servidor. Normalmente,
o custo é irrisório; porém, se um dos gargalos da sua aplicação é o uso de CPU, pode ser necessário desabilitar esta
funcionalidade.

Apache 2.4 (httpd.conf)
-----------------------
No Apache 2.4, é necessário habilitar 3 módulos no arquivo `httpd.conf` (ou arquivo similar de configuração do Apache)
para que a compressão funcione:

- `LoadModule deflate_module modules/mod_deflate.so`
- `LoadModule headers_module modules/mod_headers.so`
- `LoadModule filter_module modules/mod_filter.so`

E incluir a seguinte diretiva de configuração:

    <IfModule mod_deflate.c>
        AddOutputFilterByType DEFLATE application/javascript
        AddOutputFilterByType DEFLATE application/rss+xml
        AddOutputFilterByType DEFLATE application/vnd.ms-fontobject
        AddOutputFilterByType DEFLATE application/x-font
        AddOutputFilterByType DEFLATE application/x-font-opentype
        AddOutputFilterByType DEFLATE application/x-font-otf
        AddOutputFilterByType DEFLATE application/x-font-truetype
        AddOutputFilterByType DEFLATE application/x-font-ttf
        AddOutputFilterByType DEFLATE application/x-javascript
        AddOutputFilterByType DEFLATE application/xhtml+xml
        AddOutputFilterByType DEFLATE application/xml
        AddOutputFilterByType DEFLATE font/opentype
        AddOutputFilterByType DEFLATE font/otf
        AddOutputFilterByType DEFLATE font/ttf
        AddOutputFilterByType DEFLATE image/svg+xml
        AddOutputFilterByType DEFLATE image/x-icon
        AddOutputFilterByType DEFLATE text/css
        AddOutputFilterByType DEFLATE text/html
        AddOutputFilterByType DEFLATE text/javascript
        AddOutputFilterByType DEFLATE text/plain
        AddOutputFilterByType DEFLATE text/xml
        DeflateCompressionLevel 9
    </IfModule>

Apache 2.4 (.htaccess)
----------------------
Alternativamente, caso os módulos estejam habilitados no servidor mas você não tenha acesso aos arquivos de
configuração do Apache (comum em hospedagens compartilhadas), adicione a seguinte diretiva no arquivo `.htaccess`
da sua aplicação:

    <IfModule mod_deflate.c>
        SetOutputFilter DEFLATE
        #Don't compress
        SetEnvIfNoCase Request_URI \.(?:gif|jpe?g|png)$ no-gzip dont-vary
        SetEnvIfNoCase Request_URI \.(?:exe|t?gz|zip|bz2|sit|rar)$ no-gzip dont-vary
        #Dealing with proxy servers
        <IfModule mod_headers.c>
            Header append Vary User-Agent
        </IfModule>
    </IfModule>
 