<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Zapatos - Inicio</title>
</head>
<body>
    <header>
        <h1>Rutas Senderismo</h1>
        <form action="<?phpbase_url?>Ruta/Buscar">
            <label for="campos">Buscar por el campo</label>
            <select name="data[campo]" id="campos">
                <option value="titulo">Título</option>
            </select>
            <input type="text" name="data[titulo]">
            <input type="submit" name="buscar">
            <input type="submit" name="nuevaRuta">
            <input type="submit" name="listado">
        </form>
    </header>
    <main>
        <table>
            <tr>
                <td>Titulo</td>
                <td>Descripción</td>
                <td>Desnivel (m)</td>
                <td>Distancia (Km)</td>
                <td>Dificultad</td>
                <td>Operaciones</td>
            </tr>
        </table>
    </main>
    <footer>
        <span><?php ?></span>
        <span><?php ?></span>
    </footer>
</body>
</html>