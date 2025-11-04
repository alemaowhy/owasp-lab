<?php
// ⚠️ CÓDIGO VULNERÁVEL A XSS
session_start();

if ($_POST['message']) {
    // 🚨 VULNERABILIDADE: Output sem sanitização
    $message = $_POST['message'];
    $messages = $_SESSION['messages'] ?? [];
    $messages[] = $message;
    $_SESSION['messages'] = $messages;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>XSS Vulnerable Chat</title>
</head>
<body>
    <h2>💬 Chat Vulnerável a XSS</h2>
    
    <form method="POST">
        <input type="text" name="message" placeholder="Digite uma mensagem...">
        <button type="submit">Enviar</button>
    </form>

    <h3>Mensagens:</h3>
    <div id="chat">
        <?php
        // 🚨 VULNERABILIDADE: Renderização direta
        foreach ($_SESSION['messages'] ?? [] as $msg) {
            echo "<p>$msg</p>";
        }
        ?>
    </div>

    <div style="margin-top: 20px; background: #fff0f0; padding: 15px;">
        <h3>💡 Payloads XSS para testar:</h3>
        <code>&lt;script&gt;alert('XSS')&lt;/script&gt;</code><br>
        <code>&lt;img src=x onerror=alert(1)&gt;</code><br>
        <code>&lt;svg onload=alert('Hacked')&gt;</code>
    </div>
</body>
</html>
