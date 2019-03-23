<?php;

class HomeCest
{
    public function mainPage(\frontend\tests\frontendTester $I)
    {
        $I->sendGET('/');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }
}