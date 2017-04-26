<?php

namespace tests\models;

use app\models\Ddd;
use Codeception\Specify;

class DddTest extends \Codeception\Test\Unit
{
    private $model;

    public function _before()
    {
       $this->model = new Ddd();
    }

    public function testTableName()
    {
        $this->assertEquals('ddd', Ddd::tableName());
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
        $data = Ddd::find()->one();
        
        $this->assertNotEmpty($data);
    }

    public function testHaveCall()
    {
        $model = Ddd::findOne(1);
        $call = $model->getCalls()->one();
        
        $this->assertNotEmpty($call);
    }

    public function testHaveCall0()
    {
        $model = Ddd::findOne(1);
        $call = $model->getCalls0()->one();
        
        $this->assertNotEmpty($call);
    }

}
