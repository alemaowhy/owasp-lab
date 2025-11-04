<?php
// ⚠️ CÓDIGO COM BROKEN AUTHENTICATION
session_start();

// 🚨 VULNERABILIDADE: Senhas fracas e sem limites
$users = [
    'admin' => 'admin123',
    'user' => '123456',
    'test' => 'password'
];

if ($_POST['username'] && $_POST['password']) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // 🚨 VULNERABILIDADE: Verificação simples sem rate limiting
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        echo "<h3>🎉 LOGIN BEM-SUCEDIDO!</h3>";
    } else {
        echo "<h3>❌ LOGIN FALHOU</h3>";
    }
}

// 🚨 VULNERABILIDADE: Sem logout adequado
if ($_GET['action'] === 'logout') {
    session_destroy();
    header("Location: weak_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Weak Authentication</title>
</head>
<body>
    <h2>🔓 Autenticação Vulnerável</h2>
    
    <?php if (!$_SESSION['loggedin']): ?>
    <form method="POST">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <button type="submit">Login</button>
    </form>
    
    <div style="margin-top: 20px; background: #fff0f0; padding: 15px;">
        <h3>💡 Credenciais para testar:</h3>
        <code>admin / admin123</code><br>
        <code>user / 123456</code><br>
        <code>test / password</code><br><br>
        <strong>🚨 Problemas:</strong>
        <ul>
            <li>Senhas fracas e comuns</li>
            <li>Sem rate limiting</li>
            <li>Sem 2FA</li>
            <li>Sem política de senhas</li>
        </ul>
    </div>
    
    <?php else: ?>
    <h3>✅ Logado como: <?php echo $_SESSION['username']; ?></h3>
    <a href="?action=logout">Logout</a>
    
    <div style="margin-top: 20px; background: #fff0f0; padding: 15px;">
        <h3>🚨 Vulnerabilidades de Sessão:</h3>
        <ul>
            <li>Session fixation possível</li>
            <li>Sem timeout de sessão</li>
            <li>Logout inadequado</li>
        </ul>
    </div>
    <?php endif; ?>
</body>
</html>
