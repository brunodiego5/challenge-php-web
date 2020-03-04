<?php if(!class_exists('Rain\Tpl')){exit;}?>    <div class="container">
      <div class="header-page">
        <h1 class="title">Cadastro de cliente</h1>
        <div class="controls">
          <a href="/customers" class="button-link">
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
        <form action="/customers/create" method="post" id="form">
          <label for="name">Nome</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome">
          <div class="row">
            <div class="column">
              <div class="form-group">
                <label for="date_birth">Data de Nascimento</label>
                <input type="date" onkeypress="return dateMask(this, event);" class="form-control" id="date_birth" name="date_birth" placeholder="Digite a data de nascimento" required>
              </div>
            </div>
            <div class="column">
              <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o cpf">
              </div>
            </div>
            <div class="column">
              <div class="form-group">
                <label for="rg">RG</label>
                <input type="text" class="form-control" id="rg" name="rg" placeholder="Digite o rg">
              </div>
            </div>
            <div class="column">
              <div class="form-group">
                <label for="phone">Telefone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o phone">
              </div>
            </div>
        </form>
      </div>
    </div>