<?php
// https://ruhighload.com/singleton+%D0%B2+php+%D0%BD%D0%B0+%D0%BF%D1%80%D0%B8%D0%BC%D0%B5%D1%80%D0%B5+%D0%BF%D0%BE%D0%B4%D0%BA%D0%BB%D1%8E%D1%87%D0%B5%D0%BD%D0%B8%D1%8F+%D0%BA+mysql
class Singleton
{

	private static $instances = []; // экземпляр класса

	protected function __construct() { }

	protected function __clone() { }

	public function __wakeup()
	{
		throw new \Exception("Cannot unserialize singleton");
	}

	public static function getInstance()
	{
		if (self::$instances != null) {
			return self::$instances;
		}

		return new self;
	}

	public function setParameter()
	{
		$serverName = 'flex.media';
		return $serverName;
	}

}

$param = Singleton::getInstance()->setParameter();

var_dump($param);

?>
