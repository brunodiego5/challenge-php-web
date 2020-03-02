<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/res/styles/global.css">
  <link rel="stylesheet" href="/res/styles/default.css">
  <link rel="stylesheet" href="/res/styles/header.css">
  <title>Challenge PHP Web</title>
</head>
<body>
  <header class="container">
    <div class="content"> 
      <nav>
        <a href="/">
          <img src="/res/img/manager_orange.svg" alt="">
        </a>
        <ul>
          <li>
            <a href="/users" class="menu">Usuários</a>
          </li>
          <li>
            <a href="/customers" class="menu">Clientes</a>
          </li>
        </ul>
      </nav>
      <aside>
        <div class="profile">
          <div>
            <strong><?php echo getUserName(); ?></strong>
            <a href="/logout"><span>sair do sistema</span></a>
          </div>
        </div>
      </aside>
    </div>
  </header>
  