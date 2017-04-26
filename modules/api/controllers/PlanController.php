<?php

namespace app\modules\api\controllers;

use yii\rest\Controller;
use app\models\Ddd;
use app\models\Calls;
use app\models\Plans;

/**
 * Plan controller for the 'api' module
 */
class PlanController extends Controller
{
    /**
     * Calculate plans price
     * @return array
     */
    public function actionCalculate()
    {
    	// get data from post
    	$data = \Yii::$app->request->post();

    	// valid data
    	if ($data['origin'] == "" || $data['destiny'] == "" || $data['minutes'] == "" || $data['plan'] == "")
			return ['error' => 'Calculo não processado por falta de dados.'];

		// find objects
		$origin = Ddd::findOne($data['origin']);
		$destiny = Ddd::findOne($data['destiny']);
		$plan = Plans::findOne($data['plan']);

		// valid objects
		if (!$origin || !$destiny || !$plan)
			return ['error' => 'Calculo não processado por motivo de dados inválidos.'];

		// get calc
		$calc = Calls::calculate($origin, $destiny, $data['minutes'], $plan);

        return $calc;
    }
}
