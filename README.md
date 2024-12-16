# Blog Laravel com Livewire 🌟

Um blog poderoso e dinâmico, construído com Laravel e Livewire. Gerencie posts, filtre por categorias e aproveite atualizações em tempo real com Livewire.

## 🛠️ Tecnologias Usadas

- **Laravel** para backend
- **Livewire** para componentes dinâmicos
- **MySQL** para banco de dados
- **TailwindCSS** para estilização

## 📋 Pré-requisitos

- PHP >= 8.1
- Composer
- Node.js e npm
- MySQL

## 🚀 Como Instalar

1. Clone o repositório:
   ```bash
   git clone https://github.com/usuario/projeto.git
   cd projeto
2. Configure o arquivo .env:
   ```bash
   cp .env.example .env  
2. Atualize suas configurações de banco de dados no .env:
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nome_do_banco
   DB_USERNAME=usuario
   DB_PASSWORD=senha
3. Instale as dependências:
   ```bash
   composer install
   npm install
4. Rode as migrações e crie o link do armazenamento:
   ```bash
   php artisan migrate
   php artisan storage:link
5. Inicie o servidor:
   ```bash
   php artisan serve
   npm run dev
🎨 Funcionalidades:
   <li>Criação, edição e exclusão de posts</li>
   <li>Filtro por categorias</li>
   <li>Upload de imagens</li>
   <li>Atualizações dinâmicas com Livewire</li>
💻 Uso:
   <li>Acesse o projeto no navegador em: http://127.0.0.1:8000</li>
