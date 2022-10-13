<h1>Tablas de multimplicar</h1>

<form action="" method="POST">
    <label>¿Que tabla de multimplicar quieres ver?</label>
    <input type="text" name="tabla">
    <input type="submit" value="Mostrar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST['tabla'];
    echo "<table>";
    for ($i = 0; $i < 11; $i++) {
        echo "<tr><td>$numero x $i = " .  $numero * $i . "</td></tr>";
    }
    echo "</table>";
}
?>