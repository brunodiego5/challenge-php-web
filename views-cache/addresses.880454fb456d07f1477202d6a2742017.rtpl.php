<?php if(!class_exists('Rain\Tpl')){exit;}?>
  <div class="container">
    <div class="header-page">
      <h2 class="title">Endereços</h2>
      <div class="controls">
        <a href="/customers/<?php echo htmlspecialchars( $customer["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/addresses/create" class="button-link">
          <i class="material-icons">add</i>
          <span>Novo</span>
        </a>
      </div>
    </div>


    <div class="panel">
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Endereço</th>
            <th>Complemento</th>
            <th>cidade</th>
            <th>Estado</th>
            <th>País</th>
            <th>CEP</th>
            <th class="column-actions-header">&nbsp;</th>
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
            <td class="column-actions">
              <a href="/customers/<?php echo htmlspecialchars( $customer["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/addresses/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="edit">Editar</a>
              <a href="/customers/<?php echo htmlspecialchars( $customer["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/addresses/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" class="delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs">Excluir</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

