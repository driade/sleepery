# PHP wrapper for the sleep() and usleep() functions for easy testing

[![Packagist](https://img.shields.io/packagist/v/driade/sleepery.svg?style=flat-square)](https://packagist.org/packages/driade/sleepery)
[![Tests](https://img.shields.io/github/actions/workflow/status/driade/sleepery/github.yml?branch=main&label=tests&style=flat-square)](https://github.com/driade/sleepery/actions/workflows/github.yml)
[![Downloads](https://img.shields.io/packagist/dt/driade/sleepery.svg?style=flat-square)](https://packagist.org/packages/driade/sleepery)

This package allows you to easily test the sleep() and usleep() functions without having to "wait".

## Installation

You can install the package via composer:

```bash
composer require driade/sleepery
```

## Usage

Instead of using sleep() in your code you should use

```php
Driade\Sleepery::dream(1);
```

and, instead of using usleep() in your code you should use

```php
Driade\Sleepery::nap(1000);
```

When it comes to test your code, you can use the "fake" function to make the calls to dream() and nap() recorded, so you can later test them.

In your tests

```php

use Driade\Sleepery;

Sleepery::fake();

(new PerformAction)->handle(); // execute your code

Sleepery::wakeup();

//

Sleepery::assertDreamt(1);
Sleepery::assertNapped(1000);
```

You may also use the following functions

```php
Sleepery::getDreams(); // returns all the dream() calls while dreaming
```

```php
Sleepery::getNaps(); // returns all the nap() calls while dreaming
```

```php
Sleepery::wakeup(); // stop dreaming
```

## Testing

```bash
composer test
```

## Contributing

Please feel free to open an issue or pull request if you think something can be improved

## Credits

- [David Fernández](https://github.com/driade)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.