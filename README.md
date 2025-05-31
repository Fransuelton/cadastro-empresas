# CadastroEmpresas - Projeto Laravel + Vue.js

![](.github/readme/README.md%20-%20Banner%201.png)

## 🚀 Descrição  
Projeto para cadastro e gerenciamento de empresas, construído com **Laravel** no backend e **Vue.js** no frontend. Utiliza **Vite** para build e hot reload, com componentes Vue Single File Components (SFC) para melhor organização do frontend.

## 🎨 Design

O sistema atualmente possui um design simples e funcional, focado na usabilidade, mas pode ser facilmente estilizado e aprimorado com CSS ou frameworks como Tailwind CSS ou Bootstrap. A estrutura de componentes Vue permite uma personalização rápida e eficiente da interface.

Pensando nisso criei um design no Figma para servir como base para futuras implementações de estilo e layout. O design inclui formulários multi etapas, validação de campos e uma interface amigável para o usuário.

[Protótipo de Design no Figma](https://www.figma.com/design/buo8pGSs0L2LGeT7lhoi5F/Projeto-Laravel---Telepesquisa?node-id=0-1&t=hIIzIKV5HQAYmhzJ-1)

## 🛠 Tecnologias Utilizadas  

[![My Skills](https://skillicons.dev/icons?i=js,laravel,vue,mysql,git,vite)](https://skillicons.dev)

| Camada       | Tecnologia                   |
|--------------|-----------------------------|
| Backend      | Laravel                   |
| Frontend     | Vue 3 + Vite                |
| Banco de Dados | MySQL                      |
| Controle de versão | Git                    |


![](.github/readme/README.md%20-%20Banner%202.png)

## ⚙️ Instalação

1. Clone o repositório:  
```bash
   git clone git@github.com:Fransuelton/cadastro-empresas.git
   cd cadastro-empresas
```

2. Instale as dependências PHP:  
```bash
   composer install
```

3. Instale as dependências JavaScript:
  
```bash
   npm install
   # ou
   yarn
 ```

4. Copie o arquivo de ambiente e configure:  
```bash
   cp .env.example .env
   ```
   Edite o `.env` para configurar as variáveis do banco de dados e outras.

5. Gere a chave da aplicação:  
```bash
   php artisan key:generate
```

6. Rode as migrations para criar as tabelas no banco:  
```bash
   php artisan migrate
```

## ▶️ Rodando o Projeto

### Backend (Laravel)  
Inicie o servidor embutido Laravel:  
```bash
php artisan serve
```
Acesse: [http://localhost:8000](http://localhost:8000)

### Frontend (Vue + Vite)  
Inicie o servidor de desenvolvimento:  
```bash
npm run dev
# ou
yarn dev
```
Acesse a aplicação frontend em: http://localhost:8000 — o mesmo endereço do backend, pois o Vite está configurado para fazer proxy das requisições para o Laravel. 

## 📦 Build para Produção

Compile os assets do frontend para produção:  
```bash
npm run build
# ou
yarn build
```

## 📁 Estrutura Principal do Projeto

```
├── app/                # Código PHP backend (Models, Controllers, etc)
├── config/             # Configurações do Laravel
├── database/           # Migrations
├── public/             # Entrada pública (index.php + assets compilados)
├── resources/
│   ├── css/            # CSS padrão (app.css)
│   ├── js/             # JS e Vue SFC
│   ├── views/          # Templates Blade (app.blade.php, etc)
├── routes/             # Rotas Laravel (web.php, api.php)
├── vite.config.js      # Configuração do Vite
├── package.json        # Dependências JS
├── composer.json       # Dependências PHP
└── .env.example                # Variáveis de ambiente
```

## 🤝 Contribuição

Contribuições são sempre bem-vindas!  
1. Fork o projeto  
2. Crie sua branch: `git checkout -b feature/nova-funcionalidade`  
3. Faça commit das suas alterações: `git commit -m 'Adiciona nova funcionalidade'`  
4. Envie para a branch original: `git push origin feature/nova-funcionalidade`  
5. Abra um Pull Request  

## 📄 Licença

Este projeto está licenciado sob a licença **MIT**. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 💬 Contato

Para dúvidas ou sugestões, abra uma issue ou entre em contato.

## Autor 👨‍💻

![](.github/readme/author-banner.png)
