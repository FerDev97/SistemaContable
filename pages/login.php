<?php
echo '
<div class="login">
    <form method="post" action="pages/cuenta.php">
    	<input type="text" style="font-size:25px;" name="usuario" id="usuario" placeholder="Usuario" required="required" />
        <input type="password" style="font-size:25px;" name="pass" id="pass" placeholder="Contraseña" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Entrar.</button>
    </form>
</div>'
 ?>
