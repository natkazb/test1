<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 16.05.2016
 * Time: 15:52
 */

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Tariff;

class TariffController extends ActiveController{

    public $modelClass = 'app\models\Tariff';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = 'csv';
        return $behaviors;
    }

    public function prepareDataProvider()
    {
        return Tariff::search(\Yii::$app->request->queryParams);
    }

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['delete'], $actions['create'], $actions['update']);
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

}