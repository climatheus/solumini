<h2 align="center">Projeto - SoluMini</h2>


## :information_source: Sobre

Mais informações no arquivo: [solumini.md](https://github.com/climatheus/solumini/blob/main/solumini.md)

---

## :seedling: Requisitos Mínimos

PHP v7.4 x86 TS<br>
Composer v2.0.11<br>
Laravel v6.20.26<br>
Laravel UI v1.0<br>
Bootstrap v4.6.0<br>
NPM v6.9.0<br>
MySQL v5.7.24<br>

---

## :rocket: Tecnologias Utilizadas 

O projeto foi desenvolvido utilizando as seguintes tecnologias:

- [PHP](https://www.php.net/)
- [Bootstrap](https://getbootstrap.com)
- [Bootstrap Icons](https://icons.getbootstrap.com/)
- [CSS](https://www.w3schools.com/css/)
- [HTML](https://developer.mozilla.org/pt-BR/docs/Web/HTML)
- [MySQL](https://www.mysql.com/)
- [Laragon](https://laragon.org/)
- [Laravel](https://laravel.com/)

---

## :package: Como baixar o projeto

```bash
# Clonar o repositório
❯ git clone https://github.com/climatheus/solumini.git

# Entrar no diretório
❯ cd solumini
```

**Utilizando composer**

```bash
# Instalar as dependências do Laravel
❯ composer install
```
**Utilizando NPM**

```bash
# Instalar as dependências e compilar o front end
❯ npm install && npm run dev
```

**Criando o banco de dados**
```bash
# Para criar o comando de dados, execute o comando abaixo
❯ mysql -u <seu_usuario> -p <sua_senha> -e "create database solumini collate utf8_general_ci;"
```

**Pré-configurações antes de iniciar o projeto**
```bash
# Antes de iniciar o projeto, mude as credenciais do banco de após copiar 
❯ cp .env.example .env

# Após as credenciais estarem de acordo com seu banco de dados, execute as migrations para a criação das tabelas
❯ php artisan migrate

# No Laravel é necessário gerar a chave de encriptação com o seguinte comando
❯ php artisan key:generate
```

**Iniciando o projeto**
```bash
# Dentro da pasta do repositório (solumini), execute o comando abaixo e abra o endereço em seu navegador
❯ php artisan serve
```

---

## :link: Como contribuir

1. Faça o `fork` deste repositório
2. Crie uma branch com sua feature:
   - `$ git checkout -b minha_feature`
3. Confirme sua branch:
   - `$ git commit -m "feature: Meu novo recurso"`
4. Envie sua branch:
   - `$ git push origin minha_feature`
5. Ir em Pull Requests do projeto original e criar uma pull request com o seu commit

---

## :busts_in_silhouette: Contribuidores

 <p align="center">
  <a>
   <a href="https://github.com/climatheus">
    <img src="https://avatars.githubusercontent.com/u/46012263?v=4" title="Matheus Santos" width="80" height="80" style="border-radius: 40px">
  </a>
</p>

---

<h4 align="center">
  Feito com ❤️ por Matheus 👋️
</h4>
