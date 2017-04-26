<?php

namespace tests\models;

use app\models\Calls;
use app\models\Ddd;
use app\models\Plans;
use Codeception\Specify;

class CallsTest extends \Codeception\Test\Unit
{
    private $model;

    public function _before()
    {
       $this->model = new Calls();
    }

    public function testTableName()
    {
        $this->assertEquals('calls', Calls::tableName());
    }

    public function testRules()
    {
        $this->assertNotEmpty($this->model->rules());
    }

    public function testAttributeLabels()
    {
        $this->assertNotEmpty($this->model->attributeLabels());
    }

    public function testExistRegister()
    {
        $data = Calls::find()->one();
        
        $this->assertNotEmpty($data);
    }

    public function testCalculateWithoutPlan()
    {
        $origin = Ddd::findOne(1);
        $destiny = Ddd::findOne(2);
        $data = Calls::calculate($origin, $destiny, 30);
       
        expect($data)->hasKey('with_plan');
        expect($data)->hasKey('without_plan');
    }

    public function testCalculateWithoutCallRegister()
    {
        $origin = Ddd::findOne(1);
        $destiny = Ddd::findOne(1);
        $data = Calls::calculate($origin, $destiny, 200);
       
        expect($data)->hasKey('price');
        $this->assertEquals('120,00', $data['price']);
    }

    public function testCalculateWithFaleMais30()
    {
        $origin = Ddd::findOne(1);
        $destiny = Ddd::findOne(2);
        $plan = Plans::findOne(1);
        $data = Calls::calculate($origin, $destiny, 20, $plan);
      
        expect($data)->hasKey('with_plan');
        expect($data)->hasKey('without_plan');
        $this->assertEquals('0,00', $data['with_plan']);
        $this->assertEquals('38,00', $data['without_plan']);
    }

    public function testCalculateWithFaleMais60()
    {
        $origin = Ddd::findOne(1);
        $destiny = Ddd::findOne(2);
        $plan = Plans::findOne(2);
        $data = Calls::calculate($origin, $destiny, 70, $plan);
      
        expect($data)->hasKey('with_plan');
        expect($data)->hasKey('without_plan');
        $this->assertEquals('20,90', $data['with_plan']);
        $this->assertEquals('133,00', $data['without_plan']);
    }

    public function testCalculateWithFaleMais120()
    {
        $origin = Ddd::findOne(1);
        $destiny = Ddd::findOne(2);
        $plan = Plans::findOne(3);
        $data = Calls::calculate($origin, $destiny, 200, $plan);
      
        expect($data)->hasKey('with_plan');
        expect($data)->hasKey('without_plan');
        $this->assertEquals('167,20', $data['with_plan']);
        $this->assertEquals('380,00', $data['without_plan']);
    }

    public function testHaveOrigin()
    {
        $model = Calls::findOne(1);
        $data = $model->getOrigin()->one();
        
        $this->assertNotEmpty($data);
    }

    public function testHaveDestiny()
    {
        $model = Calls::findOne(1);
        $data = $model->getDestiny()->one();
        
        $this->assertNotEmpty($data);
    }

}
