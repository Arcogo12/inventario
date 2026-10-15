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
    $resultado = $obtenido ? "paso" : "no paso";

    if ($obtenido === $esperado) {
        $aprobadas++;
        echo "$etiquetaEntrada: $resultado\n";
    } else {
        $fallidas++;
        $esperadoTexto = $esperado ? "paso" : "no paso";
        echo "$etiquetaEntrada: $resultado (FALLÓ - Se esperaba: $esperadoTexto)\n";
    }
}

echo "\nPruebas realizadas: $total | Aprobadas: $aprobadas | Fallidas: $fallidas\n";

if ($fallidas > 0) {
    exit(1);
}