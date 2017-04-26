<?php

namespace app\models;

use Yii;
use app\models\Ddd;
use app\models\Calls;
use app\models\Plans;

/**
 * This is the model class for table "calls".
 *
 * @property integer $id
 * @property integer $origin
 * @property integer $destiny
 * @property double $price
 *
 * @property Ddd $destiny0
 * @property Ddd $origin0
 */
class Calls extends \yii\db\ActiveRecord
{
    /**
     * Min Rate when not find call price
     */

    private static $minRate = 0.60;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calls';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['origin', 'price'], 'required'],
            [['origin', 'destiny'], 'integer'],
            [['price'], 'number'],
            [['destiny'], 'exist', 'skipOnError' => true, 'targetClass' => Ddd::className(), 'targetAttribute' => ['destiny' => 'id']],
            [['origin'], 'exist', 'skipOnError' => true, 'targetClass' => Ddd::className(), 'targetAttribute' => ['origin' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'origin' => 'Origin',
            'destiny' => 'Destiny',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDestiny()
    {
        return $this->hasOne(Ddd::className(), ['id' => 'destiny']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrigin()
    {
        return $this->hasOne(Ddd::className(), ['id' => 'origin']);
    }

    /**
     * Calculate Calls 
     * @return array
     */

    public static function calculate(Ddd $origin, Ddd $destiny, $minutes, Plans $plan = null)
    {
        // Init variables
        $with_plan = null;
        $without_plan = null;

        // find call in database
        $call = Self::find()->filterWhere(['origin' => $origin->id, 'destiny' => $destiny->id])->one();

        // Not find call, use minRate
        if (!$call) {
            return [
                'price' => number_format($minutes * Self::$minRate, 2,',', '.')
            ];
        }

        // With Plan: minutes not exceeded
        if ($plan && $minutes <= $plan->minutes) {
            $with_plan = 00.00;
            $without_plan = $minutes * $call->price;
        } 
        // With Plan: minutes exceeded
        if ($plan && $call && $minutes > $plan->minutes) {
            $rate = $call->price + ($call->price * 0.10);
            $with_plan = ($minutes - $plan->minutes) * $rate;
            $without_plan = $minutes * $call->price;
        }

        // Return Calc
        return [
            'with_plan' => number_format($with_plan, 2,',', '.'),
            'without_plan' => number_format($without_plan, 2,',', '.')
        ];
    }
}
