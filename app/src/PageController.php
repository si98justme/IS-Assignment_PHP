<?php

namespace {

    use SilverStripe\CMS\Controllers\ContentController;
    use SilverStripe\View\ArrayData;
    use SilverStripe\ORM\ArrayList;
    use kznbar\BarMember;
    use kznbar\Document;
    use kznbar\CourtRoll;
    use kznbar\Bulletin;

    class PageController extends ContentController
    {
        /**
         * An array of actions that can be accessed via a request. Each array element should be an action name, and the
         * permissions or conditions required to allow the user to access it.
         *
         * <code>
         * [
         *     'action', // anyone can access this action
         *     'action' => true, // same as above
         *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
         *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
         * ];
         * </code>
         *
         * @var array
         */
        private static $allowed_actions = [];

        protected function init()
        {
            parent::init();
            // You can include any CSS or JS required by your project here.
            // See: https://docs.silverstripe.org/en/developer_guides/templates/requirements/
        }

        // public function GetImages(){

        //     return DataObject::get("Image", "ParentID = 3");
    
        // }

        // Gets a list of the Bar Member Categories that are available
        public function getBarMemberPositions () {

            $BarMemberPositions = ArrayList::create();
            $Positions = array_unique(BarMember::get()->column('MemberCategory'));

            foreach ($Positions as $item) {
                $BarMemberPositions->push (ArrayData::create(['Title' => $item]));
            }

            return $BarMemberPositions;
        }

        // Gets a list of the Bar Organisation Documents that are available
        public function getGeneralDocumentCategories () {

            $DocumentCategories = ArrayList::create();
            $Categories = array_unique(Document::get()->column('DocumentCategory'));

            foreach ($Categories as $item) {
                $DocumentCategories->push (ArrayData::create(['Title' => $item]));
            }

            return $DocumentCategories;
        }

        // Gets a list of the Bar Court Rolls that are available
        public function getCourtRollCategories () {

            $CourtRollCategories = ArrayList::create();
            $Categories = array_unique(CourtRoll::get()->column('DocumentCategory'));

            foreach ($Categories as $item) {
                $CourtRollCategories->push (ArrayData::create(['Title' => $item]));
            }

            return $CourtRollCategories;
        }

        // Gets a list of the Bar Court Rolls that are available
        public function getBulletinCategories () {

            $BulletinCategories = ArrayList::create();
            $Categories = array_unique(Bulletin::get()->column('BulletinCategory'));

            foreach ($Categories as $item) {
                $BulletinCategories->push (ArrayData::create(['Title' => $item]));
            }

            return $BulletinCategories;
        }
    }
}
