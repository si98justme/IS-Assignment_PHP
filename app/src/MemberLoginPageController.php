<?php

namespace justin;

use SilverStripe\Security\Authenticator;
use PageController;

class MemberLoginPageController extends PageController
{
    // Tells SS what is allower in the URI Structure
    // private static $allowed_actions = [
    //     'StartsWithLetter',
    //     'Position'
    // ];

    // Tells SS what to do when there is a custom URI Structure
    // private static $url_handlers = [
    //     'StartsWithLetter/$ID/$Name' => 'StartsWithLetter',
    //     'Position/$ID/$Name' => 'Position',
    // ];

    // Gets a set of filtered Bar Members based on the criteria
    // public function PaginatedBarMembers() 
    // {
    //     $preFilteredList = PaginatedList::create($this->BarMembers(), $this->request);
    //     $preFilteredList->sort('LastName', 'ASC');
    //     $preFilteredList->setLimitItems(false);

    //     $preFilteredList = $preFilteredList->filterAny([
    //         'LastName:StartsWith' => $this->getRequest()->param('ID'),
    //         'MemberCategory' => $this->getRequest()->param('ID'),
    //     ]);

    //     $filteredList = new PaginatedList($preFilteredList, $this->getRequest());
    //     $filteredList->setPageLength(8);
        
    //     return $filteredList;
    // }

   
}