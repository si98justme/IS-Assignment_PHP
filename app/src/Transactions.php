<?php

namespace justin;

use SilverStripe\ORM\DataObject;
use PageController;

class Transactions extends DataObject

{
	private static $table_name = 'Transactions';

	private static $db = [
		'Title' => 'Varchar',
		'Amount' => 'Float',
		'Date' => 'Date'
	];

	private static $has_one = [
		'Account' => Accounts::class
	];

	// public function Link()
	// {
	// 	return $this->AccountsPage()->Link('show/'.$this->ID);
	// }
}