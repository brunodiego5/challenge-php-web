<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/res/styles/global.css">
  <link rel="stylesheet" href="/res/styles/login.css">

  <title>Log in</title>
</head>
<body>
<div class="wrapper">
  <div class="content">
    <img src="/res/img/manager_orange.svg" alt="Lock"/>
    <form action="/login" method="post">
      <Label>SEU E-MAIL</Label>
      <input type="text" placeholder="E-mail" name="email" required>

      <Label>SUA SENHA</Label>
      <input type="password" placeholder="Senha" name="password" required>
      <button type="submit">Entre</button>
    </form>
  </div>
</div>

</body>
</html>