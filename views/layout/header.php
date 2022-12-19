
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senderismo</title>
    <style>
        td, th{
            padding: .5rem;
        }
    </style>
</head>
<body>
    <header>
        <h1><a href="<?= base_url?>index.php">Rutas Senderismo</a></h1>
        <form action="<?=base_url?>Ruta/buscar" method='POST'>
            <label for="campos">Buscar por el campo</label>
            <select name="data[campo]" id="campos">
                <option value="titulo">Título</option>
                <option value="descripcion">Descripción</option>
            </select>
            <input type="text" name="data[texto_buscar]" >
            <input type="submit" name="buscar" value="Buscar!">
            <?= $_SESSION['buscar_error'] ?? "" ?>
        </form>
        <form action="<?=base_url?>Ruta\save">
            <input type="submit" value="Nueva Ruta">
        </form>
        <form action="<?=base_url?>Ruta\listar">
            <input type="submit" name="listado" value="Listado Completo">
        </form>
    </header>