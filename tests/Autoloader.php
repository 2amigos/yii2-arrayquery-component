<?php
/**
 * AutoLoader custom class autoloader to test namespaced classes
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 */
class AutoLoader
{

	/**
	 * @var array the class names
	 */
	static private $classNames = array();

	/**
	 * Store the filename (sans extension) & full path of all ".php" files found. This is good for namespaces with
	 * directory tree structure.
	 */
	public static function registerDirectory($dirName)
	{

		$di = new DirectoryIterator($dirName);
		foreach ($di as $file) {

			if ($file->isDir() && !$file->isLink() && !$file->isDot()) {
				// recurse into directories other than a few special ones
				self::registerDirectory($file->getPathname());
			} elseif (substr($file->getFilename(), -4) === '.php') {
				// save the class name / path of a .php file found
				$className = substr($file->getFilename(), 0, -4);
				self::registerClass($className, $file->getPathname());
			}
		}
	}

	/**
	 * Registers a classname. This method is particularly good for match full namespace classes to files.
	 * @param string $className the full namespace class
	 * @param string $fileName the full path to the file
	 */
	public static function registerClass($className, $fileName)
	{
		self::$classNames[$className] = $fileName;
	}

	/**
	 * Loads a class
	 * @param $className
	 */
	public static function loadClass($className)
	{
		if (isset(self::$classNames[$className])) {
			require_once(self::$classNames[$className]);
		}
	}
}