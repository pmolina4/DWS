<h1>Tablas de multimplicar</h1>

<form action="" method="POST">
    <label>¿Que tabla de multimplicar quieres ver?</label><br>
    <input type="text" name="tabla"><br>
    <input type="submit" value="Mostrar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST['tabla'];

    for ($i = 0; $i < 11; $i++) {
        echo "<li>$numero x $i = " .  $numero * $i . "</li>";
    }
}
?>