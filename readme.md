## Sistema do Herbário Municipal de São Leopoldo.

Sistema em desenvolvimento do Herbário Municipal de São Leopoldo para o registro virtual das exsicatas.

## Tecnologias utilizadas
- Laravel 5.7.7
- Materialize 1.0.0
- MySQL

## Objetivos

- **Desenvolvimento inicial das views**
- **Rules and Permissions**
- **CRUD dos Epítetos**
- **CRUD dos Gêneros**
- **CRUD das Famílias**
- **CRUD das Exsicatas**
- **Importação dos dados da tabela Excel**
- **Biblioteca de manipulação do zoom das imagens**
- **Importação de fotos para as exsicatas**
- **Geração de relatórios**
- **Geração de etiquetas**
- **QRCodes**
- **Fim**

## Instalação

- Baixe o repositório
- composer update
- Configure o database no arquivo .env
- php artisan migrate
- php artisan db:seed
- php artisan serve
