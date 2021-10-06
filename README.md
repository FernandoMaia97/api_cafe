# API PHP Desafio Conves - Tipos de Café
API de tipos de café do Desafio Conves, feita em PHP Codeigniter.

## Configuração
Após realizar o clone ou o download, entre no diretório da aplicação.
Crie um banco chamado cafe no banco de dados (foi usado mysql) e importe a tabela está no arquivo cafe.sql

Altere as seguintes variáveis conforme o seu ambiente de desenvolvimento.

Altere a variável $config['base_url'] no arquivo config.php, essa variável contém a URL base na qual a API se encontra. Se estiver em máquina local, não esqueça de adicionar a pasta public.
```shell
/application/config/config.php
```
Exemplo, ajuste conforme a sua realidade:
```php
$config['base_url'] = 'http://localhost:8081/desafio_conves/public/';
```

Altere a variável $db['default'] no arquivo database.php, essa variável contém as informações para a conexão com o banco de dados.
```shell
/application/config/database.php
```
Exemplo, ajuste conforme a sua realidade:
```php
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => 'senha',
	'database' => 'cafe',
```

### Testes
Para testar os métodos do controller Cafe, que é o responsável pelas respostas da API, vá até o diretório public pelo terminal:

```shell
cd /public
```
Há alguns testes configurados: cadastro, cadastro sem parametro, pesquisa, pesquisa com string ao inves de ID e listagem de dados, baseados no código HTTP de resposta da API.

Para executar os testes você deve estar na pasta public via terminal e executar o comando com a sintaxe:

```shell
php index.php Testes teste_a_ser_executado
```

O nome dos testes disponíveis são: cadastro, cadastro_vazio, listar, pesquisar, pesquisar_nome.

O teste cadastro retornará Passou na linha de resultado se houver exito no cadastro e retorno do codigo 201. Ao rodar uma segunda vez, deverá retornar Falha por tentar cadastrar um mesmo tipo de café novamente (a API deve permitir apenas um café com o mesmo nome). Esse teste envia uma requisição POST para a API.

```shell
php index.php Testes cadastro
```

O teste cadastro_vazio retornará Passou na linha de resultado se houver retorno do codigo 400 por falta de parametros. Esse Teste envia requisição sem dados para a API.

```shell
php index.php Testes cadastro_vazio
```

O teste pesquisar retornará Passou na linha de resultado se houver retorno do codigo 200 ao encontrar o id 1 no banco (teste baseado no banco exportado). Esse Teste envia requisição GET de Pesquisa com o id 1 para a API.

```shell
php index.php Testes pesquisar
```

O teste pesquisar_nome retornará Passou na linha de resultado se houver retorno do codigo 400 ao mandar parametro String e não um Id numerico. Esse Teste envia requisição GET de Pesquisa com um nome para a API invés de um id (a API espera pesquisa apenas por ID).

```shell
php index.php Testes pesquisar_nome
```

O teste listar retornará Passou na linha de resultado se houver retorno do codigo 200 ao conseguir listar todos os tipos de café. Esse Teste envia requisição GET para a API.

```shell
php index.php Testes listar
```

### Usando a API

A API possui **3** endPoints, dois pelo verbo GET e um pelo verbo POST.
Exemplo de URL, use como base a URL do arquivo config.php:

Ao fazer uma requisição GET para o controller Cafe e o metodo tipos, deverá ser retornado todos os tipos de café cadastrados no formato de Json:
```php
GET:  http://localhost:8081/desafio_conves/public/cafe/tipos
```

Se houver sucesso na requisição, o retorno será um array de objetos com a seguinte estrutura:
```json
[
    {
        "id": "1",
        "nome": "Café Expresso",
        "descricao": "O café espresso (ou expresso, dependendo da preferência de escrita) é um dos principais tipos de café – e é a base de diversos outros. O nome “espresso” vem do italiano “espremido, pressionado”. Ele é feito em poucos segundos sob alta pressão de água na temperatura de consumo. Isso faz com que acumule muito sabor e intensidade"
    },
    {
        "id": "7",
        "nome": "Affogato",
        "descricao": "O affogato é mais uma sobremesa do que um drink, o que o torna especialmente delicioso, Consiste na mistura de uma boa colherada de sorvete de baunilha com uma ou duas doses de café espresso. Muitas pessoas discutem sua presença entre os tipos de café, dizendo que deveria ser considerado um doce.\n\nNo entanto, uma receita tão deliciosa simplesmente não poderia ficar de fora da lista. Além disso, há uma versão ainda mais animada da bebida que inclui uma dose de licor de amêndoas na mistura."
    }
]
```

Ao fazer uma requisição GET para o controller Cafe e o metodo tipos e variavel com id, deverá ser retornado o tipo de café pesquisado atribuido ao id pesquisado no formato de Json:
```php
GET:  http://localhost:8081/desafio_conves/public/cafe/tipos/7
```

Se houver sucesso na requisição, o retorno será um array com um unico objeto:
```json
[
    {
        "id": "7",
        "nome": "Affogato",
        "descricao": "O affogato é mais uma sobremesa do que um drink, o que o torna especialmente delicioso, Consiste na mistura de uma boa colherada de sorvete de baunilha com uma ou duas doses de café espresso. Muitas pessoas discutem sua presença entre os tipos de café, dizendo que deveria ser considerado um doce.\n\nNo entanto, uma receita tão deliciosa simplesmente não poderia ficar de fora da lista. Além disso, há uma versão ainda mais animada da bebida que inclui uma dose de licor de amêndoas na mistura."
    }
]
```

Ao fazer uma requisição POST para o controller Cafe e o metodo tipos, deverá ser enviado as variaveis "nome" e "descricao" no formato de formData:
```php
POST:  http://localhost:8081/desafio_conves/public/cafe/tipos/
```
Se houver sucesso no cadastro, o retorno será o codigo **HTTP 201**.
