# Task-List

**Task-List** is a simple task management web application built with Laravel with MySQL Database integration.

---

## Table of Contents

- [Features](#features)  
- [Technologies Used](#technologies-used)  
- [Getting Started](#getting-started)  
  - [Prerequisites](#prerequisites)  
  - [Installation](#installation)  
  - [Running the App](#running-the-app)  
- [Folder Structure](#folder-structure)  
- [Contact](#contact)

---

## Features

- Add, view, edit, and delete tasks

---

## Technologies Used

- **Backend:** Laravel (PHP)  
- **Frontend Templates:** Blade, Tailwind CSS
- **Bundler/Build Tool:** Vite  
- **Development Tools:** Docker, docker-compose
- **Other:** [Composer, npm]

---

## Getting Started

## Prerequisites

Make sure you have the following installed:

- PHP
- Composer  
- Node.js & npm
- Docker & Docker Compose

## Installation

```bash
git clone https://github.com/habibullahsirat/Task-List.git
cd Task-List
cp .env.example .env
composer install
npm install
npm run dev       # or `npm run build` for production assets
php artisan key:generate
```

## Running the App
```bash
php artisan serve
```

## Folder Structure

```bash
app/            — Core application logic (models, controllers)
bootstrap/      
config/         — Configuration files
databases/       — Migrations, factories, seeders
public/         — Publicly accessible assets
resources/      — Blade views, CSS, JS
routes/         — Web routing definitions
storage/
tests/          — Automated tests
docker-compose.yml
.env
.example
```

## Contact
- Habibullah Sirat
- **Email:** habibullah.sirat.001@gmail.com
- **GitHub:** https://github.com/habibullahsirat
