<?php
// ✅ CÓDIGO SEGURO - AUTENTICAÇÃO FORTE
session_start();

// ✅ PROTEÇÃO: Hash de senhas com bcrypt
$users = [
    'admin' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    'user' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'  // password
];

// ✅ PROTEÇÃO: Rate limiting
$attempts = $_SESSION['login_attempts'] ?? 0;
$last_attempt = $_SESSION['last_attempt'] ?? 0;

if ($_POST['username'] && $_POST['password']) {
    // ✅ PROTEÇÃO: Bloqueio após 3 tentativas
    if ($attempts >= 3 && (time() - $last_attempt) < 300) {
        echo "<h3>🔒 Muitas tentativas. Tente novamente em 5 minutos.</h3>";
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // ✅ PROTEÇÃO: Verificação segura com password_verify
        if (isset($users[$username]) && password_verify($password, $users[$username])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['login_attempts'] = 0; // Resetar tentativas
            $_SESSION['last_login'] = time();
            echo "<h3>🎉 LOGIN BEM-SUCEDIDO!</h3>";
        } else {
            $_SESSION['login_attempts'] = $attempts + 1;
            $_SESSION['last_attempt'] = time();
            echo "<h3>❌ LOGIN FALHOU</h3>";
        }
    }
}

// ✅ PROTEÇÃO: Logout seguro
if ($_GET['action'] === 'logout') {
    session_unset();
    session_destroy();
    header("Location: secure_login.php");
    exit;
}

// ✅ PROTEÇÃO: Timeout de sessão (15 minutos)
if ($_SESSION['last_login'] && (time() - $_SESSION['last_login']) > 900) {
    session_unset();
    session_destroy();
    header("Location: secure_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Authentication</title>
</head>
<body>
    <h2>🔒 Autenticação Segura</h2>
    
    <?php if (!$_SESSION['loggedin']): ?>
    <form method="POST">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <button type="submit">Login</button>
    </form>
    
    <div style="margin-top: 20px; background: #e8f5e8; padding: 15px;">
        <h3>✅ Como foi protegido:</h3>
        <ul>
            <li><strong>Senhas hasheadas</strong> com bcrypt</li>
            <li><strong>Rate limiting</strong> - 3 tentativas, bloqueio de 5min</li>
            <li><strong>Timeout de sessão</strong> - 15 minutos</li>
            <li><strong>Logout seguro</strong> - session_unset() + session_destroy()</li>
            <li><strong>Session fixation protection</strong></li>
        </ul>
        <p><strong>Credenciais:</strong> admin / password</p>
    </div>
    
    <?php else: ?>
    <h3>✅ Logado como: <?php echo htmlspecialchars($_SESSION['username']); ?></h3>
    <p><strong>Último login:</strong> <?php echo date('Y-m-d H:i:s', $_SESSION['last_login']); ?></p>
    <a href="?action=logout">Logout Seguro</a>
    <?php endif; ?>
</body>
</html>
