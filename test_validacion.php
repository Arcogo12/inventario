<?php
require_once __DIR__ . '/src/validaciones.php';

$casos = [
    ["Teclado", true],
    ["", false],
    ["3", true],
    ["Mouse", false]
];

$pass = 0;
$fail = 0;
$resultados = [];

foreach ($casos as [$entrada, $esperado]) {
    $obtenido = validarNombreProducto($entrada);
    $aprobado = ($obtenido === $esperado);

    if ($aprobado) {
        $pass++;
    } else {
        $fail++;
    }

    $resultados[] = [
        'entrada'  => $entrada === '' ? '(vacío)' : $entrada,
        'esperado' => $esperado ? 'true' : 'false',
        'obtenido' => $obtenido ? 'true' : 'false',
        'estado'   => $aprobado ? 'PASS' : 'FAIL'
    ];
}

$total = $pass + $fail;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de Pruebas</title>
</head>
<body>
    <h1>Resultados de Pruebas</h1>

    <p>Pasaron: <?= $pass ?> | Fallaron: <?= $fail ?> | Total: <?= $total ?></p>



</body>
</html>
