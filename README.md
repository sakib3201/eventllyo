# Eventllyo - Event Management System 🎉

Eventllyo is a simple **event management system** built using **pure PHP (MVC architecture)** without any frameworks. It allows users to create, manage, and participate in events seamlessly.

## 👤 Folder Structure

```
eventllyo/
️️️️ app/
️️️️   ├── Controllers/     # Controllers (Handles requests)
️️️️   ├── Models/          # Database models
️️️️   └── Views/           # UI templates (HTML & PHP)
️️️️ core/
️️️️   ├── Database.php     # Singleton database connection
️️️️   ├── Router.php       # Custom routing system
️️️️   ├── Controller.php   # Base controller class
️️️️   └── Model.php        # Base model class
️️️️ public/              # Publicly accessible files
️️️️   └── index.php        # Entry point of the application
️️️️ routes/
️️️️   └── web.php          # Web routes
️️️️ utility/
️️️️   └── Migrations.php   # Database migrations
️️️️ .env                 # Environment variables (database credentials)
️️️️ Dockerfile           # Docker setup
️️️️ README.md            # Project documentation
```

## 🚀 Features

✅ **User Authentication** (Register, Login, Logout)  
✅ **Event Management** (Create, Edit, Delete Events)  
✅ **Custom Router** (No framework, pure PHP)  
✅ **MVC Architecture** (Follows Model-View-Controller pattern)  
✅ **Secure Password Hashing** (Using `password_hash` and `password_verify`)  
✅ **PDO Database Connection** (Prevents SQL Injection)  
✅ **Bootstrap UI** (Responsive frontend)  

## 📌 Installation

### 1️⃣ Clone the repository:
```sh
git clone https://github.com/yourusername/eventllyo.git
cd eventllyo
```

### 2️⃣ Setup the database:
- Import `eventllyo.sql` from the `utility/` folder into MySQL.
- Or run database migrations:
```sh
php utility/initialize_db.php
```

### 3️⃣ Configure the environment:
- Rename `.env.example` to `.env` and update database credentials:
```ini
DB_HOST=localhost
DB_NAME=eventllyo
DB_USER=root
DB_PASS=
```

### 4️⃣ Start the development server:
Using **XAMPP** (Windows):
- Move the project folder (`eventllyo/`) to `C:/xampp/htdocs/`
- Open [http://localhost/eventllyo/public](http://localhost/eventllyo/public)

Using **PHP Built-in Server**:
```sh
php -S localhost:8000 -t public/
```

Then open [http://localhost:8000](http://localhost:8000) in your browser.

## 🛠️ Technologies Used

- **PHP** (Native, No Frameworks)
- **MySQL** (Database)
- **PDO** (Secure Database Connection)
- **Bootstrap** (Frontend Styling)
