<h1>Palabras List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id usuario</th>
      <th>Id sub categoria</th>
      <th>Texto palabra</th>
      <th>Texto definicion</th>
      <th>Borrado</th>
      <th>Activo</th>
      <th>Imagen</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($palabras as $palabra): ?>
    <tr>
      <td><a href="<?php echo url_for('default/show?id='.$palabra->getId()) ?>"><?php echo $palabra->getId() ?></a></td>
      <td><?php echo $palabra->getIdUsuario() ?></td>
      <td><?php echo $palabra->getIdSubCategoria() ?></td>
      <td><?php echo $palabra->getTextoPalabra() ?></td>
      <td><?php echo $palabra->getTextoDefinicion() ?></td>
      <td><?php echo $palabra->getBorrado() ?></td>
      <td><?php echo $palabra->getActivo() ?></td>
      <td><?php echo $palabra->getImagen() ?></td>
      <td><?php echo $palabra->getCreatedAt() ?></td>
      <td><?php echo $palabra->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('default/new') ?>">New</a>
