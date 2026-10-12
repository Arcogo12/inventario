<?php
require_once __DIR__ . '/../src/validaciones.php';

echo "<h3>Pruebas de validarNombreProducto()</h3>";

$casosNombre = [
    ["Teclado", true],
    ["", false],
    ["     ", false],
    ["Mouse", true],
];

$aceptadas = 0;
$rechazadas = 0;

foreach ($casosNombre as [$entrada, $esperado]) {
    $resultado = validarNombreProducto($entrada);
    $textoEntrada = $entrada === "" ? "'' (vacío)" : "'$entrada'";

    if ($resultado === true) {
        $aceptadas++;
    } else {
        $rechazadas++;
    }

    if ($resultado === $esperado) {
        echo "Prueba de nombre $textoEntrada pasó.<br>\n";
    } else {
        echo "Prueba de nombre $textoEntrada falló. Resultado esperado: " . ($esperado ? 'true' : 'false') . ", resultado obtenido: " . ($resultado ? 'true' : 'false') . "<br>\n";
    }
}

echo "<br>";
echo "<strong>Resumen de validación de nombres:</strong><br>\n";
echo "Aceptadas: $aceptadas<br>\n";
echo "Rechazadas: $rechazadas<br>\n";
echo "Total evaluados: " . ($aceptadas + $rechazadas) . "<br>\n";