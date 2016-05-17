<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "tariff".
 *
 * @property integer $id
 * @property integer $svcId
 * @property string $title
 * @property integer $price
 * @property string $fromDate
 * @property string $toDate
 */
class Tariff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tariff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['svcId', 'price'], 'integer'],
            [['title'], 'string', 'max' => 300],
            [['fromDate', 'toDate'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'svcId' => 'Svc ID',
            'title' => 'Title',
            'price' => 'Price',
            'fromDate' => 'From Date',
            'toDate' => 'To Date',
        ];
    }

    public static function search($params)
    {
        $Tariff = new Tariff();
        $where = $Tariff->attributeLabels();
        foreach ($where as $key => $value)
        {
            $where[$key] = "";
        }
        foreach ($params as $key => $value)
        {
            if(isset($where[$key]))
                $where[$key] = $value;
        }
        foreach ($where as $key => $value)
        {
            if ($where[$key] == null)
                unset($where[$key]);
        }
        $query = $Tariff::find()->where($where);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
    }
}
