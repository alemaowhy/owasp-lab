# 🛡️ OWASP Top 10 Lab

Ambiente prático para estudo das principais vulnerabilidades web da OWASP Top 10.

## 🎯 Vulnerabilidades Implementadas

### 🔓 [A03:2021 - Injection](sql-injection/)
**SQL Injection Lab** - Exemplos completos de uma das vulnerabilidades mais críticas:

- **`vulnerable_login.php`** - Código vulnerável a SQL Injection
- **`secure_login.php`** - Versão protegida com Prepared Statements  
- **`database_setup.sql`** - Script para criar ambiente de teste
- **Payloads de bypass**: `' OR '1'='1`, `' UNION SELECT 1,2,3-- -`

## 🚀 Como Usar

### SQL Injection Lab
`# 1. Configurar banco de dados`
`mysql -u root -p < sql-injection/database_setup.sql`

`# 2. Executar servidor web local`
`php -S localhost:8000`

`# 3. Acessar no navegador`
`# Vulnerável: http://localhost:8000/sql-injection/vulnerable_login.php`
`# Seguro: http://localhost:8000/sql-injection/secure_login.php`

## 🛡️ O que Aprendi

### SQL Injection
- **Como funciona**: Injeção de código SQL através de inputs não validados
- **Impacto**: Bypass de autenticação, vazamento de dados, execução de comandos
- **Prevenção**: Prepared Statements, input validation, least privilege

### Segurança em Camadas
- **Defesa em profundidade**: Múltiplas camadas de proteção
- **Validação**: Client-side + Server-side
- **Monitoramento**: Logs e detecção de ataques

## 📚 Próximos Passos

- [ ] Implementar XSS (Cross-Site Scripting)
- [ ] Criar lab de Broken Authentication  
- [ ] Adicionar Security Misconfiguration
- [ ] Desenvolver CSRF (Cross-Site Request Forgery)

## ⚠️ AVISO DE SEGURANÇA

**ESTE LAB É APENAS PARA FINS EDUCACIONAIS!**
- Use apenas em ambiente controlado
- Nunca teste em sistemas reais
- Sempre obtenha permissão antes de testar

---

**Desenvolvido por [alemaowhy](https://github.com/alemaowhy) - Cybersecurity Specialist**
