<?php
// ⚠️ CÓDIGO VULNERÁVEL - APENAS PARA ESTUDO
$host = "localhost";
$user = "root"; 
$pass = "";
$db   = "test_db";

// Conexão vulnerável a SQL Injection
$conn = new mysqli($host, $user, $pass, $db);

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // 🚨 VULNERABILIDADE: concatenção direta
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<h3>🎉 LOGIN BEM-SUCEDIDO!</h3>";
        echo "<p>Bem-vindo, administrador!</p>";
    } else {
        echo "<h3>❌ LOGIN FALHOU</h3>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SQL Injection Demo</title>
</head>
<body>
    <h2>🔓 Login Vulnerável a SQL Injection</h2>
    
    <form method="POST">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>

    <div style="margin-top: 20px; background: #f0f0f0; padding: 15px;">
        <h3>💡 Payloads para testar:</h3>
        <code>' OR '1'='1</code> - Bypass de login<br>
        <code>' UNION SELECT 1,2,3-- -</code> - Extrair dados<br>
        <code>'; DROP TABLE users-- -</code> - Deletar tabela (perigoso!)
    </div>
</body>
</html>
