<?php if(!isset($_SESSION['identity'])): ?>
    <h1>Login</h1>
    <form action="" method="post">
        <label for="email">Email</label>
        <input type="email" name="data[email]">
        <label for="password">Contraseña</label>
        <input type="password" name="data[password]">

        <input type="submit" value="Enviar">
    </form>

    <?php else: ?>
        <h3><?= $_SESSION['identity'] -> nombre ?> <?= $_SESSION['identity'] -> apellidos ?></h3>

    <?php endif; ?>