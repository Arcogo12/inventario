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
$aprobadas = 0;
$fallidas = 0;

foreach ($casosNombre as [$entrada, $esperado]) {
    $resultado = validarNombreProducto($entrada);
    $textoEntrada = trim($entrada) === ""
        ? ($entrada === "" ? "'' (vacío)" : "'$entrada' (solo espacios)")
        : "'$entrada'";

    if ($resultado === true) {
        $aceptadas++;
    } else {
        $rechazadas++;
    }

    if ($resultado === $esperado) {
        $aprobadas++;
        echo "Prueba de nombre $textoEntrada pasó.<br>\n";
    } else {
        $fallidas++;
        echo "Prueba de nombre $textoEntrada falló. Esperado: " . ($esperado ? 'true' : 'false') . ", obtenido: " . ($resultado ? 'true' : 'false') . "<br>\n";
    }
}

echo "<br>";
echo "<strong>Resumen de validación de nombres:</strong><br>\n";
echo "Aceptadas: $aceptadas<br>\n";
echo "Rechazadas: $rechazadas<br>\n";
echo "Total evaluados: " . ($aceptadas + $rechazadas) . "<br>\n";

if ($fallidas > 0) {
    exit(1);
}