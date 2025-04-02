<?php
// Iniciar ou continuar sessão
session_start();

// Destruir a sessão
session_destroy();

// Redirecionar de volta para a página inicial
header("Location: index.php");
exit();
?>
