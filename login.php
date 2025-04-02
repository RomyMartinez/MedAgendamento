<?php
// Iniciar sessão
session_start();

// Configuração da conexão
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

// Conectar ao banco
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Receber dados do formulário
$email= $_POST['email'];
$senha = $_POST['senha'];

// Verificar se o usuário existe
$sql = "SELECT * FROM usuarios WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();

    // Verificar senha
    if ($senha == $usuario['senha']) {
        // Salvar informações na sessão
        $_SESSION['usuario'] = $usuario['nome'];
        $_SESSION['email'] = $usuario['email'];

        // Redirecionar para a página inicial
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Senha incorreta!'); history.back();</script>";
    }
} else {
    echo "<script>alert('Usuário não encontrado!'); history.back();</script>";
}

$conn->close();
?>
