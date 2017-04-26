<?php

namespace tests\models;

use app\models\Plans;
use Codeception\Specify;

class PlansTest extends \Codeception\Test\Unit
{
    private $model;

    public function _before()
    {
       $this->model = new Plans();
    }

    public function testTableName()
    {
    	$this->assertEquals('plans', Plans::tableName());
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
        $data = Plans::find()->one();
        
        $this->assertNotEmpty($data);
    }
}