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
2. Fazer o download das dependências *back-end*: ```composer install```
3. Fazer o download das dependências *front-end*: ```npm install && npm run dev```
4. Fazer a cópia do arquivo .env.example com o nome .env para a raíz do projeto: ```cp .env.example .env```
5. Gerar uma chave aleatória de segurança: ```php artisan key:generate```
6. Configurar o banco de dados no arquivo .env
7. Rodar as migrações: ```php artisan migrate```
