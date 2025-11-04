# 🛡️ OWASP Top 10 Lab

Ambiente prático para estudo das principais vulnerabilidades web da OWASP Top 10.

## 🎯 Vulnerabilidades Implementadas

### 🔓 [A03:2021 - Injection](sql-injection/)
**SQL Injection Lab** - Exemplos completos de uma das vulnerabilidades mais críticas:

- **`vulnerable_login.php`** - Código vulnerável a SQL Injection
- **`secure_login.php`** - Versão protegida com Prepared Statements  
- **`database_setup.sql`** - Script para criar ambiente de teste
- **Payloads de bypass**: `' OR '1'='1`, `' UNION SELECT 1,2,3-- -`

### 🎯 [A07:2021 - XSS](xss/)
**Cross-Site Scripting Lab** - Execução de código malicioso no cliente:

- **`vulnerable_chat.php`** - Chat vulnerável a XSS
- **`secure_chat.php`** - Versão protegida com sanitização
- **Payloads**: `<script>alert('XSS')</script>`, `<img src=x onerror=alert(1)>`

### 🔐 [A02:2021 - Broken Authentication](broken-auth/)
**Falhas em Autenticação** - Vulnerabilidades em sistemas de login:

- **`weak_login.php`** - Senhas fracas, sem rate limiting
- **`secure_login.php`** - Bcrypt, rate limiting, timeout
- **Ataques**: Credential stuffing, brute force, session hijacking

## 🚀 Como Usar

### SQL Injection Lab
`mysql -u root -p < sql-injection/database_setup.sql`
`php -S localhost:8000`
`# Acesse: http://localhost:8000/sql-injection/vulnerable_login.php`

### XSS Lab  
`php -S localhost:8000`
`# Acesse: http://localhost:8000/xss/vulnerable_chat.php`

### Broken Auth Lab
`php -S localhost:8000` 
`# Acesse: http://localhost:8000/broken-auth/weak_login.php`

## 🛡️ O que Aprendi

### Desenvolvimento Seguro
- **Princípio do menor privilégio**
- **Validação de input** em client e server
- **Defesa em profundidade** - múltiplas camadas
- **Security by design** - segurança desde o início

### Vulnerabilidades Web
- **SQL Injection**: Manipulação de queries SQL
- **XSS**: Execução de scripts no cliente
- **Broken Auth**: Falhas em sistemas de autenticação

## 📚 Próximas Implementações

- [ ] Security Misconfiguration
- [ ] CSRF (Cross-Site Request Forgery)  
- [ ] Insecure Deserialization
- [ ] Using Components with Known Vulnerabilities

## ⚠️ AVISO DE SEGURANÇA

**ESTE LAB É APENAS PARA FINS EDUCACIONAIS!**
- Use apenas em ambiente controlado
- Nunca teste em sistemas reais  
- Sempre obtenha permissão antes de testar

---

**Desenvolvido por [alemaowhy](https://github.com/alemaowhy) - Cybersecurity Specialist**
