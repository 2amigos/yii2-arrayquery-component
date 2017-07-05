ArrayQuery Component for Yii2
=============================

[![Latest Version](https://img.shields.io/github/tag/2amigos/yii2-arrayquery-component.svg?style=flat-square&label=release)](https://github.com/2amigos/yii2-arrayquery-component/tags)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/2amigos/yii2-arrayquery-component/master.svg?style=flat-square)](https://travis-ci.org/2amigos/yii2-arrayquery-component)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/2amigos/yii2-arrayquery-component.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-arrayquery-component/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/2amigos/yii2-arrayquery-component.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-arrayquery-component)
[![Total Downloads](https://img.shields.io/packagist/dt/2amigos/yii2-arrayquery-component.svg?style=flat-square)](https://packagist.org/packages/2amigos/yii2-arrayquery-component)

Allows searching/filtering of an array. This component is very useful when displaying array data in GridViews with an
ArrayDataProvider.

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require "2amigos/yii2-arrayquery-component" "*"
```
or add

```
"2amigos/yii2-arrayquery-component" : "*"
```

to the require section of your application's `composer.json` file.

Usage
-----

```
\\ $models is the array elements to used with ArrayDataProvider

$query = new ArrayQuery($models);

$models = $query
    ->addCondition('name', '~2amigos')
    ->addCondition('name', 'cebe/yii2-gravatar', 'or')
    ->find();

$dataProvider = new ArrayDataProvider([
    'allModels' => $models,
    'pagination' => [
        'pageSize' => 50,
    ],
    'sort' => [
        'attributes' => [], // to be specified
    ],
]);

```

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Antonio Ramirez](https://github.com/tonydspaniard)
- [All Contributors](../../contributors)

## License

The BSD License (BSD). Please see [License File](LICENSE.md) for more information.


> [![2amigOS!](http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png)](http://www.2amigos.us)

<i>Custom Software | Web & Mobile Software Development</i>
[www.2amigos.us](http://www.2amigos.us)
