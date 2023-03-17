# Backend Recruitment Test

## Installation

**Clone repository and go to repository directory** 
```bash
cp .env.example .env
```
```bash
make install
```
```bash
make up 
```

Finally, we want to be able to create SSL certificates for our application,
so run the following command inside `docker/nginx/ssl`:
```php
mkcert "*.landing-app.localhost" "landing-app.localhost"
```
And rename the following files like this:

`app-cert.pem`

`app-key.pem`

**Excellent, now you can open the following address in your browser**
https://landing-app.localhost/



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
