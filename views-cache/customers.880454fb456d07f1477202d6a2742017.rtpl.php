<?php if(!class_exists('Rain\Tpl')){exit;}?>  <div class="container">

    <div class="header-page">
      <h1 class="title">Gerenciando Clientes</h1>
      <div class="controls">
        <a href="/customers/create" class="button-link">
          <i class="material-icons">add</i>
          <span>Cadastrar</span>
        </a>

        <form action="/customers" class="form-search" id="formSearch">
          <i class="material-icons">search</i>
          <input class="search" type="text" placeholder="Buscar cliente <enter>" value="<?php echo htmlspecialchars( $search, ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="inputSearch" name="search">  
        </form>               

      </div>
    </div>

    <div class="panel">
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Celular</th>
            <th class="column-actions-header">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <?php $counter1=-1;  if( isset($customers) && ( is_array($customers) || $customers instanceof Traversable ) && sizeof($customers) ) foreach( $customers as $key1 => $value1 ){ $counter1++; ?>
          <tr>
            <td><?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo formatDate($value1["date_birth"]); ?></td>
            <td><?php echo htmlspecialchars( $value1["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["rg"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["phone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td class="column-actions">
              <a href="/customers/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="edit">Editar</a>
              <a href="/customers/<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" class="delete" onclick="return confirm('Deseja realmente excluir este registro?')">Excluir</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <ul class="paginator">
      <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>
      <a href="<?php echo htmlspecialchars( $value1["href"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><li class="pageitem<?php if( $pagenumber === $value1["text"] ){ ?> active<?php } ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></li></a>
      <?php } ?>
    </ul>

  </div>
