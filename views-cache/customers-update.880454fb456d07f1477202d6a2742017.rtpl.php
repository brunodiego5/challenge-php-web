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
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o cpf" value="<?php echo htmlspecialchars( $customer["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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
                <label for="phone">Telefone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o phone" value="<?php echo htmlspecialchars( $customer["phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>      
            </div>      
        </form>

        <!--
        <div class="box-header">
          <a href="/customers/<?php echo htmlspecialchars( $customer["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/addresses/create" class="btn btn-success">Cadastrar Endereço</a>
        </div>

        <div class="box-body no-padding">
          <table class="table table-striped">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Endereço</th>
                <th>Complemento</th>
                <th>cidade</th>
                <th>Estado</th>
                <th>País</th>
                <th>CEP</th>
                <th style="width: 140px">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <?php $counter1=-1;  if( isset($addresses) && ( is_array($addresses) || $addresses instanceof Traversable ) && sizeof($addresses) ) foreach( $addresses as $key1 => $value1 ){ $counter1++; ?>
              <tr>
                <td><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["address"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["complement"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["state"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["country"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td><?php echo htmlspecialchars( $value1["zip_code"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                <td>
                  <a href="/customers/<?php echo htmlspecialchars( $customer["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/addresses/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                  <a href="/customers/<?php echo htmlspecialchars( $customer["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/addresses/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        -->
      </div>
    </div>
  