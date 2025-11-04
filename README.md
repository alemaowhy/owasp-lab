# 🛡️ OWASP Top 10 Lab

Ambiente prático para estudo das principais vulnerabilidades web da OWASP.

## 🎯 Vulnerabilidades Incluídas
- **A01:2021 - Broken Access Control**
- **A03:2021 - Injection** (SQL, Command)
- **A07:2021 - Identification and Authentication Failures**
- **A05:2021 - Security Misconfiguration**

## 🚀 Como Usar
`git clone https://github.com/alemaowhy/owasp-lab.git`
`cd owasp-lab`
`docker-compose up`

## 📁 Estrutura do Lab
`owasp-lab/`
`├── sql-injection/`          # Exemplos de SQL Injection
`├── xss/`                   # Cross-Site Scripting  
`├── broken-auth/`           # Autenticação vulnerável
`├── security-misconfig/`    # Configurações inseguras
`└── docker-compose.yml`     # Ambiente containerizado

## ⚠️ AVISO
**Use apenas em ambiente controlado para aprendizado!**
