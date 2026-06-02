# Barber's Club 💈
### A Full-Stack Salon Management Web Application

Built as a mini-project during my Bachelor's degree (2020), this is a complete salon booking and management system built with PHP, MySQL, and Bootstrap.

---

## 🚀 Features

**Customer Side**
- User registration and login
- Browse services and packages with pricing
- Book appointments (date, time, stylist)
- Home service booking
- Real-time chat with salon workers
- Payment integration
- View and manage bookings
- User profile management
- Leave feedback

**Admin Dashboard**
- Manage services and packages (add/edit/delete)
- Manage workers (add/edit/delete with photo upload)
- View all appointments and bookings
- View and reply to customer queries
- Email notifications via PHPMailer
- User management
- Revenue/booking overview

---

## 🛠 Tech Stack

| Layer      | Technology                        |
|------------|-----------------------------------|
| Backend    | PHP 7.4                           |
| Database   | MySQL / MariaDB                   |
| Frontend   | HTML5, CSS3, Bootstrap 4, jQuery  |
| Admin UI   | Material Dashboard (Bootstrap)    |
| Email      | PHPMailer                         |
| Auth       | PHP Sessions + `password_hash()`  |

---

## 🔒 Security

- All database queries use **prepared statements** (no SQL injection)
- Passwords stored using **`password_hash(PASSWORD_DEFAULT)`** (bcrypt)
- Input sanitisation on all form fields
- File upload validation (type + size checks)
- Session-based authentication

---

## ⚙️ Setup Instructions

### Requirements
- PHP 7.4+
- MySQL / MariaDB
- A local server: XAMPP, WAMP, or MAMP

### Steps

1. **Clone the repo**
   ```bash
   git clone https://github.com/YOUR_USERNAME/barbersclub.git
   cd barbersclub
   ```

2. **Import the database**
   - Open phpMyAdmin
   - Create a new database called `salon`
   - Import `salon.sql`

3. **Configure the database connection**

   Copy `.env.example` to `.env` and fill in your credentials:
   ```
   DB_HOST=localhost
   DB_USER=root
   DB_PASS=
   DB_NAME=salon
   ```

   Or edit `salon/dbconnect.php` directly for local dev.

4. **Run the project**
   - Place the `salon/` folder inside your server's web root (e.g. `htdocs/` for XAMPP)
   - Visit `http://localhost/salon/`

### Demo Login Credentials

| Role  | Email                      | Password  |
|-------|----------------------------|-----------|
| Admin | admin@barbersclub.com      | Admin@123 |
| User  | user@barbersclub.com       | User@123  |

---

## 📁 Project Structure

```
salon/
├── index.php              # Public homepage
├── login.php              # Login page
├── registration.php       # User registration
├── dbconnect.php          # Database connection
├── admin/
│   └── html/              # Admin dashboard pages
│       ├── adminhomepage.php
│       ├── addservice.php
│       ├── addworkers.php
│       ├── viewusers.php
│       └── ...
├── pretty/                # Customer-facing pages (logged-in)
│   ├── index.php
│   ├── bookings.php
│   ├── services.php
│   └── ...
└── chat/
    └── index.php          # Live chat feature
```

---

## 📸 Screenshots

*(Add screenshots here after deployment)*

---

## 📚 What I Learned

- Full MVC-style separation between admin and customer views
- PHP session management and role-based access control
- Relational database design with foreign key constraints
- File upload handling and validation
- Email integration using PHPMailer
- Responsive UI design with Bootstrap

---

## 👤 Author

**Chithranjaly** — MSc Computing Graduate  
[LinkedIn](https://linkedin.com/in/YOUR_PROFILE) | [GitHub](https://github.com/YOUR_USERNAME)
