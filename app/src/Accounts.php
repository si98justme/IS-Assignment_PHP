<?php

namespace justin;

use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Member;
// use justin\AccountsPage;

class Accounts extends DataObject
{
	private static $table_name = 'Accounts';

	private static $db = [
		'Title' => 'Varchar',
		'AccountNumber' => 'Int'
	];

	private static $has_many = [
		'Transactions' => Transactions::class
	];

	private static $has_one = [
		'AccountOwner' => Member::class
	];

	private static $cascade_deletes = [
		'Transactions'
	];

	public function getTransactions() {
		return $this->Transactions();
	}

	public function getBalance() {
		return (float) $this->Transactions()->sum('Amount');
	}

	// public function Link()
	// {
	// 	return $this->AccountsPage()->Link('show/'.$this->ID);
	// }

}