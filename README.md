# Responsive Web Design with Bootstrap
# By. Xavier Alers
# July 8th, 2024

This project demonstrates the implementation of a responsive web application using PHP and Bootstrap.

The application includes user authentication and  CRUD operations for posts, designed with responsive design principles.

## Table of Contents
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Setup Instructions](#setup-instructions)
- [Project Structure](#project-structure)
- [Usage](#usage)
- [Future Enhancements](#future-enhancements)

## Features
- User Registration and Login
- Create, Read, Update, and Delete (CRUD) Posts
- View individual posts
- Responsive design using Bootstrap

## Technologies Used
- PHP
- MySQL
- Bootstrap
- CSS (Future Design Use)
- XAMPP (Local Development)

## Setup Instructions
### Prerequisites
- XAMPP (Or any other PHP and MySql development environment)

### Steps
1. **Clone the Repository**:
    ```bash
    git clone https://github.com/CrunchyTaconess/responsive_design.git
    ```

2. **Move the project to the XAMPP `htdocs` directory**:
    ```bash
    mv responsive_design /path/to/xampp/htdocs/
    Example: "C:\xampp\htdocs\PHP_Interview_Projects\Responsive_Design"
    ```

3. **Start Apache and MySQL in XAMPP**.

4. **Create the database and tables**.
    - Open phpMyAdmin and create a new database named `responsive_design`.
    - Import the SQL schema:
    ```sql
    CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(100) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        title VARCHAR(255) NOT NULL,
        body TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id)
    );
    ```

5. **Configure the database connection**:
    -Open `includes/db.php` and update the database connection details if necessary:
    ```php
    <?php
    $host = 'localhost';
    $db = 'responsive_design';
    $user = 'root';
    $pass = '';

    $dsn = "mysql:host=$host;dbname=$db;charset=utf8";
    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    ?>
    ```

6.**Access the application**:
    - Open your web browser and navigate to:
    ```
    http://localhost/Responsive_Design/
    ```

    In my case, of being in a file folder:
    ```
    http://localhost/PHP_Interview_Projects/Responsive_Design/
    ```

## Project Structure
dynamic-web-app/
|--css/
|  --styles.css
|--includes/
|  --db.php
|--templates/
|  --header.php
|  --footer.php
|--index.php
|--register.php
|--login.php
|--logout.php
|--create_post.php
|__view_post.php

## Usage
### User Registration
- Navigate to `register.php` to create a new account.

### User Login
- Navigate to `login.php` to log in with your credentials.

### Create a Post
-After logging in, navigate to `create_post.php` to create a new post.

### View Posts
- The homepage (`index.php`) lists all posts. Click on a post title to view the details.

## Future Enhancements
- Add more robust error handling and validation.
- Implement a frontend framework for improved user experience.
- Integrate a CI/CD (Continuous Integration/Continuous Deployment) pipeline for automated testing and deployment

---

This project showcases my ability to develop a responsive web application using PHP and MySQL, demonstrating skills in frontend design and PHP development.. Feel free to reach out with any questions or feedback.
