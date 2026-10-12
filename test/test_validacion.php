<?php
require_once __DIR__ . '/../src/validaciones.php';

$casos = [
    ["Teclado", true],
    ["", false],
    ["3", true],
    ["Mouse", false]
];

$aprobados = 0;
$rechazados = 0;

foreach ($casos as [$entrada, $esperado]) {
    $obtenido = validarNombreProducto($entrada);

    if ($obtenido === $esperado) {
        echo "PASS\n";
        $aprobados++;
    } else {
        echo "FAIL\n";
        $rechazados++;
    }
}

echo "\nAprobados: $aprobados\n";
echo "Rechazados: $rechazados\n";