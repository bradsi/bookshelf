![CI](https://github.com/bradsi/bookshelf/actions/workflows/tests-and-coverage.yaml/badge.svg)  
[![coverage](https://codecov.io/gh/bradsi/bookshelf/branch/main/graph/badge.svg?token=LR0D234IJQ)](https://codecov.io/gh/bradsi/bookshelf)

Bookshelf is a toy project I'm building to do some learning experiments.

## Todo:
- [ ] CRUD features
- [ ] Use [Rector](https://github.com/rectorphp/rector) and/or [Rector Laravel](https://github.com/rectorphp/rector-laravel) to upgrade from PHP 7.4 to PHP 8.1
- [ ] Practice unit testing and feature testing using [Pest](https://github.com/pestphp/pest) and implement [PCOV](https://github.com/krakjoe/pcov)
- [ ] Containerise the application using Docker
- [ ] Put into practice what I've learned from Jonathan Reinink's Eloquent Performance Patterns course
- [ ] Try to identify some functionality that can be extracted from the application and built into a package
- [ ] Deploy the application on AWS
- [ ] Improve Actions or Pipelines to run CD on the application
- [ ] Put into practice what I've learned from the Refactoring UI course
- [ ] Play around with [Mermaid.js](https://github.com/mermaid-js/mermaid); alternatively use draw.io to diagram some processes, but I like the idea of 'diagrams as code'
- [ ] Implement [Shepherd.js](https://github.com/shipshapecode/shepherd)
- [ ] Implement uptime monitoring
- [ ] Implement real time notifications
- [ ] Application Performance Monitoring
- [ ] Documentation
- [ ] PWA
- [ ] Make a nice README
- [ ] Implement GitHub Actions for: Pest & PCOV
- [ ] Implement roles and permissions

## Done:
- [x] Create a style guide based on [PSR](https://www.php-fig.org/psr/)
- [x] Implement the style guide with [PHP CS Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer)
- [x] Implement static analysis with [PHPStan](https://github.com/phpstan/phpstan) and [Larastan](https://github.com/nunomaduro/larastan)
- [x] Implement GitHub Actions for:
  - [x] Dependency Review - dependency vulnerability check
  - [x] PHP CS Fixer - styling / formatting
  - [x] PHPStan - static code analysis
- [x] Implement Dependabot to keep track of security flaws
