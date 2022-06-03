![CI](https://github.com/bradsi/bookshelf/actions/workflows/tests-and-coverage.yaml/badge.svg)  
[![coverage](https://codecov.io/gh/bradsi/bookshelf/branch/main/graph/badge.svg?token=LR0D234IJQ)](https://codecov.io/gh/bradsi/bookshelf)

Bookshelf is a toy project I'm building to do some learning experiments.

## Installation
1) Clone the repo
```bash
gh repo clone bradsi/bookshelf && cd bookshelf
```

2) Create the database
```bash
mysql -u root -p
create database bookshelf;
exit;
```

3) Install dependencies, migrate and start the demo
```bash
composer install
cp .env.example .env
php artisan key:generate
npm install && npm run dev
php artisan migrate --seed
php artisan serve
```


## Todo
- [ ] Practice unit testing and feature testing using [Pest](https://github.com/pestphp/pest).
- [ ] Containerise the application using Docker
- [ ] Put into practice what I've learned from Jonathan Reinink's Eloquent Performance Patterns course
- [ ] Try to identify some functionality that can be extracted from the application and built into a package
- [ ] Deploy the application on AWS
- [ ] Improve Actions to run CD on the application
- [ ] Put into practice what I've learned from the Refactoring UI course
- [ ] Play around with [Mermaid.js](https://github.com/mermaid-js/mermaid); alternatively use draw.io to diagram some processes, but I like the idea of 'diagrams as code'
- [ ] Implement [Shepherd.js](https://github.com/shipshapecode/shepherd)
- [ ] Implement uptime monitoring
- [ ] Implement real time notifications
- [ ] Application Performance Monitoring
- [ ] Documentation
- [ ] PWA
- [ ] Make a nice README
- [ ] Implement roles and permissions

## Done
- [x] CRUD features
- [x] Use [Rector](https://github.com/rectorphp/rector) and/or [Rector Laravel](https://github.com/rectorphp/rector-laravel) to upgrade from PHP 7.4 to PHP 8.1
- [x] Create a style guide based on [PSR](https://www.php-fig.org/psr/)
- [x] Implement the style guide with [PHP CS Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer)
- [x] Implement static analysis with [PHPStan](https://github.com/phpstan/phpstan) and [Larastan](https://github.com/nunomaduro/larastan)
- [x] Implement GitHub Actions for:
  - [x] Dependency Review - dependency vulnerability check
  - [x] PHP CS Fixer - styling / formatting
  - [x] PHPStan - static code analysis
  - [x] Pest and PCOV - unit tests, feature tests, and code coverage
- [x] Implement Dependabot to keep track of security flaws
