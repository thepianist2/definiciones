<h1>Lista de contenidos</h1>

<table>
  <thead>
    <tr>
      <th colspan="3">Acciones</th>  

      <th>Titulo</th>
      <th>Categoria</th>
      <th>Borrado</th>
      <th>Activo</th>
      <th>Creado en</th>
      <th>Actualizado en</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contenidos as $contenido): ?>
  
    <tr>
      <td><?php echo link_to(image_tag('iconos/vistaPrevia.png'), 'contenido/show?id='.$contenido->getId(), array('title' => 'Ver')) ?></td>
      <td><?php echo link_to(image_tag('iconos/editar.png'), 'contenido/edit?id='.$contenido->getId(), array('title' => 'Editar')) ?></td>
      <td><?php echo link_to(image_tag('iconos/borrar.png'), 'contenido/delete?id='.$contenido->getId(), array('method' => 'delete', 'confirm' => 'Estas seguro?', 'title' => 'Eliminar')) ?></td>        
      <td><?php echo $contenido->getTitulo() ?></td>
      <td><?php echo $contenido->getCategoriaContenido()->getTexto() ?></td>
      <td><?php echo $contenido->getBorrado()? "Si" : "No" ?></td>
      <td><?php echo $contenido->getActivo()? "Si" : "No" ?></td>
      <td><?php echo $contenido->getCreatedAt() ?></td>
      <td><?php echo $contenido->getUpdatedAt() ?></td>
    </tr></a>
    <?php endforeach; ?>
  </tbody>
</table>

<div style="text-align: center;" >
  <?php echo link_to(image_tag('iconos/nuevo.png').'Añadir nuevo', 'contenido/new', array('title' => 'Nuevo')) ?>
</div>
