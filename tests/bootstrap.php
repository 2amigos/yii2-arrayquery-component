<?php
include_once('Autoloader.php');
// Register the directory to your include files
AutoLoader::registerClass('dosamigos\arrayquery\ArrayQuery', __DIR__ . '/../ArrayQuery.php');
AutoLoader::registerClass('dosamigos\arrayquery\conditions\Condition', __DIR__ . '/../conditions/Condition.php');
AutoLoader::registerClass('dosamigos\arrayquery\conditions\Equal', __DIR__ . '/../conditions/Equal.php');
AutoLoader::registerClass('dosamigos\arrayquery\conditions\GreaterThan', __DIR__ . '/../conditions/GreaterThan.php');
AutoLoader::registerClass('dosamigos\arrayquery\conditions\GreaterThanOrEqual', __DIR__ . '/../conditions/GreaterThanOrEqual.php');
AutoLoader::registerClass('dosamigos\arrayquery\conditions\LessThan', __DIR__ . '/../conditions/LessThan.php');
AutoLoader::registerClass('dosamigos\arrayquery\conditions\LessThanOrEqual', __DIR__ . '/../conditions/LessThanOrEqual.php');
AutoLoader::registerClass('dosamigos\arrayquery\conditions\Like', __DIR__ . '/../conditions/Like.php');
AutoLoader::registerClass('dosamigos\arrayquery\conditions\NotLike', __DIR__ . '/../conditions/NotLike.php');
