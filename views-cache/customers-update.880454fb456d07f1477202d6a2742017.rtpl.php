<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Castastrar Cliente
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <!-- form start -->
        <form role="form" action="/customers/<?php echo htmlspecialchars( $customer["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="name">Nome</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" value="<?php echo htmlspecialchars( $customer["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="date_birth">Data de Nascimento</label>
              <input type="text" class="form-control" id="date_birth" name="date_birth" placeholder="Digite a data de nascimento" value="<?php echo htmlspecialchars( $customer["date_birth"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="cpf">CPF</label>
              <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o cpf" value="<?php echo htmlspecialchars( $customer["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="rg">RG</label>
              <input type="text" class="form-control" id="rg" name="rg" placeholder="Digite o rg" value="<?php echo htmlspecialchars( $customer["rg"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="phone">Telefone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o phone" value="<?php echo htmlspecialchars( $customer["phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>

        <!---->
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
        <!-- /.box-body -->
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->