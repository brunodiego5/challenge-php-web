<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Castastrar Endereço para o cliente <?php echo htmlspecialchars( $customer["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <!-- form start -->
        <form role="form" action="/customers/<?php echo htmlspecialchars( $customer["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/addresses/create" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="address">Endereço</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Digite o Endereço">
            </div>
            <div class="form-group">
              <label for="complement">Complemento</label>
              <input type="text" class="form-control" id="complement" name="complement" placeholder="Digite o Complemento">
            </div>
            <div class="form-group">
              <label for="city">Cidade</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="Digite a cidade">
            </div>
            <div class="form-group">
              <label for="state">Estado</label>
              <input type="text" class="form-control" id="state" name="state" placeholder="Digite o Estado">
            </div>
            <div class="form-group">
              <label for="country">País</label>
              <input type="text" class="form-control" id="country" name="country" placeholder="Digite o país">
            </div>
            <div class="form-group">
              <label for="zip_code">CEP</label>
              <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Digite o CEP">
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