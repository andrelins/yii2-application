<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ddd".
 *
 * @property integer $id
 * @property integer $ddd
 * @property string $name
 *
 * @property Calls[] $calls
 * @property Calls[] $calls0
 */
class Ddd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ddd';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ddd', 'name'], 'required'],
            [['ddd'], 'integer'],
            [['name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ddd' => 'Ddd',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalls()
    {
        return $this->hasMany(Calls::className(), ['destiny' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalls0()
    {
        return $this->hasMany(Calls::className(), ['origin' => 'id']);
    }
}