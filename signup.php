<?php
// Configuração da conexão
$servername = "localhost";
$username = "root"; // padrão do XAMPP
$password = ""; // deixe vazio se você não definiu senha no MySQL
$dbname = "sistema";

// Conectar ao banco
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Receber dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];

$senha = $_POST['senha'];
$confirmar = $_POST['confirmar'];

// Validar senha
if ($senha !== $confirmar) {
    echo "<script>alert('As senhas não conferem.'); history.back();</script>";
    exit();
}

// Inserir no banco
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='index.php';</script>";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
