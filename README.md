# Laravel Project

[![License](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE.md)

## Project Description

This Project Simple Ecommerce With Management Product, Management User, and Dashboard Admin

## Features

List the key features of your project.

- Login User
- Register User
- Login Admin
- Home Show Product With Filter
- Dashboard Admin with Summary Card yg menampilkan (Jumlah Produk, Jumlah User, Jumlah Produk aktif, Jumlah User aktif)
- Management Product
- Management User

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP >= 8.1.14
- Composer installed
- MySQL
- SMTP Gmail Account

## Installation

Follow these steps to set up and run the project:

1. **Clone the Repository:**

    ```bash
    git clone https://github.com/fajaramaulana/simple-ecommerce-2-vscmm
    ```

2. **Install Dependencies:**

    ```bash
    cd simple-ecommerce-2-vscmm
    composer install
    ```

3. **Create a Copy of the .env File:**

    ```bash
    cp .env.example .env
    ```

4. **Configure the Database:**

    Open the `.env` file and set the database connection details:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

5. **Configure SMTP for Email (Using Gmail):**

    Open the `.env` file and set the email configuration:

    ```env
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=your_email@gmail.com
    MAIL_PASSWORD=your_gmail_password
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=your_email@gmail.com
    MAIL_FROM_NAME="${APP_NAME}"
    ```

6. **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```

7. **Run Migrations:**

    ```bash
    php artisan migrate
    ```

8. **Serve the Application:**

    ```bash
    php artisan serve
    ```

    Visit `http://localhost:8000` in your browser.

## Usage

Provide instructions on how to use and interact with your Laravel project.

## Contribution

If you would like to contribute to this project, please follow the [contribution guidelines](CONTRIBUTING.md).

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

## Contact

For inquiries, reach out to Fajar at fajaramaulana.dev@gmail.com.
