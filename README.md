# Avaliação Técnica - Projeto Peladas

### 🛠 Tecnologias

<h4 align="center">
    <a href="https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Installation">🔗 AdminLTE</a>
</h4>
<p align="center">🚀 Este pacote fornece uma maneira fácil de configurar rapidamente o AdminLTE v3 (admin dashboard & control panel theme) com o Laravel (6 ou superior).</p>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

### 🎲 Rodando a Solução

```bash
# Clone este repositório
$ git clone https://github.com/Brunoh19/projetoPeladas.git

# Acesse a pasta do projeto e rode o terminal/cmd

# Instale as dependências
$ npm composer install 

# Configure o arquivo .env
$ cp .env.example .env

#Importar o banco via arquivo:  
projeto_peladas.sql

# Executar arquivo para gerar registro de acesso
# Login: admin@admin.com
# Senha: admin

$ php artisan db:seed

#Acessar a rota de login
http://localhost/projetoPeladas/public/login
```
