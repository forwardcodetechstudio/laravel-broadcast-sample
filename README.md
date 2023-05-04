# Laravel Broadcast Sample

This repository provides a sample application that demonstrates how to implement client-server communication using Laravel Broadcast.

## Features

- Real-time broadcasting of events to multiple clients.
- Easy setup and configuration.

## Requirements

- PHP 7.3 or higher
- Laravel 8.x

## Installation

1. Clone this repository to your local machine.
2. Install the dependencies using Composer:

```bash
composer install
```

3. Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

4. Generate a new application key:

```bash
php artisan key:generate
```

5. Set up a database and update the `DB_*` variables in your `.env` file.
6. Migrate and seed the database:

```bash
php artisan migrate --seed
```

7. Start the Laravel development server:

```bash
php artisan serve
```

8. Start the Laravel WebSockets server:

```bash
php artisan websockets:serve
```

9. Listen to queued jobs:

```bash
php artisan queue:listen
```

10. Visit `http://localhost:8000` in your web browser to view the application.

## Usage

1. Open two or more browser windows and navigate to the application.
2. Open `http://localhost:8000/login-user1` on one browser.
3. Open `http://localhost:8000/login-user2` on another browser.
4. Send and observe real-time updates on all clients.

## Support

If you encounter any issues or have questions about the Laravel Broadcast sample, please [open a new issue](https://github.com/forwardcodetechstudio/laravel-broadcast-sample/issues/new) on GitHub.

## Contributing

Contributions are welcome and encouraged! If you would like to contribute to the Laravel Broadcast sample, please [open a pull request](https://github.com/forwardcodetechstudio/laravel-broadcast-sample/pulls) on GitHub.

## License

This repository is licensed under the [MIT License](https://opensource.org/licenses/MIT).
