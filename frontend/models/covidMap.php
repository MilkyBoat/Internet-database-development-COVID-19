<?php

/**
 * Team:布里啾啾迪布里多,NKU
 * coding by 徐云凯 1713667
 * T疫情地图数据实体类
 */

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "covid_map".
 *
 * @property int $id
 * @property int $pid
 * @property string $date
 * @property string $placename
 * @property int|null $confirm
 * @property int|null $suspect
 * @property int|null $cured
 * @property int|null $death
 */
class covidMap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'covid_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'date', 'placename'], 'required'],
            [['pid', 'confirm', 'suspect', 'cured', 'death'], 'integer'],
            [['date'], 'safe'],
            [['placename'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Pid',
            'date' => 'Date',
            'placename' => 'Placename',
            'confirm' => 'Confirm',
            'suspect' => 'Suspect',
            'cured' => 'Cured',
            'death' => 'Death',
        ];
    }
}