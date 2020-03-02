<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Editar Endereço para o cliente <?php echo htmlspecialchars( $customer["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
    </h1>
  </section>
  
  <!-- Main content -->
  <section class="content">
  
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" action="/customers/<?php echo htmlspecialchars( $customer["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/addresses/<?php echo htmlspecialchars( $address["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="address">Endereço</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Digite o Endereço" value="<?php echo htmlspecialchars( $address["address"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
              <div class="form-group">
                <label for="complement">Complemento</label>
                <input type="text" class="form-control" id="complement" name="complement" placeholder="Digite o Complemento" value="<?php echo htmlspecialchars( $address["complement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
              <div class="form-group">
                <label for="city">Cidade</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Digite a cidade" value="<?php echo htmlspecialchars( $address["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
              <div class="form-group">
                <label for="state">Estado</label>
                <input type="text" class="form-control" id="state" name="state" placeholder="Digite o Estado" value="<?php echo htmlspecialchars( $address["state"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
              <div class="form-group">
                <label for="country">País</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Digite o país" value="<?php echo htmlspecialchars( $address["country"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
              </div>
              <div class="form-group">
                <label for="zip_code">CEP</label>
                <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Digite o CEP" value="<?php echo htmlspecialchars( $address["zip_code"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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