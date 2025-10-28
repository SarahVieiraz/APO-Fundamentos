# Gerador de Currículos (APO – Fundamentos de Programação para Internet)

![Badge PHP](https://img.shields.io/badge/PHP-8.2-blue)
![Badge Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-purple)
![Badge jQuery](https://img.shields.io/badge/jQuery-3.7.1-blue)
![Badge License](https://img.shields.io/badge/License-MIT-green)

Aplicação web em PHP para criar currículos personalizados com formulário responsivo, seções dinâmicas de experiências e referências, e preview com layout pronto para impressão e download em PDF via navegador.

## Tecnologias
- HTML5, CSS3
- JavaScript (ES6), jQuery 3.7.1
- PHP 8.2+
- Bootstrap 5.3 (CDN)
- XAMPP (Apache + PHP)

## Pré-requisitos
- XAMPP instalado (Apache e PHP ativos)
- Navegador atualizado (Chrome, Edge, Firefox ou similar)

## Instalação e Uso
1. Copie a pasta `gerador-de-curriculo` para o diretório `htdocs` do XAMPP.
2. Inicie o Apache via XAMPP Control Panel.
3. Acesse no navegador: `http://localhost/gerador-de-curriculo/index.php`.
4. Preencha o formulário com seus dados:
   - Nome, Data de Nascimento (idade calculada automaticamente com JS), Email, Telefone, Objetivo.
   - Adicione Experiências (cargo, empresa, período, descrição) com o botão `+` e remova com `✕`.
   - Adicione Referências (nome, telefone, email) com o botão `+` e remova com `✕`.
5. Envie o formulário para gerar o preview:
   - Botões `Imprimir` e `Baixar PDF` usam `window.print()`.
6. No final do preview, a sessão é encerrada automaticamente.

## Fluxo da Aplicação
- `index.php` (formulário) → `processador.php` (processa e salva em sessão) → `preview.php` (visualização do CV) → `Imprimir / Baixar PDF`.

## Estrutura de Pastas
```
gerador-de-curriculo/
├── CSS/
│   └── style.css
├── JS/
│   └── script.js
├── README.md
├── index.php
├── preview.php
└── processador.php
```

## Boas Práticas Aplicadas
- Codificação em UTF-8, anti-XSS (`htmlspecialchars`) na renderização.
- Layout responsivo (mobile-first) com Bootstrap 5.
- Seções dinâmicas com jQuery e `insertAdjacentHTML`.
- Estilos customizados e `@media print` para ocultar elementos de controle.

## Contato
- Autora: Sarah Bertan
- RA: [insira]
- UNIPAR EAD

## Licença
Este projeto é licenciado sob a Licença MIT. Veja o arquivo LICENSE (ou inclua o texto da licença abaixo) para mais detalhes.