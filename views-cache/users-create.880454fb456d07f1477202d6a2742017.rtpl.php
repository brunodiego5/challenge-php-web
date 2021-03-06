<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">

  <div class="header-page">
    <h1 class="title">Cadastro de usuário</h1>
    <div class="controls">
      <a href="/users" class="button-link">
        <i class="material-icons">keyboard_backspace</i>
        <span>Voltar</span>
      </a>

      <button class="button-save" type="submit" form="form">
        <i class="material-icons">save</i>
        <span>Salvar</span> 
      </button>        
    </div>
  </div>

  <div class="panel">
        <form action="/users/create" method="post" id="form">
          <label for="name">Nome</label>
          <input type="text" id="name" name="name" placeholder="Digite o nome" required>
          <div class="row">
            <div class="column">
              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Digite o e-mail" required>
              </div>
            </div>
            
            <div class="column">
              <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" placeholder="Digite a senha" required>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  