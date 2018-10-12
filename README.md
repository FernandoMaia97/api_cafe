# API PHP Desafio Conves - Tipos de Café
API de tipos de café do Desafio Conves, feita em PHP Codeigniter

## Configuração
Após realizar o clone ou o download, entre no diretório da aplicação.
Crie uma tabela chamada cafe no banco de dados e importe a tabela está no arquivo cafe.sql

Altere as seguintes variáveis conforme o seu ambiente de desenvolvimento.

Altere a variável $config['base_url'] no arquivo config.php, essa variável contém a URL base na qual a API se encontra. Se estiver em máquina local, não esqueça de adicionar a pasta public.
```shell
/application/config/config.php
```
Exemplo, ajuste conforme a sua realidade:
```php
$config['base_url'] = 'http://localhost:8081/desafio_conves/public/';
```

Altere a variável $db['default'] no arquivo database.php, essa variável contém as informações para a conexão com o bando de dados.
```shell
/application/config/database.php
```
Exemplo, ajuste conforme a sua realidade:
```php
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'cafe',
```


Altere a URL da API de tipos de café, para isso, altere a variável baseURL conforme o endereço da API.

Arquivo onde se localiza a variável baseURL
```javascript
/src/services/config.js
```
A baseURL deverá conter a URL base + o controller cafe da API, como no exemplo abaixo.
```javascript
baseURL : 'http://localhost:8081/desafio_conves/public/cafe/'
```

O layout foi feito com Boostrap, sendo utilizado o Boostrap e Jquery via CDN.

### Compilar e Executar
Rode o comando abaixo e abra o browser no endereço indicado. Padrão: http://localhost:8080/
```shell
npm run serve
```
