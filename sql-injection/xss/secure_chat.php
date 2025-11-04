<?php
// ✅ CÓDIGO SEGURO - PROTEGIDO CONTRA XSS
session_start();

if ($_POST['message']) {
    // ✅ PROTEÇÃO: Sanitização do input
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
    $messages = $_SESSION['messages'] ?? [];
    $messages[] = $message;
    $_SESSION['messages'] = $messages;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat Seguro</title>
</head>
<body>
    <h2>🔒 Chat Protegido contra XSS</h2>
    
    <form method="POST">
        <input type="text" name="message" placeholder="Digite uma mensagem...">
        <button type="submit">Enviar</button>
    </form>

    <h3>Mensagens:</h3>
    <div id="chat">
        <?php
        // ✅ PROTEÇÃO: Output seguro
        foreach ($_SESSION['messages'] ?? [] as $msg) {
            echo "<p>" . $msg . "</p>";
        }
        ?>
    </div>

    <div style="margin-top: 20px; background: #e8f5e8; padding: 15px;">
        <h3>✅ Como foi protegido:</h3>
        <p><strong>htmlspecialchars():</strong> Converte caracteres especiais em entidades HTML</p>
        <p><strong>ENT_QUOTES:</strong> Protege aspas simples e duplas</p>
        <p><strong>UTF-8:</strong> Define encoding correto</p>
        <p><strong>XSS IMPOSSÍVEL</strong> com essa abordagem</p>
    </div>
</body>
</html>
