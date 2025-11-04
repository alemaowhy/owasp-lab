# 🚨 Broken Authentication Lab

Exemplos práticos de vulnerabilidades em autenticação e como se proteger.

## 📁 Arquivos

### 🔓 weak_login.php
**Código vulnerável** - Mostra como NÃO fazer:
- Senhas fracas e comuns
- Sem rate limiting
- Sem hash de senhas
- Sem timeout de sessão
- Logout inadequado

### 🔒 secure_login.php  
**Código seguro** - Mostra como fazer CERTO:
- Senhas hasheadas com bcrypt
- Rate limiting (3 tentativas, 5min bloqueio)
- Timeout de sessão (15 minutos)
- Logout seguro
- Proteção contra session fixation

## 💡 Ataques Possíveis

### Credential Stuffing
```bash
# Tentativas em massa com senhas comuns
admin:admin
admin:123456
admin:password
