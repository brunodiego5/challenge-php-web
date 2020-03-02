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
        <form role="form" action="/customers/create" method="post">
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
              <label for="rg">Data de Nascimento</label>
              <input type="text" class="form-control" id="rg" name="rg" placeholder="Digite o rg" value="<?php echo htmlspecialchars( $customer["rg"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="phone">Data de Nascimento</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o phone" value="<?php echo htmlspecialchars( $customer["phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->