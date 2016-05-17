<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "holiday".
 *
 * @property integer $id
 * @property string $holiday
 * @property integer $is_weekend
 */
class Holiday extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'holiday';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_weekend'], 'integer'],
            [['holiday'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'holiday' => 'Holiday',
            'is_weekend' => 'Is Weekend',
        ];
    }

    public static function search($params)
    {
        $Holiday = new Holiday();
        $where = $Holiday->attributeLabels();
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
        $query = $Holiday::find()->where($where);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
    }
}
