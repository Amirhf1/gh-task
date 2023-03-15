# Backend Recruitment Test

## Installation

**Clone repository and go to repository directory** 
```bash
cp .env.example .env
```
```bash
composer i 
```
```bash
docker-compose build 
```
```bash
make up 
```

## Running Tests

To run tests, run the following command

```bash
make test 
```

Code coverage report (HTML)
```bash
make coverage 
```

## Code Style

Improve code style with **[laravel/pint](https://github.com/laravel/pint)**

Show the parts that have problems
```bash
make phpcs
```

## Authors

- [@Amirhf1](https://www.github.com/Amirhf1)

#### Technology & Framework
- PHP >= 8.1
- Laravel > 9.19
