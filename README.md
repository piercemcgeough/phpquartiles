# phpquartiles

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

PHP package for working out quartile values and placements based on a numeric array.

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practises by being named the following.

```
bin/        
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require PierceMcGeough/phpquartiles
```

## Usage

``` php
$skeleton = new PierceMcGeough\phpquartiles();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email pmcgeough@hotmail.co.uk instead of using the issue tracker.

## Credits

- [Pierce McGeough][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/PierceMcGeough/phpquartiles.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/PierceMcGeough/phpquartiles/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/PierceMcGeough/phpquartiles.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/PierceMcGeough/phpquartiles.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/PierceMcGeough/phpquartiles.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/PierceMcGeough/phpquartiles
[link-travis]: https://travis-ci.org/PierceMcGeough/phpquartiles
[link-scrutinizer]: https://scrutinizer-ci.com/g/PierceMcGeough/phpquartiles/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/PierceMcGeough/phpquartiles
[link-downloads]: https://packagist.org/packages/PierceMcGeough/phpquartiles
[link-author]: https://github.com/PierceMcGeough
[link-contributors]: ../../contributors
