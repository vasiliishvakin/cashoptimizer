<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/vasiliishvakin/cashoptimizer/main/art/repository-open-graph.png" width="400" alt="CashOptimizer
 Logo"></a></p>

<p align="center">
<img alt="GitHub" src="https://img.shields.io/github/license/vasiliishvakin/cashoptimizer">

</p>


# CashOptimizer

CashOptimizer is a web application that helps users manage their expenses and optimize their cash flow. The application allows users to track their expenses, set budgets, and find the best deals and lowest prices on products.

## Features
- Expense tracking
- Budget setting
- Price comparison
- Shopping list
- Shopping history
- Reports and analytics

## Tech Stack
- PHP
- Laravel
- MySQL
- JavaScript
- HTML/CSS
- Docker Compose

## Installation
```
$ git clone https://github.com/vasiliishvakin/CashOptimizer.git
$ cd CashOptimizer
$ docker-compose up -d
$ docker-compose exec php bash
$ cd src/
$ composer install
$ php artisan key:generate
$ php artisan migrate
```

## Usage
The application will be available at http://localhost

## Stopping the Application
To stop the application use the following command:
$ docker-compose down

## Contributions
We welcome contributions to CashOptimizer. If you would like to contribute, please follow our [contributing guidelines](CONTRIBUTING.md).

## License
CashOptimizer is licensed under the [Apache License 2.0](LICENSE).
