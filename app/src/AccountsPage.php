<?php

	namespace justin;

	use SilverStripe\CMS\Model\SiteTree;
	use Page;

	class AccountsPage extends Page
	{
		private static $table_name = 'AccountsPage';

		private static $controller_name = AccountsPageController::class;
	}

