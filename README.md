# Laravel Blog Application

A simple blog application built with Laravel, where users can create, edit, view, and delete blog posts. The application includes comments functionality, and posts are managed by authenticated users.

## Features

- User authentication and authorization (using Laravel Breeze).
- Create, edit, and delete blog posts.
- Cretae and delete comments on posts.
- Display posts with properly formatted content (including line breaks).
- Pagination for blog posts.
- Full CRUD functionality for posts and comments.

## Requirements

- PHP >= 8.0
- Composer
- MySQL
- Node.js (for frontend dependencies)
- Laravel 10.x

## Installation

Follow these steps to install and run the project on your local machine:

1. **Clone the repository:**

   ```bash
   git clone https://github.com/hassanfaheem/laravel-blog.git
   cd laravel-blog
   ```

2. **Set up the environment file:**
    Copy the .env.example file to .env and update your database:
   ```bash
   cp .env.example .env
   ```
   
3. **Run database migrations:**

    Copy the .env.example file to .env and update your database:
   ```bash
   php artisan migrate
   ```

4. **Run database migrations:**

    You can seed the database with sample data for testing:
   ```bash
   php artisan db:seed
   ```

5. **Run database migrations:**

    Compile the frontend assets:
   ```bash
   npm install && npm run dev
   ```

6. **Serve the application:**

    Run the application locally:
   ```bash
   php artisan serve
   ```
    The app will be available at `http://localhost:8000`
