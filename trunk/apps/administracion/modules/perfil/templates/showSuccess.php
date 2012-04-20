<table>
  <tbody>
    <tr>
      <th>Nombre: </th>
      <td><?php echo $sf_guard_group->getName() ?></td>
    </tr>
    <tr>
      <th>Descripción: </th>
      <td><?php echo $sf_guard_group->getDescription() ?></td>
    </tr>
    <tr>
      <th>Creado en: </th>
      <td><?php echo $sf_guard_group->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Actualizado en: </th>
      <td><?php echo $sf_guard_group->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<?php echo link_to(image_tag('iconos/editar.png').'Editar', 'perfil/edit?id='.$sf_guard_group->getId(), array('title' => 'Editar')) ?>
&nbsp;
<?php echo link_to(image_tag('iconos/atras.png').'Volver a la lista', 'perfil/index', array('title' => 'Volver a la lista')) ?>
