<?php if ($sf_request->getParameter('id') != '' && $subCategorias && count($subCategorias) > 0): ?>
    <?php foreach ($subCategorias as $subCategoria): ?>
        <option value="<?php echo $subCategoria->getId(); ?>"><?php echo $subCategoria->getTexto(); ?></option>
    <?php endforeach; ?>
<?php elseif (count($subCategorias) == 0): ?>
    <option value=""><?php echo 'Otra' ?></option>
<?php else: ?>
    <option value="">-- <?php echo 'Selecciona primero una categoría' ?> --</option>
<?php endif; ?>

