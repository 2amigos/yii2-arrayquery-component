ArrayQuery Component for Yii2
======================

Allows filtering of an array

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require "2amigos/yii2-arrayquery-component" "*"
```
or add

```json
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



> [![2amigOS!](http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png)](http://www.2amigos.us)

<i>Web development has never been so fun!</i>
[www.2amigos.us](http://www.2amigos.us)