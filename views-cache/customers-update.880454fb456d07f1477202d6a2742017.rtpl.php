<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">

  <div class="header-page">
    <h1 class="title">Edição de cliente</h1>
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
        <form id="form" action="/customers/<?php echo htmlspecialchars( $customer["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <label for="name">Nome</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" value="<?php echo htmlspecialchars( $customer["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

          <div class="row">
            <div class="column">
              <div class="form-group">
                <label for="date_birth">Data de Nascimento</label>
                <input type="date" onkeypress="return dateMask(this, event);" class="form-control" id="date_birth" name="date_birth" placeholder="Digite a data de nascimento" value="<?php echo StrToDate($customer["date_birth"]); ?>" required>
              </div>      
            </div>      
            <div class="column">
              <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control cpf" id="cpf" name="cpf" placeholder="Digite o cpf" value="<?php echo htmlspecialchars( $customer["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>      
            </div>      
            <div class="column">
              <div class="form-group">
                <label for="rg">RG</label>
                <input type="text" class="form-control" id="rg" name="rg" placeholder="Digite o rg" value="<?php echo htmlspecialchars( $customer["rg"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>      
            </div>      
            <div class="column">
              <div class="form-group">
                <label for="phone">Celular</label>
                <input type="text" class="form-control smartphone_ddd_br" id="phone" name="phone" placeholder="Digite o phone" value="<?php echo htmlspecialchars( $customer["phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>      
            </div>      
        </form>
      </div>
    </div>
  