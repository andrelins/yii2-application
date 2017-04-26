<?php

namespace app\models;

use Yii;
use app\models\Ddd;
use app\models\Calls;
use app\models\Plans;

/**
 * This is the model class for table "plans".
 *
 * @property integer $id
 * @property string $name
 * @property integer $minutes
 * @property double $price
 */
class Plans extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plans';
    }

    /**
     * Validation rules
     */
    public function rules()
    {
        return [
            [['name', 'minutes'], 'required'],
            [['name'], 'string'],
            [['minutes'], 'integer'],
            [['price'], 'number'],
        ];
    }

    /**
     * Attribute Labels
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'minutes' => 'Minutes',
            'price' => 'Price',
        ];
    }
}
