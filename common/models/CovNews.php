<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%cov_news}}".
 *
 * @property int $id
 * @property string|null $pubDate
 * @property string|null $title
 * @property string|null $summary
 * @property string|null $infoSource
 * @property string|null $sourceUrl
 * @property string|null $image
 */
class CovNews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cov_news}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image'], 'string'],
            [['pubDate', 'title', 'infoSource', 'sourceUrl'], 'string', 'max' => 255],
            [['summary'], 'string', 'max' => 2000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pubDate' => 'Pub Date',
            'title' => 'Title',
            'summary' => 'Summary',
            'infoSource' => 'Info Source',
            'sourceUrl' => 'Source Url',
            'image' => 'Image',
        ];
    }

    /**
     * {@inheritdoc}
     * @return CovNewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CovNewsQuery(get_called_class());
    }
    //获得头像路径
}
