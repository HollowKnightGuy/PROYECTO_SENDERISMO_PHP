<br><br>
<form action="<?=base_url?>Ruta/modificar" method="POST">
    <span><?php echo $_SESSION['camposerror'] ?? "" ?></span>
    <br><br>
    <label for="">Titulo</label>
    <input type="text" name="data[titulo]" value="<?= $ruta['titulo'] ?>">
    <span><?php echo $_SESSION['tituloerror'] ?? ""?></span>

    <br><br>
    <label for="">Descripción</label>
    <input type="text" name="data[descripcion]" value="<?= $ruta['descripcion']?>">
    <span><?php echo $_SESSION['descripcionerror'] ?? ""?></span>

    <br><br>
    <label for="">Desnivel(m)</label>
    <input type="number" name="data[desnivel]" value="<?= $ruta['desnivel']?>">

    <br><br>
    <label for="">Distancia(Km)</label>
    <input type="number" step="any" name="data[distancia]" value="<?= $ruta['distancia']?>">
    <span><?php echo $_SESSION['distanciaerror'] ?? ""?></span>


    <br><br>
    <label for="">Dificultad</label>
    <select name="data[dificultad]">
        <option selected="selected">
            <?= $ruta['dificultad']?>
        </option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <br><br>
    <label for="">Notas</label>
    <textarea name="data[notas]" cols="30" rows="10" placeholder="Escribe notas si es necesario sobre la ruta" value="<?= $ruta['notas']?>"></textarea>
<br><br>
    <input type="submit" value="Modificar Ruta">
</form>