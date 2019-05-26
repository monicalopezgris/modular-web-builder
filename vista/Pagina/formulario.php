<?php

$datos=(isset($_REQUEST['salida'])?$_REQUEST['salida']:null);
$readonly= (is_null($request->getParam('id'))?null:'readonly');
$action= (is_null($request->getParam('id'))?'anadir':'actualizar');

?>
<!DOCTYPE html>
<html lang="es" >
<head>
<meta charset="UTF-8">
<title>Edicion</title>
</head>
<body >

<form action="?controller=Pagina&action=<?= $action ?>" method="POST">
	<label for="id">Id</</label>
	<input type="number" value="<?= is_null($datos)?null:$datos->getId()?>" name="id"/><br/>
	<label for="nombre">Nombre</</label>
	<input type="text" value="<?= is_null($datos)?null: $datos->getNombre()?>" name="nombre"/><br/>
	<label for="slug">Slug</</label>
	<input type="text" value="<?= is_null($datos)?null:$datos->getSlug()?>" name="slug"/><br/>

	<label for="activo">Activo</label>
	Si<input type="radio" name="activo" value="1" <?php if($datos->getActivo()=='1') print "checked=true"?> <br/>
    No<input type="radio" name="activo" value="0" <?php if($datos->getActivo()=='0') print "checked=true"?> > </input>

    <label for="created_at"></</label>
	<input type="hidden" value="<?= is_null($datos)?null:$datos->getCreated_at()?>" name="created_at"/><br/>
	<label for="modified_at"></</label>
	<input type="hidden" value="<?= is_null($datos)?null:$datos->getModified_at()?>" name="modified_at"/>
	<br/>
    <input type=submit  value"Enviar"/>
	
</form>
</body>
</html>
