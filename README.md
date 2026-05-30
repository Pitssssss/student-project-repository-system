# Student Project Repository System

## Overview

The Student Project Repository System is a CodeIgniter 4 web application that allows students to submit and manage academic projects. The system supports project uploads, email notifications, pagination, search functionality, and security protections against common web attacks.

## Features

### Security

* CSRF Protection
* XSS Prevention using `esc()`
* Input Validation

### Advanced Features

* File Upload System
* Email Notification via SMTP
* Search Functionality
* Pagination
* Performance Optimization
* Debug Toolbar

### Testing & Debugging

* PHPUnit Test Suite
* dd() Debugging
* Stack Trace Analysis
* Bug Fix Documentation

## Technologies Used

* CodeIgniter 4
* PHP 8.2
* MySQL
* phpMyAdmin
* PHPUnit
* GitHub

## Installation

1. Clone the repository.
2. Run:

```bash
composer install
```

3. Configure `.env` file.
4. Create database.
5. Run migrations:

```bash
php spark migrate
```

6. Start development server:

```bash
php spark serve
```

## Project Structure

* Controllers
* Models
* Views
* Database Migrations
* Tests

## Author

Peter John Bitara

Advanced Web Development Final Project
