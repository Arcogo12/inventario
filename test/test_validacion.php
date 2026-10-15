<?php

require_once __DIR__ . '/../src/validaciones.php';

$casos = [
    ["Teclado", true],
    ["", false],
    ["      ", false],
    ["Mouse", true],
];

$totalCasos = count($casos);
$total = 0;
$aprobadas = 0;
$fallidas = 0;

echo "Pasó las pruebas de esto:\n\n";

foreach ($casos as $indice => [$entrada, $esperado]) {
    $total++;
    $numeroPrueba = $indice + 1;
    $obtenido = validarNombreProducto($entrada);
    $etiquetaEntrada = ($entrada === '' || trim($entrada) === '') ? "\"$entrada\"" : $entrada;

    if ($obtenido === $esperado) {
        $aprobadas++;
        echo "$etiquetaEntrada: paso\n";
    } else {
        $fallidas++;
        echo "$etiquetaEntrada: no paso (falló)\n";
    }
}

echo "\nPruebas realizadas: $total | Aprobadas: $aprobadas | Fallidas: $fallidas\n";

if ($fallidas > 0) {
    exit(1);
}