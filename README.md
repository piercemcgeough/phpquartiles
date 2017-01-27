# phpquartiles

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

PHP package for working out quartile values and placements based on a numeric array.

phpquartiles will return the 1st, 2nd and 3rd quartiles. You can also then find the quartile placement of a given score.

## Install

Via Composer

`$ composer require PierceMcGeough/phpquartiles`

## Usage

```
$scoresArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
$quartiles = new PierceMcGeough\phpquartiles\Quartile();
```

### Quartile Commands
`$quartiles->getAllQuartiles();`

    // returns
    [
        [q1] => 4
        [q2] => 8
        [q3] => 12
    ]

`$quartiles->getFirstQuartile();`

    // returns 
    4

`$quartiles->getMedianQuartile();`

    // returns
    8

`$quartiles->getSecondQuartile();`

    // alias of getMedianQuartile
    // returns
    8

`$quartiles->getThirdQuartile();`

    // returns
    12

### Placement Commands
`$quartiles->getPlacement(15);`

    // returns
    HIGHEST_QUARTILE

`$quartiles->getPlacementInverse(15);`

    // returns
    LOWEST_QUARTILE


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
