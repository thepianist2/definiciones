<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $asunto ?></title>


</head>
<body>
<table class="mailBody">
  <tbody>
    <tr>
      <td><img src="<?php echo $url_base.image_path('logo-peq.png') ?>"/></td>
    </tr>
    <tr>
      <td class="titulo"><?php echo html_entity_decode($asunto, ENT_COMPAT , 'UTF-8') ?></td>
    </tr>
    <tr>
      <td>
      	<center><b><?php echo 'Confirmación de alta de usuario en Dreams&Chocolate' ?></b></center>
      </td>
    </tr>
    <tr>
      <td>
          <?php echo 'Para confirmar la creación de tu usuario y completar el proceso de registro pulsa en el siguiente enlace. <br />Si tu correo no te permite abrir un navegador, copialo en la dirección para acceder' ?>
          <br /><br />
          <a href="<?php echo $url_base.'/usuario/confirmarAlta/e_mail/'.$e_mail ?>"><?php echo $url_base.'/usuario/confirmarAlta/e_mail/'.$e_mail ?></a>
      </td>
    </tr>
  </tbody>
</table>
</body>
</html>

