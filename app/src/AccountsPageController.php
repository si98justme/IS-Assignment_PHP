<?php

namespace justin;

use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\Control\Controller;
use SilverStripe\Security\Authenticator;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Security\Security;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\FormAction;
// use justin\Accounts;
// use justin\Transactions;
use PageController;

class AccountsPageController extends PageController
{
 // This is where you tell the controller what actions it can perform.  Each would be in the URL (eg. /memberpage/delete)
	private static $allowed_actions = [
		'delete',
		'add',
		'show',
		'transactionadd',
		'AccountAddForm',
		'TransactionAddForm',
	];
		public function show(HTTPRequest $request)
		{
			$account = Accounts::get()->byID($request->param('ID'));

			if(!$account) {
				return $this->httpError(404,'That account could not be found');
			}

			return [
				'Account' => $account,
				'Title' => $account->Title,
				'AccountBalance' => $account->AccountBalance,
			];

		}

		public function delete(HTTPRequest $request)
		{
			$accountId = $request->getVar('account');
			$account = Accounts::get()->byID($accountId);
			$AccountBalance = $account->AccountBalance;
			if ($account->AccountOwnerID === Security::getCurrentUser()->ID) {
				if ($AccountBalance === 0){
					$account->delete();
				}
			}

			return $this->redirect($this->Link());

		}

		public function getAccounts()
		{
			return Security::getCurrentUser()->Accounts();
		}

		public function add() {
			return $this->render();
		}

		public function transactionadd(HTTPRequest $request) {
  			$this->AccountID = $request->getVar('accountid');
			return $this->render();
		}

		public function addAccount($data, $form) {

			$account = Accounts::create([
				'Title' => $data['Title'],
				'AccountNumber' => $data['AccountNumber'],
				'AccountType' => $data['AccountType'],
				'AccountOwnerID' => Security::getCurrentUser()->ID
			]);
			$account->write();
			$form->sessionMessage('Successful!', 'good');
			return $this->redirectBack();
		}

		public function AccountAddForm()
		{
			$AccountType = array( 'cheque' => 'Cheque', 'Savings' => 'Savings');

			$fields = new FieldList(
				TextField::create('Title')
					->setAttribute('placeholder', 'Account Name')
					->setAttribute('required', 'required')
					->addExtraClass('form-control'),

				TextField::create('AccountNumber')
					->setAttribute('placeholder', 'Account Number')
					->setAttribute('required', 'required')
					->addExtraClass('form-control'),

				DropdownField::create('AccountType','')
					->setSource($AccountType)
					->setEmptyString('Account Type')
					->setAttribute('required', 'required')
					->addExtraClass('form-control')
					->addExtraClass('accountType'),
			);

			$actions = new FieldList(
				FormAction::create('addAccount', 'Submit')
			);

			$form = new Form($this, 'AccountAddForm', $fields, $actions);

			return $form;
		}

		public function addTransaction($data, $form) {
			$form->sessionMessage('Successful!', 'good');
			if ( (int) $data['AccountID'] == 0 ) {  
				$form->sessionMessage('Sorry, something is wrong', 'bad');
				return $this->redirectBack();
			}

			$transaction = Transactions::create([
				'Title' => $data['Title'],
				'Amount' => $data['Amount'],
				'AccountType' => $data['Date'],
				'AccountID' => $data['AccountID'],
				'AccountOwnerID' => Security::getCurrentUser()->ID,
			]);
			$transaction->write();
			return $this->redirectBack();
		}

		public function TransactionAddForm()
		{

			$request = Controller::curr()->getRequest();
			$accountID = $request->getVar('accountid');

			$fields = new FieldList(
				TextField::create('Title')
					->setAttribute('placeholder', 'Transaction Name')
					->setAttribute('required', 'required')
					->addExtraClass('form-control'),

				TextField::create('Amount')
					->setAttribute('placeholder', 'Transaction Amount')
					->setAttribute('required', 'required')
					->addExtraClass('form-control'),

				DateField::create('Date','Date of Transaction')
					->setAttribute('data-toggle', "true")
					->setAttribute('required', 'required')
					->addExtraClass('datepicker')
					->addExtraClass('form-control'),

				HiddenField::create('AccountID')->setValue($accountID),
			);

			$actions = new FieldList(
				FormAction::create('addTransaction', 'Submit')
			);

			$form = new Form($this, 'TransactionAddForm', $fields, $actions,);

			return $form;
		}
}