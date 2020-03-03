<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">

  <div class="header-page">
    <h1 class="title">Gerenciando Usuários</h1>
    <div class="controls">
      <a href="/users/create" class="button-link">
        <i class="material-icons">add</i>
        <span>Cadastrar</span>
      </a>

      <form class="form-search">
        <i class="material-icons">search</i>
        <input class="search" type="text" placeholder="Buscar usuário">  
      </form>
      

    </div>
  </div>

  <div class="panel">
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
        <tr>
          <td><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td><?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          <td>
            <a href="/users/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
            <a href="/users/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

</div>