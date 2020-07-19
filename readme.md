# AHVValidator


## Installation

Via Composer

``` bash
$ composer require mergimuka/ahv-validator
```

## Usage
``` bash
    use mergimuka\AHVValidator\Facades\AHVValidator;
    $result = AHVValidator::check('756.9217.0769.85');
```
## Result
``` bash
    {
    "valid": true,
    "length": 13,
    "description": "AHV number is correct."
    }
```
## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.


## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [author name][link-author]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/mergimuka/ahvvalidator.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/mergimuka/ahvvalidator.svg?style=flat-square


[link-packagist]: https://packagist.org/packages/mergimuka/ahv-validator
[link-downloads]: https://packagist.org/packages/mergimuka/ahv-validator
[link-author]: https://github.com/mergimukaa
[link-contributors]: ../../contributors
