<?php

namespace Tests\Acceptance\home;

use Tests\Acceptance\BaseAcceptanceCest;
use Tests\Support\AcceptanceTester;

class UserIndexCest extends BaseAcceptanceCest
{
    public function seeJsonResponse(AcceptanceTester $page): void
    {
        // $page->sendGET('users');
        // $page->seeResponseCodeIs(200);
        // $page->seeResponseIsJson();
        // $page->seeResponseContainsJson([
        //     [
        //         'name' => 'John Doe',
        //         'email' => 'teste@email',
        //         'is_manager' => false
        //     ]
        // ]);
    }
}
