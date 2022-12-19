<h2>Listado de rutas</h2>
<table stryle ="border=1">
    <thead>
        <tr>
            <th>Título</th>
            <th>Descripcion</th>
            <th>Desnivel (m)</th>
            <th>Distancia (km)</th>
            <th>Dificultad</th>
            <th colspan="3">Operaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($rutas as $ruta):?>
        <tr>
            <td><?= $ruta -> getTitulo()?></td>
            <td><?= $ruta -> getDescripcion()?></td>
            <td><?= $ruta -> getDesnivel()?></td>
            <td><?= $ruta -> getDistancia()?></td>
            <td><?= $ruta -> getDificultad()?></td>
            <td>
                <form action="<?= base_url?>RComentario/save&id=<?= $ruta -> getId() ?>"method="GET">
                    <input type="submit" value="comentar">
                </form>
            </td>
            <td>
                <form action="<?= base_url?>Ruta/modificar&id=<?= $ruta -> getId() ?>"method="GET">
                    <input type="submit" value="Editar">
                </form>
            </td>
            <td>
                <form action="<?= base_url?>Ruta/borrar&id=<?= $ruta -> getId() ?>"method="GET">
                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p><?= "Numero de rutas almacenadas ".$numero_rutas['count(id)'] ?></p>
<p><?= "Kilometros totales ".$kilometros['SUM(distancia)']  ?></p>