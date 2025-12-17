# 🌾 Farmix  
### Smart Farming. Simplified.

![PHP 8.4](https://img.shields.io/badge/PHP-8.4-blue)
![Composer 2.9](https://img.shields.io/badge/Composer-2.9-lightgrey)
![Node.js 24](https://img.shields.io/badge/Node.js-24-green)
![Docker 28.3](https://img.shields.io/badge/Docker-28.3-blue)
![Docker Compose v2.38](https://img.shields.io/badge/Docker%20Compose-v2.38-blueviolet)
![PostgreSQL 18](https://img.shields.io/badge/PostgreSQL-18-blue)

Farmix is a **modern platform for managing crops, schedules, and farm intelligence**, built to help farmers grow smarter and more efficiently.

---

## 📋 Requirements

Ensure the following tools are installed before setting up **Farmix**:

### 🔧 Backend
- **PHP** ≥ 8.4  
- **Composer** ≥ 2.9  
- Required PHP extensions: OpenSSL, cURL, ZIP  

### ⚙️ Frontend
- **Node.js** ≥ 24.x  
- **npm / yarn / pnpm**

### 🐳 Containers
- **Docker** ≥ 28.x (tested on 28.3.0)  
- **Docker Compose** v2+ (tested on v2.38.1)

### 🗄 Database
- **PostgreSQL** ≥ 18 (via Docker)

### 🧰 Recommended
- **Git** ≥ 2.40  
- Linux / macOS / WSL2  
- Laravel Herd / Valet / Docker Desktop

---

## 🛠 Project Setup

Follow these steps to run **Farmix** locally.

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/your-username/farmix.git
cd farmix
````

### 2️⃣ Install Dependencies

```bash
composer install
npm install
```

### 3️⃣ Environment Configuration

Create a `.env` file by copying the example:

```bash
cp .env.example .env
```

Update environment variables:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=devDb
DB_USERNAME=devUser
DB_PASSWORD=devPass
```

### 4️⃣ Start Docker Database

```bash
docker compose up -d
```

Verify Postgres is ready:

```bash
docker compose logs devDb
```

### 5️⃣ Run Laravel Migrations

```bash
php artisan migrate
```

### 6️⃣ Start Development Server

```bash
npm run dev
php artisan serve

# or

composer run dev
```

Open in browser:

```
http://127.0.0.1:8000/
```

---

### 🔹 Notes

* **Clearing Docker data**:

```bash
docker compose down -v
docker volume prune
```

* **Laravel config cache**: Always run `php artisan config:clear` after updating `.env`.

---

## 🤝 Contributing

We welcome contributions to **Farmix**! Follow these guidelines to get started:

### 1️⃣ Fork & Clone
1. Fork the repository on GitHub  
2. Clone your fork locally:
```bash
git clone https://github.com/topdogfound/farmix.git
cd farmix
````

### 2️⃣ Create a Branch

```bash
git checkout -b feature/your-feature-name
```

Use descriptive branch names like `feature/login-page` or `fix/db-migration`.

### 3️⃣ Make Changes

* Follow the existing code style
* Write clear, concise commit messages
* Update `.env.example` if you add new environment variables
* Add tests if applicable

### 4️⃣ Commit & Push

```bash
git add .
git commit -m "feat: add descriptive message"
git push origin feature/your-feature-name
```

### 5️⃣ Open a Pull Request

* Go to your fork on GitHub
* Click **Compare & Pull Request**
* Provide a meaningful description of your changes

### 6️⃣ Code Review

* All PRs are reviewed before merging
* Be responsive to feedback

---

### 🔹 Guidelines

* Follow [PSR-12](https://www.php-fig.org/psr/psr-12/) for PHP code
* Follow consistent folder structure and naming conventions
* Keep commits atomic and descriptive

We appreciate all contributions — big or small! 🚀

---

## 📬 Contact

For any questions, suggestions, or collaboration opportunities, reach out:

- **Project Owner:** topdogfound (Ravi)  
- **Email:** topdogfound@gmail.com  
- **GitHub:** [https://github.com/topdogfound](https://github.com/topdogfound)  
- **Twitter :** [@TopDogFound](https://twitter.com/topdogfound)

Feel free to open an issue or submit a pull request — your feedback is always welcome! 🚀
