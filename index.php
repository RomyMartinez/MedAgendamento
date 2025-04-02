<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial - Sistema de Consultas</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <header>
        <div class="header-left">
            <img src="imagens/logo.jpeg" alt="Logo" class="logo">
        </div>
        <div class="header-right">

            <?php if(isset($_SESSION['usuario'])): ?>
                <span class="user-welcome">Olá, <?php echo htmlspecialchars($_SESSION['usuario']); ?></span>
                <a href="logout.php" class="btn-link">Logout</a>
            <?php else: ?>
                <a href="login.html" class="btn-link">Login</a>
                <a href="signup.html" class="btn-link">Sign Up</a>
            <?php endif; ?>

            <a href="sobre.html" class="btn-link">Sobre</a>
        </div>
    </header>


    <main>

        <!-- Sobre a empresa -->
        <section class="card card-sobre">
            <h3>Sobre o Sistema de Agendamento</h3>
            <p><strong>Missão:</strong> Facilitar o acesso de pacientes a consultas médicas de forma simples e rápida.</p>
            <p><strong>Objetivos:</strong> Oferecer uma plataforma amigável, eficiente e segura, melhorando a experiência de agendamentos para usuários e profissionais de saúde.</p>
            <p><strong>Área de Atuação:</strong> Consultas médicas presenciais e online, abrangendo diversas especialidades e regiões.</p>
        </section>

        <!-- Busca -->
        <div class="search-bar">
            <input type="text" placeholder="Procurar doutor">
        </div>

        <!-- Botões -->
        <div class="icon-buttons">
            <button><i class="fa-solid fa-user-doctor"></i> Doutor</button>
            <button><i class="fa-solid fa-pills"></i> Medicamentos</button>
            <button><i class="fa-solid fa-hospital"></i> Hospital</button>
        </div>

        <!-- Card perto -->
        <section class="card card-perto"> 
            <h4>Perto de você</h4>

            <?php
            $conn = new mysqli("localhost", "root", "", "sistema");
            if ($conn->connect_error) {
                die("Erro na conexão: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM doutores";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($doutor = $result->fetch_assoc()) {
                    echo '<div class="doutor-item">';
                    echo '   <div class="card-header">';
                    echo '       <i class="fa-solid fa-location-dot"></i>';
                    echo '       <div>';
                    echo '           <strong>' . htmlspecialchars($doutor["nome"]) . '</strong><br>';
                    echo '           <span>' . htmlspecialchars($doutor["especialidade"]) . ' - ' . htmlspecialchars($doutor["distancia"]) . '</span>';
                    echo '       </div>';
                    echo '   </div>';
                    echo '   <div class="avaliacao">';
                    echo '       <i class="fa-solid fa-star"></i> ' . htmlspecialchars($doutor["avaliacao"]) . ' (' . htmlspecialchars($doutor["comentarios"]) . ' comentários) - ' . htmlspecialchars($doutor["horario"]);
                    echo '   </div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="sem-doutores">';
                echo '   <p><i class="fa-solid fa-circle-info"></i> Nenhum doutor encontrado na sua região.</p>';
                echo '</div>';
            }

            $conn->close();
            ?>
        </section>



    </main>

    <footer>
    <nav>
        <a href="index.php"><img src="imagens/icones/home.png" alt="Home" class="icon-footer"></a>
        <a href="#"><img src="imagens/icones/calender.png" alt="Agenda" class="icon-footer"></a>
        <a href="#"><img src="imagens/icones/chat.png" alt="chat" class="icon-footer"></a>
        <a href="#"><img src="imagens/icones/person.png" alt="Perfil" class="icon-footer"></a>
    </nav>
    </footer>

</body>

</html>
