# PSR-15 Turbolinks-Location Middleware _(michaelbiberich/turbolinks-location-middleware)_

[![standard-readme compliant](https://img.shields.io/badge/readme%20style-standard-brightgreen.svg?style=flat-square)](https://github.com/RichardLitt/standard-readme)
[![PDS Skeleton](https://img.shields.io/badge/pds-skeleton-blue.svg?style=flat-square)](https://github.com/php-pds/skeleton)
[![Latest version on Packagist](http://img.shields.io/packagist/v/michaelbiberich/turbolinks-location-middleware.svg?style=flat-square)](https://packagist.org/packages/michaelbiberich/turbolinks-location-middleware)

> PSR-15 compliant implementation of MiddlewareInterface to insert Turbolinks-Location header into every response

See the [Turbolinks documentation on following redirects].

Inspired by [code-orange/turbolinks-location].

## Table of Contents

- [Install](#install)
  - [Tests](#tests)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Install

Add **turbolinks-location-middleware** as a dependency to your project with 
[composer].

```
composer require michaelbiberich/turbolinks-location-middleware ^1 
```

### Tests

Tests can be run using [PHPUnit], see [phpunit.xml.dist].

```
phpunit --configuration ./phpunit.xml.dist
```

Code Coverage can be reported as well, eg by using [PHPDBG].

```
phpdbg -qrr ./vendor/bin/phpunit --coverage-text
```

Composer scripts are available for both tasks.

```
composer test
composer coverage
```

> A quick way to run these without installing composer can be achieved by using 
> the official [composer Docker Image].
> 
> Eg `docker run --rm --interactive --tty --volume $PWD:/app composer coverage`

## Usage

Create a new instance of `TurbolinksLocationMiddleware` and Add it to your 
dispatcher/route handler/pipe:

```php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use MichaelBiberich\TurbolinksLocationMiddleware\TurbolinksLocationMiddleware;

$turbolinksLocation = new TurbolinksLocationMiddleware;

// ---
// Example: Slim 4 application middleware
// see: http://www.slimframework.com/docs/v4/concepts/middleware.html
// ---

use Slim\Factory\AppFactory;

$app = AppFactory::create();

// ...

$app->add($turbolinksLocation);

// ---
// Example: Mezzio middleware pipe
// see: https://docs.laminas.dev/laminas-stratigility/v3/middleware/
// ---

use Laminas\Stratigility\MiddlewarePipe;
use function Laminas\Stratigility\middleware;

$app = new MiddlewarePipe();

// ...

$app->pipe(middleware($turbolinksLocation));
```

## Contributing

Feel free to dive in! [Open an issue](https://github.com/michaelbiberich/turbolinks-location-middleware/issues/new) or submit PRs.

## License

[BSD-3-Clause] © Michael Biberich

[Turbolinks documentation on following redirects]: https://github.com/turbolinks/turbolinks#following-redirects
[code-orange/turbolinks-location]: https://packagist.org/packages/code-orange/turbolinks-location
[composer]: https://getcomposer.org/
[PHPUnit]: https://phpunit.de/
[phpunit.xml.dist]: https://github.com/michaelbiberich/turbolinks-location-middleware/blob/HEAD/phpunit.xml.dist
[PHPDBG]: https://www.php.net/manual/en/book.phpdbg.php
[composer Docker Image]: https://hub.docker.com/_/composer/
[BSD-3-Clause]: https://github.com/michaelbiberich/turbolinks-location-middleware/blob/HEAD/LICENSE.md

