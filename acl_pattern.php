<?php
// https://www.developer.com/lang/php/creating-a-custom-acl-in-php.html
// https://www.sitepoint.com/role-based-access-control-in-php/

class Acl
{
	private $dbUsers = [
		'1' => 'admin',
		'2' => 'root',
		'3' => 'author',
		'4' => 'user',
		'5' => 'user',
		'6' => 'author',
		'7' => 'author',
		'8' => 'admin',
		'9' => 'admin'
	];
	private $dbGroups = [
		'admin' => [
			'edit' => 'Y',
			'read' => 'Y',
			'delete' => 'Y',
			'post' => 'Y',
			'settings' => 'N'
		],
		'root' => [
			'edit' => 'Y',
			'read' => 'Y',
			'delete' => 'Y',
			'post' => 'N',
			'settings' => 'Y'
		],
		'author' => [
			'edit' => 'Y',
			'read' => 'Y',
			'delete' => 'N',
			'post' => 'Y',
			'settings' => 'N'
		],
		'user' => [
			'edit' => 'N',
			'read' => 'Y',
			'delete' => 'N',
			'post' => 'N',
			'settings' => 'N'
		]
	];

	function _construct()
	{

	}

	public function can($userId, $act)
	{
		if (
			isset($this->dbUsers[$userId]) &&
			isset($this->dbGroups[$this->dbUsers[$userId]]) &&
			array_key_exists($act, $this->dbGroups[$this->dbUsers[$userId]])
		) {
			return 'Y';
		} else {
			return 'N';
		}
	}

	public function isAuthorize($userId)
	{
		try {
			isset($this->dbUsers[$userId]);
		} catch (Exception $e) {
			echo 'User not found';
		}
	}

	public function getUserGroup($userId)
	{
		return $this->dbUsers[$userId];
	}

	public function getGroupActions($group)
	{
		return $this->dbGroups[$group];
	}
}

function writeln($line_in) {
	echo '<pre>'.print_r($line_in).'</pre>';
}

writeln('Start test');

$acl = new Acl;

writeln($acl->can(1, 'settings'));
writeln($acl->can(1, 'delete'));
writeln($acl->can(1, 'write'));

writeln($acl->isAuthorize(1));

writeln($acl->getUserGroup(1));

writeln($acl->getGroupActions('root'));


writeln('End test');

?>
