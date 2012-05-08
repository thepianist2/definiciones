<?php use_helper('Date') ?>
<table>
  <tbody>
    <tr>
      <th>Nombre: </th>
      <td><?php echo $sf_guard_permission->getName() ?></td>
    </tr>
    <tr>
      <th>Descripción: </th>
      <td><?php echo $sf_guard_permission->getDescription() ?></td>
    </tr>
    <tr>
      <th>Creado en: </th>
      <td><?php echo format_date($sf_guard_permission->getCreatedAt(), 'p') ?></td>
    </tr>
    <tr>
      <th>Actualizado en: </th>
      <td><?php echo format_date($sf_guard_permission->getUpdatedAt(), 'p') ?></td>
    </tr>
  </tbody>
</table>

<hr />

<?php echo link_to(image_tag('iconos/editar.png').'Editar', 'permiso/edit?id='.$sf_guard_permission->getId(), array('title' => 'Editar')) ?>
&nbsp;
<?php echo link_to(image_tag('iconos/atras.png').'Volver a la lista', 'permiso/index', array('title' => 'Volver a la lista')) ?>
