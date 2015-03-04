<?php
include_once('Autoloader.php');
// register loader
spl_autoload_register(array('AutoLoader', 'loadClass'));
// Register the directory to your include files
AutoLoader::registerClass('dosamigos\arrayquery\ArrayQuery', __DIR__ . '/../src/ArrayQuery.php');
AutoLoader::registerClass('dosamigos\arrayquery\conditions\Condition', __DIR__ . '/../src/conditions/Condition.php');
AutoLoader::registerClass('dosamigos\arrayquery\conditions\Equal', __DIR__ . '/../src/conditions/Equal.php');
AutoLoader::registerClass('dosamigos\arrayquery\conditions\GreaterThan', __DIR__ . '/../src/conditions/GreaterThan.php');
AutoLoader::registerClass(
    'dosamigos\arrayquery\conditions\GreaterThanOrEqual',
    __DIR__ . '/../src/conditions/GreaterThanOrEqual.php'
);
AutoLoader::registerClass('dosamigos\arrayquery\conditions\LessThan', __DIR__ . '/../src/conditions/LessThan.php');
AutoLoader::registerClass(
    'dosamigos\arrayquery\conditions\LessThanOrEqual',
    __DIR__ . '/../src/conditions/LessThanOrEqual.php'
);
AutoLoader::registerClass('dosamigos\arrayquery\conditions\Like', __DIR__ . '/../src/conditions/Like.php');
AutoLoader::registerClass('dosamigos\arrayquery\conditions\NotLike', __DIR__ . '/../src/conditions/NotLike.php');
