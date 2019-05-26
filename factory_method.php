<?php

abstract class AbstractFactoryMethod {
	abstract function makePHPBook($param);
}

class Php5 extends AbstractFactoryMethod {
	private $context = "php5";
	function makePHPBook($param) {
		$book = NULL;
		switch ($param) {
			case "5":
				$book = new Php5Book;
				break;
			case "5.2":
				$book = new Php52Book;
				break;
			default:
				$book = new Php52Book;
				break;
		}
		return $book;
	}
}

class Php7 extends AbstractFactoryMethod {
	private $context = "php7";
	function makePHPBook($param) {
		$book = NULL;
		switch ($param) {
			case "7":
				$book = new Php7Book;
				break;
			default:
				$book = new Php73Book;
				break;
		}
		return $book;
	}
}

abstract class AbstractBook {
	abstract function getAuthor();
	abstract function getTitle();
}

abstract class AbstractPHPBook {
	private $subject = "PHP";
}

class Php5Book extends AbstractPHPBook {
	private $author;
	private $title;
	private static $oddOrEven = 'odd';
	function __construct() {
		if ('odd' == self::$oddOrEven) {
			$this->author = 'Kate';
			$this->title  = 'php 5';
			self::$oddOrEven = 'even';
		} else {
			$this->author = 'Irina';
			$this->title  = 'php 5 by Irina';
			self::$oddOrEven = 'odd';
		}
	}
	function getAuthor() {return $this->author;}
	function getTitle() {return $this->title;}
}

class Php52Book extends AbstractPHPBook {
	private $author;
	private $title;
	function __construct() {
		$this->author = 'Igor';
		$this->title  = 'php 5.2 with Igor';
	}
	function getAuthor() {return $this->author;}
	function getTitle() {return $this->title;}
}

class Php7Book extends AbstractPHPBook {
	private $author;
	private $title;
	function __construct() {

		if (date('Y') < '2019') {
			$this->author = 'Andrei';
			$this->title  = 'php 7 from 2018';
		} else {
			$this->author = 'Andrei';
			$this->title  = 'php 7, new!';
		}

	}
	function getAuthor() {return $this->author;}
	function getTitle() {return $this->title;}
}

class Php73Book extends AbstractPHPBook {
	private $author;
	private $title;
	function __construct() {
		$this->author = 'Tanya';
		$this->title  = 'php 7.3!!!';
	}
	function getAuthor() {return $this->author;}
	function getTitle() {return $this->title;}
}

writeln('Start test');
writeln('');

writeln('testing Php5');
$php = new Php5;
testFactoryMethod($php);
writeln('');

writeln('testing Php7');
$php = new Php7;
testFactoryMethod($php);
writeln('');

writeln('End test');
writeln('');

function testFactoryMethod($php) {
	$phpUs = $php->makePHPBook("5");
	writeln('5 php Author: '.$phpUs->getAuthor());
	writeln('5 php Title: '.$phpUs->getTitle());

	$phpUs = $php->makePHPBook("5.2");
	writeln('5.2 php Author: '.$phpUs->getAuthor());
	writeln('5.2 php Title: '.$phpUs->getTitle());

	$phpUs = $php->makePHPBook("7");
	writeln('7 php Author: '.$phpUs->getAuthor());
	writeln('7 php Title: '.$phpUs->getTitle());
}

function writeln($line_in) {
	echo $line_in."<br/>";
}

?>
