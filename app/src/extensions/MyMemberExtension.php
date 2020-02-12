<?php

// namespace justin;

use SilverStripe\ORM\DataExtension;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\DateField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\File;
use SilverStripe\Versioned\Versioned;
use justin\Accounts;

class MyMemberExtension extends DataExtension

{

    private static $db = array(
        'IDNumber' => 'BigInt'
    );

    private static $has_many = [
		'Accounts' => Accounts::class
    ];
    
	private static $cascade_deletes = [
		'Accounts'
    ];

    public function updateMemberFormFields(FieldList $fields) {
        $fields->push(new TextField('IDNumber', 'ID number'));
    }
}