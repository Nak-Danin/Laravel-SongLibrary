# 🎵 Song Library

<p align="center">
  A clean and functional <strong>Laravel Song Library</strong> for managing, exploring, and organizing music.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-Framework-red?style=for-the-badge&logo=laravel">
  <img src="https://img.shields.io/badge/MySQL-Database-blue?style=for-the-badge&logo=mysql">
  <img src="https://img.shields.io/badge/TailwindCSS-Styling-38B2AC?style=for-the-badge&logo=tailwindcss">
  <img src="https://img.shields.io/badge/Status-Active-success?style=for-the-badge">
</p>

---

## 📌 Overview

**Song Library** is a Laravel-based web application designed to:

- Organize songs by genre
- Manage a full library with CRUD operations
- Provide filtering, searching, and sorting features
- Deliver a smooth and intuitive UI experience

---

## ✨ Features

### 🏠 Dashboard

- Songs grouped by **category (genre)**
- Quick overview of your music collection

---

### 🎧 Library

- Display **all songs**
- Full CRUD functionality:
    - ➕ Create songs
    - 👁️ View details
    - ✏️ Update songs
    - ❌ Delete (logical delete using `is_active`)
- View page includes:
    - 🔗 Songs from the **same artist**

---

### ⭐ Favorites

- Songs marked as **favorite**
- Grouped by **genre**
- Filtered via **route-based genre**
- Includes:
    - 🔍 Search functionality
    - 🔃 Sorting:
        - Title
        - Artist
        - Published Date
        - Recently Added

---

## 🧩 Components

Reusable Blade components used in the project:

- `x-layout` → Main layout
- `x-slot` → Dynamic content injection
- `x-nav-link` → Navigation links
- `x-genre` → Genre UI & filtering

---

## 🗄️ Database

**Database:** MySQL  
**Table:** `songs`

| Field          | Description         |
| -------------- | ------------------- |
| song_id        | Primary key         |
| title          | Song title          |
| artist         | Artist name         |
| genre          | Song category       |
| published_date | Release date        |
| is_active      | Logical delete flag |
| is_favorite    | Favorite status     |
| created_at     | Created timestamp   |
| updated_at     | Updated timestamp   |

---

## 🎨 UI & Navigation

- Clean and modern interface
- Smooth navigation between:
    - Dashboard
    - Library
    - Favorites
- Responsive design for better usability

---

## ⚙️ Tech Stack

| Layer    | Technology           |
| -------- | -------------------- |
| Backend  | Laravel              |
| Frontend | Blade + Tailwind CSS |
| Database | MySQL                |

---

## 🚀 Getting Started

### 1. Clone the repository

````bash
git clone <your-repo-url>
cd song-library
2. Install dependencies
composer install
npm install && npm run dev
3. Setup environment
cp .env.example .env
php artisan key:generate
4. Configure database

Update your .env file with your MySQL credentials.

5. Run migrations
php artisan migrate
6. Start the server
php artisan serve
📈 Future Improvements
🔐 Authentication (user-based libraries)
🎵 Upload song images/audio
📱 API for mobile integration
📂 Playlist system
👨‍💻 Author

Developed as a learning project to practice:

Laravel CRUD operations
Routing & Controllers
Blade components
UI structuring
<p align="center"> ⭐ If you found this useful, consider starring the repo! </p> ```
````

<h2 align="center">📸 Preview</h2>

<p align="center">
  <strong>Dashboard</strong><br>
  <img src="{{ asset('images/dashboard.png') }}" width="800" alt="Dashboard">
</p>

<p align="center">
  <strong>Library (CRUD)</strong><br>
  <img src="{{ asset('images/Library.png') }}" width="800" alt="Library">
  <p>Create Page</p>
  <img src="{{ asset('images/create.png') }}" width="800" alt="create">
  <p>View Page</p>
  <img src="{{ asset('images/view.png') }}" width="800" alt="view">
  <p>Update Page</p>
  <img src="{{ asset('images/update.png') }}" width="800" alt="update">
</p>

<p align="center">
  <strong>Favorites (Search & Sort)</strong><br>
  <img src="{{ asset('images/favorite-grid.png') }}" width="800" alt="Favorites-grid">
  <img src="{{ asset('images/favorite-list.png') }}" width="800" alt="Favorites-list">
</p>
