
## Rodar os comandos

* **Instala as dependencias do laravel**

    composer install

* **Retirar a extensao '.example' do arquivo '.env.example' dentro do projeto**

* **Tem que criar a base de dados no banco de dados e apontar ela no '.env'**

* **Tem que configurar o '.env' com as credenciais do banco de dados para rodar as migrations**

* **Gera a chave de acesso e coloca no .env**

    php artisan key:generate

* **Limpa as tabelas e roda as seed**

    php artisan migrate:fresh --seed

* **Instala as chaves do laravel**

    php artisan passport:install

* **Rodar o comando e colocar 'client secret' na chave**

    php artisan passport:client --personal

* **Roda o projeto**

    php artisan serve


# Padrao de nomeclaturas
#### Nome das pastas 
- camelCase Ex: (**nomeDaPasta**)

#### Nome dos arquivos 
- PascalCase Ex: (**NomeDoArquivo**)

#### Variaveis 
- camelCase Ex: (**nomeDaVariavel**)

#### Nome das Classes 
- PascalCase EX: (**NomeDaClasse**)

#### Nome das tabelas e colunas
- snake_case no plural EX: (**nome_da_tabelas**)
- snake_case EX: (**nome_da_coluna**)
- snake_case para a fk adicionar o sufixo 'id' EX: (**nome_da_coluna_'id'**)
