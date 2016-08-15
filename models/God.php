<?php

namespace app\models;

use cs\services\BitMask;
use yii\db\ActiveRecord;
use yii\db\Query;


/**
 * Class God
 * @package app\models
 *
 * @param string $name_first
 * @param string $name_last
 * @param string $name_middle
 */
class God extends ActiveRecord
{
    public static  function tableName()
    {
        return 'gs_gods';
    }

    public function rules()
    {
        return [
            ['name_first', 'string', 'max' => 64],
            ['name_last', 'string', 'max' => 64],
            ['name_middle', 'string', 'max' => 64],
            ['avatar', 'string','max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name_first' => 'Имя',
            'name_last' => 'Фамилия',
            'name_middle' => 'Отчество',
        ];
    }
    /**
     * @param array $fields
     * @return \app\models\God
     */
    public static function add($fields)
    {
        $i = new static($fields);
        $i->save();
        $i->id = \Yii::$app->db->lastInsertID;

        return $i;
    }

}