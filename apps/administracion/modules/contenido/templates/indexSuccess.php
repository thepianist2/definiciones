<h1>Lista de contenidos</h1>

<table>
  <thead>
    <tr>
      <th>Usuario</th>
      <th>Categoria</th>
      <th>Titulo</th>
      <th>Borrado</th>
      <th>Activo</th>
      <th>Creado en</th>
      <th>Actualizado en</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contenidos as $contenido): ?>
  
    <tr>
      <td><?php echo $contenido->getSfGuardUser()->getUserName() ?></td>
      <td><?php echo $contenido->getCategoriaContenido()->getTexto() ?></td>
      <td><a href="<?php echo url_for('contenido/show?id='.$contenido->getId()) ?>"><?php echo $contenido->getTitulo() ?></a></td>
      <td><?php echo $contenido->getBorrado()? "Si" : "No" ?></td>
      <td><?php echo $contenido->getActivo()? "Si" : "No" ?></td>
      <td><?php echo $contenido->getCreatedAt() ?></td>
      <td><?php echo $contenido->getUpdatedAt() ?></td>
    </tr></a>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('contenido/new') ?>">New</a>
