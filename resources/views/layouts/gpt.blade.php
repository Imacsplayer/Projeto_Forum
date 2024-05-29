<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Site Calmo - Tema Escuro</title>
    <?php
    // Definição das cores para o tema claro
    $cor_fundo_claro = "#f0f5f9";
    $cor_texto_claro = "#333";
    $cor_destaque_claro = "#75a0b7";
    
    // Definição das cores para o tema escuro
    $cor_fundo_escuro = "#1e1e1e";
    $cor_texto_escuro = "#ddd";
    $cor_destaque_escuro = "#375a70";
    
    // Verifica se o tema escuro está ativado
    $tema_escuro = true; // Poderia ser alterado dinamicamente de acordo com a preferência do usuário
    
    // Define as cores com base no tema escolhido
    $cor_fundo = $tema_escuro ? $cor_fundo_escuro : $cor_fundo_claro;
    $cor_texto = $tema_escuro ? $cor_texto_escuro : $cor_texto_claro;
    $cor_destaque = $tema_escuro ? $cor_destaque_escuro : $cor_destaque_claro;
    ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: <?php echo $cor_fundo; ?>;
            color: <?php echo $cor_texto; ?>;
        }
        .header {
            background-color: <?php echo $cor_destaque; ?>;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .sidebar {
            background-color: <?php echo $cor_destaque; ?>;
            padding: 20px;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            overflow-y: auto;
        }
        .content {
            padding: 20px;
            margin-left: 270px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            margin-bottom: 10px;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #fff;
        }
        .sidebar ul li a:hover {
            color: #ccc;
        }
    </style>
</head>
<body>
    <div class="header">
        @yield('message')
        <h1>Meu Site - Tema Escuro</h1>
    </div>
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="#">Página Inicial</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Serviços</a></li>
            <li><a href="#">Contato</a></li>
        </ul>
    </div>
    <div class="content">
        <h2>Conteúdo Principal</h2>
        <p>Bem-vindo ao meu site! Este é o conteúdo principal. Você pode adicionar mais páginas e conteúdo conforme necessário.</p>
        @yield('header')
        @yield('content')
    </div>
</body>
</html>