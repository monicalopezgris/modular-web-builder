<?php

$datos=$_REQUEST['salida'];
$urlEdit='?controller=Pagina&action=editar&id=';
$urlBorrar='?controller=Pagina&action=borrar&id=';
$urlAdd='?controller=Pagina&action=add';

?>
<!DOCTYPE html>
<html lang="es" >
<head>
<meta charset="UTF-8">
<title>Edicion</title>
</head>
<body >
<a href="<?= $urlAdd ?>">Add</a>
<table>
<?php 

foreach ($datos as $pagina){?>
<tr>
<td><?= $pagina->getNombre()?></td>
<td><?= $pagina->getId()?></td>
<td><?= $pagina->getSlug()?></td>
<td><?= $pagina->getActivo()?></td>
<td><?= $pagina->getCreated_at()?></td>
<td><?= $pagina->getModified_at()?></td>
<td><a href="<?= $urlEdit ?><?= $pagina->getId()?>">Editar</a></td>
<td><a href="<?= $urlBorrar ?><?= $pagina->getId()?>">Borrar</a></td>

<?php }?>
</table>
</body>
</html>