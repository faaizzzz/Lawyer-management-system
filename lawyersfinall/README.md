# ⚖️ Lawyer Management System

The **Lawyer Management System** is a PHP-based web application designed to simplify the process of connecting users with qualified lawyers. The system provides separate dashboards for **Users**, **Lawyers**, and **Administrators**, enabling efficient case management, lawyer selection, and administrative approval.

The project streamlines legal service management by allowing users to search for lawyers based on their specialization, review their profiles, and submit case requests, while lawyers can manage incoming cases and administrators oversee the entire system.

---

# 🚀 Features

## 👤 User Module

- User Registration and Login
- Search Lawyers by Category/Specialization
- View Lawyer Profiles
- View Experience and Ratings
- Send Case Requests
- Track Request Status

---

## 👨‍⚖️ Lawyer Module

- Lawyer Registration/Login
- Lawyer Dashboard
- View Incoming Case Requests
- Accept or Reject Cases
- Manage Assigned Cases
- View Client Information

---

## 👨‍💼 Admin Module

- Secure Admin Dashboard
- Manage Users
- Manage Lawyers
- Approve Lawyer Registrations
- Approve User Requests
- Monitor System Activities
- Manage Categories
- View Overall System Information

---

# 🏗️ System Architecture

```
                 User
                   │
                   ▼
          User Dashboard
                   │
        Search Lawyer by Category
                   │
                   ▼
           Lawyer Profiles
                   │
          Send Case Request
                   │
                   ▼
          Lawyer Dashboard
                   │
      Accept / Reject the Case
                   │
                   ▼
           Admin Dashboard
                   │
      Verify & Approve Requests
                   │
                   ▼
        Case Successfully Assigned
```

---

# 🛠️ Technologies Used

## Frontend

- HTML5
- CSS3
- JavaScript
- Bootstrap

## Backend

- PHP

## Database

- MySQL

## Server

- Apache (Laragon)

---

# 📂 Project Structure

```
Lawyer-Management-System/
│
├── admin/
├── lawyer/
├── user/
├── css/
├── js/
├── images/
├── database/
├── includes/
├── config.php
├── index.php
├── login.php
├── register.php
└── README.md
```

---

# ⚙️ Installation

## Prerequisites

- Laragon
- PHP 8.x or above
- MySQL
- Apache

---

## Installation Steps

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/Lawyer-Management-System.git
```

or download the ZIP file.

---

### 2. Move Project

Copy the project folder into

```
C:\laragon\www\
```

---

### 3. Start Laragon

Open Laragon and click

```
Start All
```

---

### 4. Create Database

Open **phpMyAdmin**

```
http://localhost/phpmyadmin
```

Create a database named

```
lawyer_management
```

---

### 5. Import Database

Import the provided SQL file into the database.

---

### 6. Configure Database Connection

Update your database credentials inside

```
config.php
```

Example

```php
$host = "localhost";
$user = "root";
$password = "";
$database = "lawyer_management";
```

---

### 7. Run the Project

Open your browser

```
http://localhost/Lawyer-Management-System
```

---

# 🔄 Workflow

1. User registers or logs in.
2. User searches lawyers by specialization.
3. Matching lawyers are displayed.
4. User views lawyer profile.
5. User submits a case request.
6. Lawyer receives the request.
7. Lawyer accepts or rejects the case.
8. Administrator verifies and manages the system.
9. Approved cases become active.

---

# 👥 User Roles

### User

- Register/Login
- Search Lawyers
- View Profiles
- Send Case Requests
- View Request Status

### Lawyer

- Login
- View Case Requests
- Accept/Reject Cases
- Manage Cases

### Admin

- Login
- Manage Lawyers
- Manage Users
- Approve Registrations
- Monitor Activities

---

# 📊 Project Highlights

- Multi-user Authentication
- Role-Based Access Control
- Lawyer Recommendation by Category
- Case Request Management
- Admin Approval System
- Responsive User Interface
- Secure Login System
- MySQL Database Integration

---

# 🔒 Security Features

- Login Authentication
- Session Management
- Role-Based Authorization
- Secure Database Connectivity
- Input Validation

---

# 📈 Future Enhancements

- Online Payment Integration
- Video Consultation
- AI-Based Lawyer Recommendation
- Live Chat
- Appointment Scheduling
- Email Notifications
- SMS Alerts
- Document Upload
- Case Progress Tracking
- Multi-language Support

---

# 📸 Screenshots

- Home Page
- User Dashboard
- Lawyer Dashboard
- Admin Dashboard
- Lawyer Search
- Lawyer Profile
- Case Request Page

(Add screenshots here.)

---

# 👨‍💻 Author

**Faaiz Shaikh**

Bachelor of Engineering

Artificial Intelligence & Data Science

---

# 📄 License

This project is developed for educational and academic purposes.

---

# ⭐ Acknowledgements

- PHP
- MySQL
- Laragon
- Apache
- Bootstrap
