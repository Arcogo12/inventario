<?php

require_once __DIR__ . '/../src/validaciones.php';

$casos = [
    ["Teclado", true],
    ["", false],
    ["      ", false],
    ["Mouse", true],
];

$total = 0;
$aprobadas = 0;
$fallidas = 0;

foreach ($casos as [$entrada, $esperado]) {
    $total++;
    $obtenido = validarNombreProducto($entrada);

    if ($obtenido === $esperado) {
        $aprobadas++;
        echo "PASS\n";
    } else {
        $fallidas++;
        echo "FAIL\n";
    }
}

echo "\nPruebas realizadas: $total | Aprobadas: $aprobadas | Fallidas: $fallidas\n";