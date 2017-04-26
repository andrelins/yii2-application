<?php
class SiteCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('site');
    }

    public function openPage(\FunctionalTester $I)
    {
        $I->see('Planos');
        $I->see('Simulador');
        $I->see('Regulamento');
    }
}