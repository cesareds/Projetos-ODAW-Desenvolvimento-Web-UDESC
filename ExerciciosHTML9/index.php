<?php
// 1 - Mostrar data e hora atual no formato:  Hoje é 22/04/2025 e agora são 16:10h
date_default_timezone_set("America/Sao_Paulo");
echo "Hoje é " . date("d/m/Y") . " e agora são " . date("H:i") . "h<br><br>";

// 2- Explore em um exemplo o uso de "function", utilize ainda alguma(s) funções do PHP para manipulação de Strings e Arrays.
function processaFrase($frase) {
    $palavras = explode(" ", $frase);
    $palavrasInvertidas = array_reverse($palavras);
    return implode(" ", $palavrasInvertidas);
}
echo "Frase invertida: " . processaFrase("César programando em PHP") . "<br><br>";

// 3 - Criar um contador de visitas (sugestão - usar um arquivo txt): "Esta página foi visitada X vezes".
$arquivo = "contador.txt";
if (!file_exists($arquivo)) {
    file_put_contents($arquivo, 0);
}
$visitas = (int)file_get_contents($arquivo) + 1;
file_put_contents($arquivo, $visitas);
echo "Esta página foi visitada $visitas vezes.<br><br>";

// 4- Faça um exemplo mostrando o uso de "Cookie" e/ou "Session".
session_start();

if (!isset($_SESSION['acessos'])) {
    $_SESSION['acessos'] = 1;
} else {
    $_SESSION['acessos']++;
}

setcookie("usuario", "César", time() + 60);

echo "Sessão: você acessou esta página " . $_SESSION['acessos'] . " vezes.<br>";
echo "Cookie 'usuario': " . ($_COOKIE['usuario'] ?? 'Cookie ainda não definido');
?>
