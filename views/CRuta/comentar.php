

<h1>Comentar Ruta</h1>
<strong>Titulo: </strong><span><?= $comentario['titulo'] ?></span>
<br><br>
<strong>Descripción: </strong><span><?= $comentario['descripcion'] ?></span>
<br><br>
<strong>Desnivel(m): </strong><span><?= $comentario['desnivel'] ?></span>
<br><br>
<strong>Distancia(km)</strong><span><?= $comentario['distancia'] ?></span>
<br><br>
<strong>Dificultad: </strong><span><?= $comentario['dificultad'] ?></span>
<br><br>
<strong>Notas: </strong><span><?= $comentario['notas'] ?></span>
<p><?= $_SESSION['cnombre_error'] ?></p>
<p><?= $_SESSION['fecha_error'] ?></p>
<p><?= $_SESSION['comentario_error'] ?></p>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
            <th colspan="2">Comentario</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <form action="<?=base_url?>RComentario/save" method="POST">
                <input type="hidden" name="data[id_ruta]" value='<?=$_SESSION['id_ruta']?>'>
                <td>
                    <input type="text" name="data[nombre]">
                </td>
                <td>
                    <input type="text" value="<?=date('d/m/y')?>" disabled>
                </td>
                <td>
                    <input type="text" name=data[comentario]>
                    <input type="submit" value="Añadir">
                </td>
                <?php foreach($comentarios as $coment):?>
                    <tr>
                        <td><?= $coment -> getNombre()?></td>
                        <td><?= $coment -> getFecha()?></td>
                        <td><?= $coment -> getTexto()?></td>
                    </tr>
                <?php endforeach ?>
            </form>
        </tr>
    </tbody>
</table>