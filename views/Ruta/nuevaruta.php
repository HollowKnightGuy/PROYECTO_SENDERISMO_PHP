<br><br>
<form action="<?=base_url?>Ruta/save" method="POST">
    <span><?php echo $_SESSION['camposerror'] ?? "" ?></span>
    <br><br>
    <label for="">Titulo</label>
    <input type="text" name="data[titulo]">
    <span><?php echo $_SESSION['tituloerror'] ?? ""?></span>

    <br><br>
    <label for="">Descripción</label>
    <input type="text" name="data[descripcion]">
    <span><?php echo $_SESSION['descripcionerror'] ?? ""?></span>

    <br><br>
    <label for="">Desnivel(m)</label>
    <input type="number" name="data[desnivel]" min="0" max="999" step=".01">

    <br><br>
    <label for="">Distancia(Km)</label>
    <input type="number" name="data[distancia]" min="0" max="999" step=".01">
    <span><?php echo $_SESSION['distanciaerror'] ?? ""?></span>


    <br><br>
    <label for="">Dificultad</label>
    <select name="data[dificultad]" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <br><br>
    <label for="">Notas</label>
    <textarea name="data[notas]" cols="30" rows="10" placeholder="Escribe notas si es necesario sobre la ruta"></textarea>
<br><br>
    <input type="submit" value="Crear Ruta">
</form>