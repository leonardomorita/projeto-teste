# Projeto Teste de Desenvolvimento

O projeto foi desenvolvido com o framework Laravel v8.52.0. Ele tem as seguintes funcionalidade:

- Listagem, cadastro, edição e remoção de profissão;
- Listagem, cadastro, edição e remoção de pessoa.

## Tecnologias Utilizadas

- Composer v2.1.3;
- Node v14.17.3;
- PHP v7.4.21;

## Instalação

1. Clonar o repositório: ```git clone https://github.com/leonardomorita/projeto-teste.git```
2. Entrar na pasta do projeto: ```cd projeto-teste```
3. Fazer o download das dependências *back-end*: ```composer install```
4. Fazer o download das dependências *front-end*: ```npm install && npm run dev```
5. Fazer a cópia do arquivo .env.example com o nome .env para a raíz do projeto: ```cp .env.example .env```
6. Gerar uma chave aleatória de segurança: ```php artisan key:generate```
7. Configurar o banco de dados no arquivo .env
8. Rodar as migrações: ```php artisan migrate```
9. Opcional: Rodar no servidor do Laravel: ```php artisan serve```
