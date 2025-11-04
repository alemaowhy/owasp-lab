<?php
// ✅ CÓDIGO SEGURO - USANDO PREPARED STATEMENTS
$host = "localhost";
$user = "root";
$pass = "";
$db   = "test_db";

// Conexão segura
$conn = new mysqli($host, $user, $pass, $db);

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // ✅ PROTEÇÃO: Prepared Statements
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "<h3>🎉 LOGIN BEM-SUCEDIDO!</h3>";
        echo "<p>Bem-vindo, administrador!</p>";
    } else {
        echo "<h3>❌ LOGIN FALHOU</h3>";
    }
    
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Seguro</title>
</head>
<body>
    <h2>🔒 Login Protegido contra SQL Injection</h2>
    
    <form method="POST">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>

    <div style="margin-top: 20px; background: #e8f5e8; padding: 15px;">
        <h3>✅ Como foi protegido:</h3>
        <p><strong>Prepared Statements:</strong> Separa dados do comando SQL</p>
        <p><strong>Parameter Binding:</strong> Dados são tratados como valores, não código</p>
        <p><strong>SQL Injection IMPOSSÍVEL</strong> com essa abordagem</p>
    </div>
</body>
</html>
