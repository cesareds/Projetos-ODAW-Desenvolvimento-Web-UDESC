<?php
echo "<h2>1. Formulário com Validação</h2>";

$erro = "";
$confirmacao = "";

if (isset($_POST['formulario'])) {
    $nome = trim($_POST["nome"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $senha = trim($_POST["senha"] ?? '');
    $genero = $_POST["genero"] ?? '';
    $hobbies = $_POST["hobbies"] ?? [];
    $comentario = trim($_POST["comentario"] ?? '');
    $estado = $_POST["estado"] ?? '';

    if ($nome == "" || $email == "" || $senha == "" || $genero == "" || empty($hobbies) || $comentario == "" || $estado == "") {
        $erro = "Preencha todos os campos.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "E-mail inválido.";
    } elseif (strlen($senha) < 6) {
        $erro = "A senha deve ter pelo menos 6 caracteres.";
    } else {
        $confirmacao = "Formulário enviado com sucesso!<br>";
        $confirmacao .= "Nome: $nome<br>Email: $email<br>Senha: $senha<br>Gênero: $genero<br>Hobbies: " . implode(", ", $hobbies) . "<br>Comentário: $comentario<br>Estado: $estado";
    }
}

?>

<form method="POST">
<input type="hidden" name="formulario" value="1">
Nome: <input type="text" name="nome"><br>
E-mail: <input type="text" name="email"><br>
Senha: <input type="password" name="senha"><br>

Gênero:<br>
<input type="radio" name="genero" value="Masculino">Masculino
<input type="radio" name="genero" value="Feminino">Feminino<br>

Hobbies:<br>
<input type="checkbox" name="hobbies[]" value="Esporte">Esporte
<input type="checkbox" name="hobbies[]" value="Leitura">Leitura
<input type="checkbox" name="hobbies[]" value="Viagem">Viagem<br>

Comentário:<br>
<textarea name="comentario"></textarea><br>

Estado:<br>
<select name="estado">
<option value="">Selecione</option>
<option value="SP">SP</option>
<option value="RJ">RJ</option>
<option value="MG">MG</option>
</select><br><br>

<input type="submit" value="Enviar">
<input type="reset" value="Limpar">
</form>

<?php
if ($erro) echo "<p style='color:red'>$erro</p>";
if ($confirmacao) echo "<p style='color:green'>$confirmacao</p>";


echo "<hr><h2>2. Login com arquivo autenticacao.txt</h2>";

$mensagem = "";

if (isset($_POST['login'])) {
    $usuario = trim($_POST["usuario"] ?? '');
    $senha = trim($_POST["senha"] ?? '');

    $linhas = file("autenticacao.txt", FILE_IGNORE_NEW_LINES);
    $autenticado = false;

    foreach ($linhas as $linha) {
        list($user, $pass) = explode(":", $linha);
        if ($usuario === $user && $senha === $pass) {
            $autenticado = true;
            break;
        }
    }

    $mensagem = $autenticado ? "Login bem-sucedido!" : "Usuário ou senha inválidos.";
}
?>

<form method="POST">
<input type="hidden" name="login" value="1">
Usuário: <input type="text" name="usuario"><br>
Senha: <input type="password" name="senha"><br>
<input type="submit" value="Entrar">
</form>

<?php if ($mensagem) echo "<p>$mensagem</p>"; ?>


<?php
echo "<hr><h2>3. Cifrar e Validar Senha (bcrypt)</h2>";

$senhaOriginal = "minhaSenhaSegura";
$hash = password_hash($senhaOriginal, PASSWORD_DEFAULT);

echo "Senha original: $senhaOriginal<br>";
echo "Hash gerado: $hash<br><br>";

$verificar = password_verify("minhaSenhaSegura", $hash);
echo $verificar ? "Senha confere!" : "Senha incorreta.";
?>
